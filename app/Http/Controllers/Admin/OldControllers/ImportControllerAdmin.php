<?php

namespace App\Http\Controllers\Admin;

use App\Imports\ItemsImport;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ImportControllerAdmin extends AdminBaseController
{
    private const IMPORTS = [
        'items' => [
            'importer' => ItemsImport::class,
        ],
    ];

    public function render(Request $request, $page = null)
    {
        if (empty($page)) {
            $page = 'items';
        }
        if (!array_key_exists($page, self::IMPORTS)) abort(404);

        $import = self::IMPORTS[$page];

        if ($request->getMethod() == 'POST') {
            if (Validator::make($request->only('file'), [
                'file' => 'required|file|mimes:xlsx,xls,csv'
            ])->fails()) {
                $response = 'unvalidated';
            } else {
                $file = $request->file('file');
                $response = $import['importer']::import($file);
            }

            return redirect()->back()->with(['import_response' => $response]);
        } else {
            $data = [
                'title' => $import['title'] ?? t('Admin items.import excel'),
                'response' => session('import_response'),
                'columns' => $import['importer']::getColumns(),
                'categories' => Category::query()->where('deep', 0)->with(['children', 'filters'])->get()
            ];

            return view('admin.pages.items.import.index', $data);
        }
    }

    public function view($id)
    {
        $data['category'] = Category::with('filters')->where('id', $id)->firstOrFail();
        $data['title'] = t('Admin Sidebar.Filters') . " - " . $data['category']->name;

        return view('admin.pages.items.import.filters', $data);
    }

    public function downloadExample()
    {
        return response()->download(storage_path('app/import-example.xlsx'), 'Образец импорта товаров.xlsx');
    }
}
