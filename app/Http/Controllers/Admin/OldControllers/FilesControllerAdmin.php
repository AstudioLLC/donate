<?php

namespace App\Http\Controllers\Admin;

use App\Models\File;
use App\Models\Page;
use App\Services\Notify\Facades\Notify;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class FilesControllerAdmin extends AdminBaseController
{
    public function main($file, $key)
    {
        $data['title'] = t('Admin Sidebar.Files');
        $data['items'] = File::adminList($file, $key);
        $data['file'] = $file;
        $data['key'] = $key;
        return view('admin.pages.file.main', $data);
    }

    public function add($file, $key)
    {
        $data['title'] = t('Admin pages titles.add');
        $data['edit'] = false;
        $data['file'] = $file;
        $data['key'] = $key;
        $data['back_url'] = route('admin.file.main', ['file' => $file, 'key' => $key]);
        return view('admin.pages.file.form', $data);
    }

    public function add_put($file, $key, Request $request)
    {
        $validator = $this->validator($request);
        $validator['validator']->validate();
        if(File::action(null, $validator['inputs'])) {
            Notify::success(t('Admin action notify.success added'));
            return redirect()->route('admin.file.main', ['file' => $file, 'key' => $key]);
        }
        else {
            Notify::get(t('Admin action notify.something wrong'));
            return redirect()->back()->withInput();
        }
    }

    public function edit($file, $key, $id)
    {
        $data['item'] = File::getItem($id);
        $data['file'] = $file;
        $data['key'] = $key;
        $data['back_url'] = route('admin.file.main', ['file' => $file, 'key' => $key]);
        $data['title'] = t('Admin pages titles.edit') . " - " . $data['item']->title;
        $data['edit'] = true;
        return view('admin.pages.file.form', $data);
    }

    public function edit_patch($file, $key, $id, Request $request)
    {
        $item = File::getItem($id);
        $validator = $this->validator($request, $id, $item);
        $validator['validator']->validate();
        if(File::action($item, $validator['inputs'])) {
            Notify::success(t('Admin action notify.success edited'));
            return redirect()->route('admin.file.main', ['file' => $file, 'key' => $key]);
        }
        else {
            Notify::get(t('Admin action notify.something wrong'));
            return redirect()->back()->withInput();
        }
    }

    public function delete(Request $request)
    {
        $result = ['success' => false];
        $id = $request->input('item_id');
        if ($id && is_id($id)) {
            $item = File::where('id', $id)->first();
            if ($item && File::deleteItem($item)) $result['success'] = true;
        }
        return response()->json($result);
    }

    public function sort()
    {
        return File::sortable();
    }

    private function validator($request, $ignore = false, $page = null)
    {
        $inputs = $request->all();
        $rules = [
            'title' => 'required|array',
            'title.*' => 'nullable|string|max:255',
            'file' => ($ignore ? 'nullable' : 'required').'|max:20480|mimes:doc,docx,xlsx,xls,csv,pdf',
            'imageSmall' => 'nullable|image|max:2048|mimes:jpg,jpeg,png',
            'imageBig' => 'nullable|image|max:2048|mimes:jpg,jpeg,png',
        ];
        $result['validator'] = Validator::make($inputs, $rules, [
            'title.*.required' => 'Введите название!',
            'file.required' => 'Загрузите файл!',
            'file.mimes' => 'Допустимые форматы doc, docx, xlsx, xls, csv, pdf.',
            'file.max' => 'Максимальный размер файла 20мб.',
            'imageSmall.image' => 'Неверное изображение.',
            'imageSmall.mimes' => 'Допустимые форматы jpg, jpeg, png.',
            'imageSmall.max' => 'Максимальный размер файла 20мб.',
            'imageBig.image' => 'Неверное изображение.',
            'imageBig.mimes' => 'Допустимые форматы jpg, jpeg, png.',
            'imageBig.max' => 'Максимальный размер файла 20мб.',
        ]);
        $result['inputs'] = $inputs;

        return $result;
    }
}
