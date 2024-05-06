<?php

namespace App\Http\Controllers\Admin;

use App\Models\Video;
use App\Services\Notify\Facades\Notify;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class VideosControllerAdmin extends AdminBaseController
{
    public function main()
    {
        $data['title'] = t('Admin Sidebar.Videos');
        $data['items'] = Video::adminList();

        return view('admin.pages.videos.main', $data);
    }

    public function add()
    {
        $data = [];
        $data['title'] = t('Admin pages titles.add');
        $data['back_url'] = route('admin.videos.main');
        $data['edit'] = false;

        return view('admin.pages.videos.form', $data);
    }

    public function add_put(Request $request)
    {
        $inputs = $request->all();
        $this->validator($inputs)->validate();
        if (Video::action(null, $inputs)) {
            Notify::success(t('Admin action notify.success added'));

            return redirect()->route('admin.videos.main');
        } else {
            Notify::get(t('Admin action notify.something wrong'));

            return redirect()->back()->withInput();
        }
    }

    public function edit($id)
    {
        $data = [];
        $data['item'] = Video::getItem($id);
        $data['title'] = t('Admin pages titles.edit');
        $data['back_url'] = route('admin.videos.main');
        $data['edit'] = true;

        return view('admin.pages.videos.form', $data);
    }

    public function edit_patch($id, Request $request)
    {
        $item = Video::getItem($id);
        $inputs = $request->all();
        $this->validator($inputs, true)->validate();
        if (Video::action($item, $inputs)) {
            Notify::success(t('Admin action notify.success edited'));

            return redirect()->route('admin.videos.main');
        } else {
            Notify::get(t('Admin action notify.something wrong'));

            return redirect()->back()->withInput();
        }
    }

    private function validator($inputs, $edit = false)
    {
        $result = [];
        $rules = !$edit ? [
            'video' => 'mimetypes:video/x-ms-asf,video/x-flv,video/mp4,application/x-mpegURL,video/MP2T,video/3gpp,video/quicktime,video/x-msvideo,video/x-ms-wmv,video/avi',
        ] : [
            'video' => 'mimetypes:video/x-ms-asf,video/x-flv,video/mp4,application/x-mpegURL,video/MP2T,video/3gpp,video/quicktime,video/x-msvideo,video/x-ms-wmv,video/avi',
        ];

        return Validator::make($inputs, $rules, [
            'video.video' => 'Неверный файл.',
        ]);
    }

    public function delete(Request $request)
    {
        $result = ['success' => false];
        $id = $request->input('item_id');
        if ($id && is_id($id)) {
            $page = Video::where('id', $id)->first();
            if ($page && Video::deleteItem($page)) $result['success'] = true;
        }

        return response()->json($result);
    }

    public function sort()
    {
        return Video::sortable();
    }
}
