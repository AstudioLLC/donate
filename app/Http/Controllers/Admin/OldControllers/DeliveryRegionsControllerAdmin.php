<?php

namespace App\Http\Controllers\Admin;

use App\Models\DeliveryRegion;
use App\Services\Notify\Facades\Notify;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class DeliveryRegionsControllerAdmin extends AdminBaseController
{
    public function main()
    {
        $data['title'] = t('Admin Sidebar.Delivery and prices');
        $data['items'] = DeliveryRegion::adminList();

        return view('admin.pages.delivery_regions.main', $data);
    }

    public function add()
    {
        $data['title'] = t('Admin pages titles.add');
        $data['edit'] = false;
        $data['back_url'] = route('admin.delivery_regions.main');

        return view('admin.pages.delivery_regions.form', $data);
    }

    public function add_put(Request $request)
    {
        $inputs = $request->all();
        $this->validator($inputs, false)->validate();
        if (DeliveryRegion::action(null, $inputs)) {
            Notify::success(t('Admin action notify.success added'));

            return redirect()->route('admin.delivery_regions.main');
        } else {
            Notify::get(t('Admin action notify.something wrong'));

            return redirect()->back()->withInput();
        }
    }

    public function edit($id)
    {
        $data['item'] = DeliveryRegion::getItem($id);
        $data['back_url'] = route('admin.delivery_regions.main');
        $data['title'] = t('Admin pages titles.edit') . " - " . $data['item']->title;
        $data['edit'] = true;

        return view('admin.pages.delivery_regions.form', $data);
    }

    public function edit_patch($id, Request $request)
    {
        $item = DeliveryRegion::getItem($id);
        $inputs = $request->all();
        $this->validator($inputs, $item->id)->validate();
        if (DeliveryRegion::action($item, $inputs)) {
            Notify::success(t('Admin action notify.success edited'));

            return redirect()->route('admin.delivery_regions.main');
            //return redirect()->route('admin.delivery_regions.edit', ['id' => $item->id]);
        } else {
            Notify::get(t('Admin action notify.something wrong'));

            return redirect()->back()->withInput();
        }
    }

    public function delete(Request $request)
    {
        $result = ['success' => false];
        $id = $request->input('item_id');
        if ($id && is_id($id)) {
            $item = DeliveryRegion::where('id', $id)->first();
            if ($item && DeliveryRegion::deleteItem($item)) $result['success'] = true;
        }

        return response()->json($result);
    }

    public function sort()
    {
        return DeliveryRegion::sortable();
    }

    private function validator($inputs, $ignore = false)
    {
        return Validator::make($inputs, [
            'title' => 'required|array',
            'title.*' => 'string|nullable|max:255',
        ]);
    }
}
