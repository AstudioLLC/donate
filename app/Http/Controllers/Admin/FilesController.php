<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\File\DeleteFileRequest;
use App\Http\Requests\File\StoreFileRequest;
use App\Http\Requests\File\UpdateFileRequest;
use App\Models\Children;
use App\Models\File;
use App\Traits\InteractsWithSortable;
use Illuminate\Http\Request;

class FilesController extends AdminBaseController
{
    use InteractsWithSortable;

    /**
     * @var string
     */
    protected $modelClass = File::class;

    /**
     * @var mixed
     */
    protected $model;

    public function __construct()
    {
        parent::__construct();

        $this->model = new $this->modelClass;
    }

    /**
     * Display a listing of the resource.
     *
     * @param string $file
     * @param int $key
     * @return \Illuminate\Http\Response
     */
    public function index(string $file, int $key)
    {
        $backUrl = url()->previous();

        $items = $this->model::where(['file' => $file, 'key' => $key])
            ->sort()
            ->get();
        $child = Children::where('id',$key)->first();
        return response()
            ->view('admin.pages.file.index', compact('child','file', 'key', 'backUrl', 'items'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param string $file
     * @param int $key
     * @return \Illuminate\Http\Response
     */
    public function create(string $file, int $key)
    {
        $edit = false;
        $backUrl = route('admin.file.index', ['file' => $file, 'key' => $key]);

        $imageSmallSizes = $this->model::$imageSmallSizes ?? null;
        $imageSmallSize = '';
        if ($imageSmallSizes) {
            $imageSmallSize = ' (' . $imageSmallSizes[0]['width'] . 'x' . $imageSmallSizes[0]['height'] . ')';
        }

        $imageBigSizes = $this->model::$imageBigSizes ?? null;
        $imageBigSize = '';
        if ($imageBigSizes) {
            $imageBigSize = ' (' . $imageBigSizes[0]['width'] . 'x' . $imageBigSizes[0]['height'] . ')';
        }

        return response()
            ->view('admin.pages.file.create', compact('file', 'key', 'edit', 'backUrl', 'imageSmallSize', 'imageBigSize'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param string $file
     * @param int $key
     * @param StoreFileRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(string $file, int $key, StoreFileRequest $request)
    {
        $this->model->create($request->except('_token', '_method'));
        return redirect()
            ->route('admin.file.index', ['file' => $file, 'key' => $key]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(int $id)
    {
        dd($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param string $file
     * @param int $key
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit(string $file, int $key, int $id)
    {
        $item = $this->model::findOrFail($id);
        $edit = true;
        $backUrl = route('admin.file.index', ['file' => $file, 'key' => $key]);

        $imageSmallSizes = $this->model::$imageSmallSizes ?? null;
        $imageSmallSize = '';
        if ($imageSmallSizes) {
            $imageSmallSize = ' (' . $imageSmallSizes[0]['width'] . 'x' . $imageSmallSizes[0]['height'] . ')';
        }

        $imageBigSizes = $this->model::$imageBigSizes ?? null;
        $imageBigSize = '';
        if ($imageBigSizes) {
            $imageBigSize = ' (' . $imageBigSizes[0]['width'] . 'x' . $imageBigSizes[0]['height'] . ')';
        }
        $child = Children::where('id',$key)->first();

        return response()
            ->view('admin.pages.file.edit', compact('child','file', 'key', 'edit', 'backUrl', 'imageSmallSize', 'imageBigSize', 'item'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param $file
     * @param $key
     * @param $id
     * @param UpdateFileRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(string $file, int $key, int $id, UpdateFileRequest $request)
    {
        $item = $this->model::findOrFail($id);
        $item->update($request->except('_token', '_method'));
        return redirect()
            ->route('admin.file.index', ['file' => $file, 'key' => $key]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @param DeleteFileRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(int $id, DeleteFileRequest $request)
    {
        $item = $this->model::findOrFail($id);
        $result = ['success' => false];
        $item->delete();
        $result['success'] = true;

        return response()->json($result);
    }

    public function deleteImage(int $id, Request $request)
    {
        $item = $this->model::findOrFail($id);
        $image_path = public_path()."/storage/media/file/thumbnail".$item->imageBig;
        if(\Illuminate\Support\Facades\File::exists($image_path)) {

            unlink($image_path);
        }
        $item->imageBig = null;

        $item->save();

        return redirect()->back()->with('success','Deleted successfully');

    }
    public function deleteImageSmall(int $id, Request $request)
    {
        $item = $this->model::findOrFail($id);
        $image_small_path = public_path()."/storage/media/file/thumbnail".$item->imageSmall;
        if(File::exists($image_small_path)) {

            unlink($image_small_path);
        }
        $item->imageSmall = null;

        $item->save();

        return redirect()->back()->with('success','Deleted successfully');

    }
    public function deleteFile(int $id, Request $request)
    {
        $item = $this->model::findOrFail($id);
        $file_path = public_path()."/storage/media/file/thumbnail".$item->name;
        if(File::exists($file_path)) {

            unlink($file_path);
        }
        $item->name = null;

        $item->save();

        return redirect()->back()->with('success','Deleted successfully');

    }
}
