<?php

namespace App\Http\Controllers\Admin;

use App\Models\Page;
use App\Services\Notify\Facades\Notify;
use App\Services\PageManager\Facades\PageManager;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PagesControllerAdmin extends AdminBaseController
{
    private function home_big_image_banners()
    {
        return [
            'home' => route('admin.banners', ['page' => 'home_big_image_banners']),
        ];
    }

    private function content_pages()
    {
        return [
            'about' => route('admin.banners', ['page' => 'about']),
            'loan' => route('admin.banners', ['page' => 'loan']),
            'measurement' => route('admin.banners', ['page' => 'measurement']),
            'interiorDesign' => route('admin.banners', ['page' => 'interiorDesign']),
            'home' => route('admin.banners', ['page' => 'home']),
            'news' => route('admin.banners', ['page' => 'news']),
            'about_project' => route('admin.banners', ['page' => 'about_project']),
            'catalog' => route('admin.banners', ['page' => 'catalog']),
            'promotions' => route('admin.banners', ['page' => 'promotions']),
            'discounts' => route('admin.banners', ['page' => 'discounts']),
            'newItems' => route('admin.banners', ['page' => 'newItems']),
        ];
    }

    private function gallery_pages()
    {
        return [
            //'home' => route('admin.gallery.show', ['gallery' => 'home', 'id' => Page::getStaticPage('home')->id]),
            'about' => route('admin.gallery.show', ['gallery' => 'about', 'id' => Page::getStaticPage('about')->id]),
            'loan' => route('admin.gallery.show', ['gallery' => 'loan', 'id' => Page::getStaticPage('loan')->id]),
            'measurement' => route('admin.gallery.show', ['gallery' => 'measurement', 'id' => Page::getStaticPage('loan')->id]),
            'interiorDesign' => route('admin.gallery.show', ['gallery' => 'interiorDesign', 'id' => Page::getStaticPage('interiorDesign')->id]),
            'promotions' => route('admin.gallery.show', ['gallery' => 'promotions', 'id' => Page::getStaticPage('promotions')->id]),
            'discounts' => route('admin.gallery.show', ['gallery' => 'discounts', 'id' => Page::getStaticPage('promotions')->id]),
            'newItems' => route('admin.gallery.show', ['gallery' => 'newItems', 'id' => Page::getStaticPage('promotions')->id]),
        ];
    }

    private function file_pages()
    {
        $static_pages = Page::query()->where('static', '!=', null)->get();
        $file_pages = array();
        if (count($static_pages)) {
            foreach ($static_pages as $page) {
                if ($page->static != 'home') {
                    $file_pages[$page->static] = route('admin.file.main', ['file' => $page->static, 'key' => $page->id]);
                }
            }
        }
        return $file_pages;
        /*return [
            //'home' => route('admin.file.main', ['file' => 'home', 'key' => Page::getStaticPage('home')->id]),
            //'about' => route('admin.file.main', ['file' => 'about', 'key' => Page::getStaticPage('about')->id]),
        ];*/
    }

    private function video_gallery_pages()
    {
        return [
            //'about'=>route('admin.video_gallery', ['gallery'=>'about']),
            //'news'=>route('admin.video_gallery', ['gallery'=>'news']),
            //'restaurant'=>route('admin.video_gallery', ['gallery'=>'restaurant']),

        ];
    }

    public function main()
    {

        /*$fileName = 'file:///C:/OpenServer/domains/rv-comfort/public/u/webdata/offers0_1.xml';

        $xml = simplexml_load_file($fileName);
        //dd($xml->Классификатор->Группы);
        dd($xml->ПакетПредложений->Предложения->Предложение->Артикул);*/

        $data = [];
        $data['home_big_image_banners'] = $this->home_big_image_banners();
        $data['content_pages'] = $this->content_pages();
        $data['gallery_pages'] = $this->gallery_pages();
        $data['video_gallery_pages'] = $this->video_gallery_pages();
        $data['file_pages'] = $this->file_pages();
        $data['title'] = t('Admin Sidebar.Pages');
        $data['pages'] = Page::adminList();

        return view('admin.pages.pages.main', $data);
    }

    public function addPage()
    {
        $data = [];
        $data['title'] = t('Admin pages titles.add');
        $data['edit'] = false;
        $data['back_url'] = route('admin.pages.main');
        $data['homepage'] = PageManager::getHomePage();

        return view('admin.pages.pages.form', $data);
    }

    public function addPage_put(Request $request)
    {
        $validator = $this->validator($request);
        $validator['validator']->validate();
        if (Page::actionPage(null, $validator['inputs'])) {
            Notify::success(t('Admin action notify.success added'));

            return redirect(route('admin.pages.main'));
        } else {
            Notify::get(t('Admin action notify.something wrong'));

            return redirect()->back()->withInput();
        }
    }

    public function editPage($id)
    {
        $data = [];
        $data['page'] = Page::getPage($id);
        $data['back_url'] = route('admin.pages.main');
        $data['title'] = t('Admin pages titles.edit') . " - " . $data['page']->title;
        $data['edit'] = true;
        $data['homepage'] = PageManager::getHomePage();

        return view('admin.pages.pages.form', $data);
    }

    public function editPage_patch($id, Request $request)
    {
        $page = Page::getPage($id);
        $validator = $this->validator($request, $id, $page);
        $validator['validator']->validate();
        if (Page::actionPage($page, $validator['inputs'])) {
            Notify::success(t('Admin action notify.success edited'));

            return redirect()->route('admin.pages.edit', ['id' => $id]);
        } else {
            Notify::get(t('Admin action notify.something wrong'));

            return redirect()->back()->withInput();
        }
    }

    public function deletePage_delete(Request $request)
    {
        $result = ['success' => false];
        $id = $request->input('page_id');
        if ($id && is_id($id)) {
            $page = Page::where(['id' => $id, 'static' => null])->first();
            if ($page && Page::deletePage($page)) $result['success'] = true;
        }

        return response()->json($result);
    }

    public function deleteImage(Request $request)
    {
        $result = ['success' => false];
        $id = $request->input('item_id');
        if ($id && is_id($id)) {
            $item = Page::where(['id' => $id, 'static' => null])->first();
            if ($item && Page::deleteImage($item)) $result['success'] = true;
        }
        return response()->json($result);
    }

    public function sort()
    {
        return Page::sortable();
    }

    private function validator($request, $ignore = false, $page = null)
    {
        $inputs = $request->all();
        if ($page && $page->static == PageManager::getHomePage()) {
            $inputs['url'] = $page->url;
        }
        if (!empty($inputs['url'])) $inputs['url'] = lower_case($inputs['url']);
        $inputs['generated_url'] = !empty($inputs['title'][$this->urlLang]) ? to_url($inputs['title'][$this->urlLang]) : null;
        $request->merge(['url' => $inputs['url']]);
        $unique = $ignore === false ? null : ',' . $ignore;
        $result = [];
        $rules = [
            'generated_url' => 'required_with:generate_url|string|nullable',
            'title' => 'required|array',
            'title.*' => 'required|string|max:255',
        ];
        if (empty($inputs['generate_url'])) {
            $rules['url'] = 'required|is_url|string|unique:pages,url' . $unique . '|min:3|nullable';
            if (!$page || $page->url !== $inputs['url']) {
                $rules['url'] .= '|not_in_routes';
            }
        }
        $result['validator'] = Validator::make($inputs, $rules, [
            'generated_url.required_with' => 'Введите название (' . $this->urlLang . ') чтобы сгенерировать URL.',
            'title.*.required' => 'Введите название ',
            'url.required' => 'Введите URL или подставьте галочку "сгенерировать автоматический".',
            'url.is_url' => 'Неправильный URL.',
            'url.unique' => 'URL уже используется.',
            'url.not_in_routes' => 'URL уже используется.',
            'url.min' => 'URL должен содержать мин. 3 символов.',
        ]);
        $result['inputs'] = $inputs;

        return $result;
    }
}
