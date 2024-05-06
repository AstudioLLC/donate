<?php

namespace App\Http\Controllers\Admin;

use App\Models\DeliveryCity;
use App\Models\DeliveryRegion;
use App\Services\Notify\Facades\Notify;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class DeliveryCitiesControllerAdmin extends AdminBaseController
{
    public function main($id)
    {
        $data = [];
        $data['region'] = DeliveryRegion::getItem($id);
        $data['items'] = $data['region']->cities;
        $data['title'] = t('Admin Sidebar.Localities of the region') . '"' . $data['region']->title . '"';
        $data['back_url'] = route('admin.delivery_regions.main');

        return view('admin.pages.delivery_cities.main', $data);
    }

    public function add($id)
    {
        $data['region'] = DeliveryRegion::getItem($id);
        $data['title'] = t('Admin pages titles.add');
        $data['edit'] = false;
        $data['back_url'] = route('admin.delivery_regions.main', ['id' => $data['region']->id]);

        return view('admin.pages.delivery_cities.form', $data);
    }

    public function add_put($id, Request $request)
    {
        $region = DeliveryRegion::getItem($id);
        $inputs = $request->all();
        $this->validator($inputs)->validate();
        $inputs['region_id'] = $region->id;
        if (DeliveryCity::action(null, $inputs)) {
            Notify::success(t('Admin action notify.success added'));

            return redirect()->route('admin.delivery_cities.main', ['id' => $region->id]);
        } else {
            Notify::get(t('Admin action notify.something wrong'));

            return redirect()->back()->withInput();
        }
    }

    public function edit($id)
    {
        $data['item'] = DeliveryCity::getItem($id);
        $data['region'] = $data['item']->region;
        $data['title'] = t('Admin pages titles.edit') . " - " . $data['item']->title;
        $data['edit'] = true;
        $data['back_url'] = route('admin.delivery_cities.main', ['id' => $data['region']->id]);

        return view('admin.pages.delivery_cities.form', $data);
    }

    public function edit_patch($id, Request $request)
    {
        $item = DeliveryCity::getItem($id);
        $region = DeliveryRegion::getItem($item->region_id);
        $inputs = $request->all();
        $this->validator($inputs)->validate();
        if (DeliveryCity::action($item, $inputs)) {
            Notify::success(t('Admin action notify.success edited'));

            return redirect()->route('admin.delivery_cities.edit', ['id' => $region->id]);
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
            $item = DeliveryCity::where('id', $id)->first();
            if ($item && DeliveryCity::deleteItem($item)) $result['success'] = true;
        }

        return response()->json($result);
    }

    public function validator($inputs)
    {
        return Validator::make($inputs, [
            'title' => 'required|array',
            'title.*' => 'string|nullable|max:255',
            'price' => 'required|numeric|between:1,1000000000',
            'min_price' => 'nullable|numeric|between:1,1000000000',
        ]);
    }
}
