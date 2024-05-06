<?php

namespace App\Http\Controllers\Admin;

use App\Models\CountryFilter;
use App\Services\Notify\Facades\Notify;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CountryFiltersControllerAdmin extends AdminBaseController
{
    public function filtersList()
    {
        $pageData['filters'] = CountryFilter::sort()->get();

        return view('admin.pages.country_filters.list', $pageData);
    }

    public function create(Request $request)
    {
        if ($request->isMethod('post')) {
            $request->validate([
                'name' => 'required|array',
                'name.*' => 'required|string|max:255',
                'image' => 'nullable|image|mimes:jpeg,jpg,png'
            ]);

            $filtersModel = new CountryFilter();
            $response = $filtersModel->addFilter($request->input());

            if ($response) {
                Notify::success('Фильтр добавлен', $title = null, $options = []);

                return redirect()->route('admin.countryFilters.list');
            } else {
                Notify::error('Произошла ошибка', $title = null, $options = []);
            }
        }

        return view('admin.pages.country_filters.add');
    }

    public function update($id, Request $request)
    {
        if ($request->isMethod('post')) {
            $request->validate([
                'name' => 'required|array',
                'name.*' => 'required|string|max:255',
                'image' => 'nullable|image|mimes:jpeg,jpg,png',
            ]);
            $response = CountryFilter::editFilter($id, $request->input());

            if ($response) {
                Notify::success('Изменения сохранены', $title = null, $options = []);

                return redirect()->route('admin.countryFilters.list');
            } else {
                Notify::error('Произошла ошибка', $title = null, $options = []);
            }
        }

        $pageData['filter'] = CountryFilter::query()->where('id', $id)->firstOrFail();

        return view('admin.pages.country_filters.edit', $pageData);
    }

    public function deleteImage(Request $request)
    {
        $result = ['success' => false];
        $id = $request->input('item_id');
        if ($id && is_id($id)) {
            $item = CountryFilter::where('id', $id)->first();
            if ($item && CountryFilter::deleteImage($item)) $result['success'] = true;
        }
        return response()->json($result);
    }

    public function delete($id)
    {
        if ($id && is_id($id)) {
            $item = CountryFilter::where('id',$id)->first();
            if ($item && CountryFilter::deleteItem($item)) {
                return response()->make('Deleted');
            }
        }

        return response()->make('Unprocessable entity')->setStatusCode(Response::HTTP_UNPROCESSABLE_ENTITY);
    }

    public function sort()
    {
        return CountryFilter::sortable();
    }
}
