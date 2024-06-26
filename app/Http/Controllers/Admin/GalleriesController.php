<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Gallery\DeleteGalleryRequest;
use App\Http\Requests\Gallery\StoreGalleryRequest;
use App\Http\Requests\Gallery\UpdateGalleryRequest;
use App\Mail\newPhoto;
use App\Mail\newVideo;
use App\Models\Children;
use App\Models\Gallery;
use App\Models\Page;
use App\Models\User;
use App\Services\ImageUploader\ImageUploader;
use App\Traits\InteractsWithSortable;
use Illuminate\Support\Facades\Mail;

class GalleriesController extends AdminBaseController
{
    use InteractsWithSortable;
    /**
     * @var string
     */
    protected $modelClass = Gallery::class;

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
     * @param string $gallery
     * @param int $key
     * @return \Illuminate\Http\Response
     */
    public function index(string $gallery, int $key)
    {
        $backUrl = url()->previous();
        $imageSizes = $this->modelClass::$imageSizes ?? null;
        $imageSize = '';
        if ($imageSizes) {
            $imageSize = ' (' . $imageSizes[0]['width'] . 'x' . $imageSizes[0]['height'] . ')';
        }

        $items = $this->modelClass::where(['gallery' => $gallery, 'key' => $key])
            ->sort()
            ->get();
        $child = Children::where('id',$key)->first();

        return response()
            ->view('admin.pages.gallery.index', compact('child','gallery', 'key', 'backUrl', 'imageSize', 'items'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreGalleryRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(StoreGalleryRequest $request)
    {
        $result = true;
        $inserts = [];
        $keys = Page::where('id',41)->orWhere('parent_id',41)->pluck('id')->toArray();
        if ($request->gallery == 'pages' && in_array($request->key,$keys)){
            $imageSizes = Page::$gallerySizes;
        }else{
            $imageSizes = Gallery::$imageSizes;
        }
        foreach ($request->images as $image) {
            $imageName = ImageUploader::upload($image, $imageSizes);
            if ($imageName) {
                $inserts[] = [
                    'gallery' => $request->get('gallery'),
                    'key' => $request->get('key'),
                    'image' => $imageName,
                ];
            } else $result = false;
        }

        if ($result) {
            Gallery::query()->insert($inserts);
        }
//        $sponsor_id = Children::where('id',$request->get('key'))->pluck('sponsor_id')->first();
//        $user = User::where('id',$sponsor_id)->firstOrFail();

//        Mail::to($user->email)->send(new newPhoto($user));

        return redirect()
            ->route('admin.gallery.index', ['gallery' => $request->get('gallery'), 'key' => $request->get('key')]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateGalleryRequest $request
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(UpdateGalleryRequest $request, $id)
    {
        $result = ['success' => false];
        $item = $this->modelClass::findOrFail($id);
        $item->update($request->except('_token', '_method'));
        $result['success'] = true;

        return response()->json($result);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param DeleteGalleryRequest $request
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(DeleteGalleryRequest $request, int $id)
    {
        $item = $this->modelClass::findOrFail($id);
        $result = ['success' => false];
        $item->delete();
        $result['success'] = true;

        return response()->json($result);
    }
}
