<?php

namespace App\Http\Controllers\Admin;

//use App\Models\Order;
use App\Models\Collection;
use App\Models\Item;
use App\Models\Service;
use App\Services\Notify\Facades\Notify;
use App\Models\Gallery;
use App\Models\Page;
use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class GalleriesControllerAdmin extends AdminBaseController
{
    private $data = [
        'title' => 'Галерея',
    ];

    /*private $settings = [
        'use_thumbs' => true,
        'thumb_method'=>'fit',
        'thumb_width'=>350,
        'thumb_height'=>200,
        'thumb_upsize'=>true,
        'thumb_aspectRatio'=>false,
        'method'=>'resize',
        'width'=>800,
        'height'=>460,
        'upsize'=>true,
        'aspectRatio'=>false,
    ];*/

    /**
     * @var array[]
     */
    private $settings = [
        [
            'width' => 800,
            'height' => 460,
            'entityPath' => 'gallery',
            'size' => 'thumbnail',
        ],
        [
            'width' => 350,
            'height' => 200,
            'entityPath' => 'gallery',
            'size' => 'small',
        ]
    ];
    private $gallery;
    private $key;

    private function verify($gallery, $key){
        $this->gallery = $this->data['gallery'] = $gallery;
        $this->key = $this->data['key'] = $key;
        $method_name = 'gallery_'.$gallery;
        if (!method_exists($this, $method_name)) abort(404);
        $use_keys = $key === null ? false : true;
        $require_keys = (new \ReflectionMethod($this, $method_name))->getNumberOfRequiredParameters() == 0 ? false : true;
        if ($use_keys !== $require_keys) abort(404);
        if ($key) $this->{$method_name}($key);
        else $this->{$method_name}();
    }

    private function verifyFromRequest($request){
        $gallery = $request->input('gallery');
        $key = $request->input('key');
        if (!$gallery || ($key!==null && !is_id($key))) abort(404);
        $this->verify($gallery, $key);
    }

    private function set(array $new_settings){
        $this->settings = array_merge($this->settings, $new_settings);
    }

    public function show($gallery, $key=null) {
        $this->verify($gallery, $key);
        $this->data['images'] = Gallery::adminList($gallery, $key);
        return view('admin.pages.gallery.main', $this->data);
    }

    public function sort(){
        $ids = Gallery::sortable(true);
        if (!$ids) return response()->json(false);
        return response()->json(true);
    }

    public function delete(Request $request){
        $result = ['success' => false];
        $id = $request->input('item_id');
        if ($id && is_id($id)) {
            $item = Gallery::where('id', $id)->first();
            if ($item && Gallery::deleteItem($item, $this->settings)) $result['success'] = true;
        }
        return response()->json($result);
    }

    public function add(Request $request) {
        $this->verifyFromRequest($request);
        $images = $request->images;
        Validator::make(['images'=>$images], [
            'images'=>'required|array',
            'images.*'=>'image|mimes:png,jpeg'
        ], [
            'required'=>'Выберите изоброжение',
            'array'=>'Выберите изоброжение',
            'image'=>'Формат не поддерживается',
            'mimes'=>'Формат не поддерживается',

        ])->validate();
        if(Gallery::addImages($this->gallery, $this->key, $images, $this->settings)) {
            Notify::success(t('Admin action notify.success added'));
        }
        else {
            Notify::error(t('Admin action notify.something wrong'));
        }
        $args = ['gallery'=>$this->gallery];
        if ($this->key) $args['id'] = $this->key;
        return redirect()->route('admin.gallery.show', $args);
    }
    public function addToOrder(Request $request) {
        $this->verifyFromRequest($request);
        $images = $request->images;
        Validator::make(['images'=>$images], [
            'images'=>'nullable|array',
            'images.*'=>'image|mimes:png,jpeg'
        ], [
            'required'=>'Выберите изоброжение',
            'array'=>'Выберите изоброжение',
            'image'=>'Формат не поддерживается',
            'mimes'=>'Формат не поддерживается',

        ])->validate();
        if(!empty($images) && Gallery::addImages($this->gallery, $this->key, $images, $this->settings)) {
            Notify::success(t('Admin action notify.success added'));
        }
        else {
            Notify::error(t('Admin action notify.something wrong'));
        }
        $args = ['gallery'=>$this->gallery];
        if ($this->key) $args['id'] = $this->key;
        return true;
    }

    public function edit(Request $request) {
        $id = $request->input('item_id');
        $response = ['success'=>false];
        if (is_id($id) && $item = Gallery::where('id', $id)->first()) {
            $values = $request->only('alt', 'title');
            Gallery::updateSeo($item, $values);
            $response['success'] = true;
        }
        return response()->json($response);

    }

    private function gallery_pages($key) {
        $item = Page::getPage($key);
        $this->data['title'] = t('Admin gallery.gallery') . " " . $item->title;
        $this->data['back_url'] = route('admin.pages.main');
    }

    private function gallery_about($key) {
        $item = Page::getPage($key);
        $this->data['title'] = t('Admin gallery.gallery') . " " . $item->title;
        $this->data['back_url'] = route('admin.pages.main');
    }

    private function gallery_interiorDesign($key) {
        $item = Page::getPage($key);
        $this->data['title'] = t('Admin gallery.gallery') . " " . $item->title;
        $this->data['back_url'] = route('admin.pages.main');
    }

    private function gallery_news($key) {
        $item = Page::getPage($key);
        $this->data['title'] = t('Admin gallery.gallery') . " " . $item->title;
        $this->data['back_url'] = route('admin.pages.main');
    }

    private function gallery_news_item($key) {
        $item = News::getItem($key);
        $this->data['title'] = t('Admin gallery.gallery') . " " . $item->title;
        $this->data['back_url'] = route('admin.news.main');
    }

    private function gallery_collections_item($key) {
        $item = Collection::getItem($key);
        $this->data['title'] = t('Admin gallery.gallery') . " " . $item->title;
        $this->data['back_url'] = route('admin.collections.main');
        $this->set([
            [
                'width' => 800,
                'height' => 800,
                'entityPath' => 'gallery',
                'size' => 'thumbnail',
            ],
            [
                'width' => 270,
                'height' => 270,
                'entityPath' => 'gallery',
                'size' => 'small',
            ]
        ]);
    }

    private function gallery_items_item($key) {
        $item = Item::query()->where('id', $key)->firstOrFail();
        $this->data['title'] = t('Admin gallery.gallery') . " " . $item->title;
        $this->data['back_url'] = route('admin.items.index');
        $this->set([
            [
                'width' => 800,
                'height' => 800,
                'entityPath' => 'gallery',
                'size' => 'thumbnail',
            ],
            [
                'width' => 270,
                'height' => 270,
                'entityPath' => 'gallery',
                'size' => 'small',
            ]
        ]);
    }

    private function gallery_services_item($key) {
        $item = Service::getItem($key);
        $this->data['title'] = t('Admin gallery.gallery') . " " . $item->title;
        $this->data['back_url'] = route('admin.news.main');
    }

    private function gallery_banner($key) {
        $item = Page::getPage($key);
        $this->data['title'] = t('Admin gallery.gallery') . " " . $item->title;
        $this->data['back_url'] = route('admin.pages.main');
    }

    private function gallery_loan($key) {
        $item = Page::getPage($key);
        $this->data['title'] = t('Admin gallery.gallery') . " " . $item->title;
        $this->data['back_url'] = route('admin.pages.main');
    }

    private function gallery_promotions($key) {
        $item = Page::getPage($key);
        $this->data['title'] = t('Admin gallery.gallery') . " " . $item->title;
        $this->data['back_url'] = route('admin.pages.main');
    }

    private function gallery_discounts($key) {
        $item = Page::getPage($key);
        $this->data['title'] = t('Admin gallery.gallery') . " " . $item->title;
        $this->data['back_url'] = route('admin.pages.main');
    }

    private function gallery_newItems($key) {
        $item = Page::getPage($key);
        $this->data['title'] = t('Admin gallery.gallery') . " " . $item->title;
        $this->data['back_url'] = route('admin.pages.main');
    }
}
