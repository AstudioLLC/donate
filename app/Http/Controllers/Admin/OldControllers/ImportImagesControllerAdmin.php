<?php

namespace App\Http\Controllers\Admin;

use App\Models\Item;
use App\Services\ImageUploader\ImageUploader;
use App\Services\Zip\Zip;
use Exception;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\View\View;

class ImportImagesControllerAdmin extends AdminBaseController
{
    /**
     * @return mixed
     */
    public static function getIncrement()
    {
        $model = new Item();
        $database = $model->getConnection()->getDatabaseName();
        $table = $model->getTable();

        return DB::select("SELECT `AUTO_INCREMENT` as `increment` FROM  INFORMATION_SCHEMA.TABLES WHERE TABLE_SCHEMA = '$database' AND TABLE_NAME = '$table'")[0]->increment;
    }

    /**
     * @param Request $request
     * @return Application|Factory|RedirectResponse|View
     * @throws Exception
     */
    public function import(Request $request)
    {
        if ($request->post()) {
            $request->validate([
                'file' => 'required|file|mimes:zip|max:20480',
            ], [
                'file.max' => 'Размер файла не может быть более 20 Мегабайтов',
                'file.required' => 'Выберите файл',
                'file.mimes' => 'Выберите файл zip'
            ]);

            $uploadedFilePath = $request->file('file')->getRealPath();
            if (!Zip::check($uploadedFilePath)) return redirect()->back()->withErrors(['file' => 'Недействительный ZIP']);
            $zip = Zip::open($uploadedFilePath);
            $zipContent = $zip->listFiles();
            $files = [];
            $allFiles = [];
            $codes = [];

            foreach ($zipContent as $file) {
                if (Str::contains('/', $file) || !preg_match('/\.[a-z]+$/', $file)) continue;
                $array = explode('.', $file);
                $ext = end($array);
                $codes[] = $array[0];
                $code = preg_replace('/(-[0-9]+)?(\.[a-z]+$)/', '', $file);
                if ($ext == 'jpg' || $ext == 'jpeg' || $ext == 'png') {
                    $files[$code][] = $file;
                    $allFiles[] = $file;
                }
            }

            $changed_count = 0;
            if (count($files)) {
                $path = storage_path('zip/');
                $items = Item::with('image')->whereIn('code', $codes)->get();
                $zip->setMask(0755);
                $zip->extract($path, $allFiles);
                foreach ($files as $key => $itemFiles) {
                    /** @var Item $item */
                    $item = $items->firstWhere('code', $key);
                    if (!$item) {
                        continue;
                    }
                    if ($item->image) {
                        $item->image->delete();
                    }
                    $uploadedFile = new UploadedFile($path.$itemFiles[0], $itemFiles[0], mime_content_type($path.$itemFiles[0]));

                    $name = ImageUploader::upload($uploadedFile, Item::$imageSizes);

                    $item->image()->create([
                        'name' => $name,
                        'title' => $item->getRawOriginal('title'),
                        'alt' => $item->getRawOriginal('title'),
                    ]);

                    $changed_count++;
                }
            }

            return redirect()->back()->withInput(['changed_count' => $changed_count, 'count' => count($zipContent)]);
        }

        return view('admin.pages.items.import.images');
    }
}
