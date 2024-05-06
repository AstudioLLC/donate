<?php

namespace App\Http\Controllers\Admin;

use App\Models\HomeBanner;
use App\Services\Notify\Facades\Notify;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class HomeBannersControllerAdmin extends AdminBaseController
{
    public function main()
    {
        $data['title'] = t('Admin Sidebar.HomeBanner');
        $data['items'] = HomeBanner::adminList();

        return view('admin.pages.home_banner.main', $data);
    }

    public function add()
    {
        $data = [];
        $data['title'] = t('Admin pages titles.add');
        $data['back_url'] = route('admin.home_banner.main');
        $data['edit'] = false;

        return view('admin.pages.home_banner.form', $data);
    }

    public function add_put(Request $request)
    {

        $inputs = $request->all();
        $this->validator($inputs)->validate();
        if (HomeBanner::action(null, $inputs)) {
            Notify::success(t('Admin action notify.success added'));

            return redirect()->route('admin.home_banner.main');
        } else {
            Notify::get(t('Admin action notify.something wrong'));

            return redirect()->back()->withInput();
        }
    }

    public function edit($id)
    {
        $data = [];
        $data['item'] = HomeBanner::getItem($id);
        $data['title'] = t('Admin pages titles.edit') . " - " . $data['item']->title;
        $data['back_url'] = route('admin.home_banner.main');
        $data['edit'] = true;

        return view('admin.pages.home_banner.form', $data);
    }

    public function edit_patch($id, Request $request)
    {
        $item = HomeBanner::getItem($id);
        $inputs = $request->all();
        $this->validator($inputs, true)->validate();
        if (HomeBanner::action($item, $inputs)) {
            Notify::success(t('Admin action notify.success edited'));

            return redirect()->route(t('Admin action notify.something wrong'));
        } else {
            Notify::get('error_occured');

            return redirect()->back()->withInput();
        }
    }

    public function delete(Request $request)
    {
        $result = ['success' => false];
        $id = $request->input('item_id');
        if ($id && is_id($id)) {
            $page = HomeBanner::where('id', $id)->first();
            if ($page && HomeBanner::deleteItem($page)) $result['success'] = true;
        }

        return response()->json($result);
    }

    public function sort()
    {
        return HomeBanner::sortable();
    }

    private function validator($inputs, $edit = false)
    {
        $result = [];
        $rules = !$edit ? [
            'image' => 'required|image',
        ] : [
            'image' => 'image',
        ];

        return Validator::make($inputs, $rules, [
            'image.image' => 'Неверное изоброжение.',
            'image.required' => 'Выберите изоброжение.'
        ]);
    }
}
