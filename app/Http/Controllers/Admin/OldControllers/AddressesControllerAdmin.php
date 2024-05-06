<?php

namespace App\Http\Controllers\Admin;

use App\Models\Address;
use App\Services\Notify\Facades\Notify;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AddressesControllerAdmin extends AdminBaseController
{
    public function main()
    {
        $data['title'] = t('Admin Sidebar.addresses');
        $data['items'] = Address::adminList();
        return view('admin.pages.addresses.main', $data);
    }

    public function add()
    {
        $data['title'] = t('Admin pages titles.add');
        $data['edit'] = false;
        $data['back_url'] = route('admin.addresses.main');
        return view('admin.pages.addresses.form', $data);
    }

    public function add_put(Request $request)
    {
        $validator = $this->validator($request);
        $validator['validator']->validate();
        if(Address::action(null, $validator['inputs'])) {
            Notify::success(t('Admin action notify.success added'));
            return redirect()->route('admin.addresses.main');
        }
        else {
            Notify::get(t('Admin action notify.something wrong'));
            return redirect()->back()->withInput();
        }
    }

    public function edit($id)
    {
        $data['item'] = Address::getItemAdmin($id);
        $data['back_url'] = route('admin.addresses.main');
        $data['title'] = t('Admin pages titles.edit') . " - " . $data['item']->title;
        $data['edit'] = true;
        return view('admin.pages.addresses.form', $data);
    }

    public function edit_patch($id, Request $request)
    {
        $item = Address::getItemAdmin($id);
        $validator = $this->validator($request, $id, $item);
        $validator['validator']->validate();
        if(Address::action($item, $validator['inputs'])) {
            Notify::success(t('Admin action notify.success edited'));
            //return redirect()->route('admin.addresses.edit', ['id'=>$item->id]);
            return redirect()->route('admin.addresses.main');
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
            $item = Address::where('id',$id)->first();
            if ($item && Address::deleteItem($item)) $result['success'] = true;
        }
        return response()->json($result);
    }

    public function deleteImage(Request $request)
    {
        $result = ['success' => false];
        $id = $request->input('item_id');
        if ($id && is_id($id)) {
            $item = Address::where('id', $id)->first();
            if ($item && Address::deleteImage($item)) $result['success'] = true;
        }
        return response()->json($result);
    }

    public function sort()
    {
        return Address::sortable();
    }

    private function validator($request, $ignore = false, $page = null)
    {
        $inputs = $request->all();
        $result = [];
        $rules = [
            'title' => 'required|array',
            'title.*' => 'required|string|max:255',
            'phone' => 'nullable|string|max:255',
            'fax' => 'nullable|string|max:255',
            'email' => 'nullable|string|max:255',
            'coords' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png',
        ];
        $result['validator'] = Validator::make($inputs, $rules, [
            'title.*.required' => 'Введите название ',
        ]);
        $result['inputs'] = $inputs;

        return $result;
    }
}
