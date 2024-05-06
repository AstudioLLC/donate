<?php

namespace App\Http\Controllers\Admin;

use App\Models\ColorFilter;
use App\Services\Notify\Facades\Notify;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ColorFiltersControllerAdmin extends AdminBaseController
{
    public function filtersList()
    {
        $pageData['filters'] = ColorFilter::sort()->get();

        return view('admin.pages.color_filters.list', $pageData);
    }

    public function create(Request $request)
    {
        if ($request->isMethod('post')) {
            $request->validate([
                'name' => 'required|array',
                'name.*' => 'required|string|max:255',
                'hex_color' => 'required|string',
            ]);

            $filtersModel = new ColorFilter();
            $response = $filtersModel->addFilter($request->input());

            if ($response) {
                Notify::success('Фильтр добавлен', $title = null, $options = []);
            } else {
                Notify::error('Произошла ошибка', $title = null, $options = []);
            }
        }

        return view('admin.pages.color_filters.add');
    }

    public function update($id, Request $request)
    {
        if ($request->isMethod('post')) {
            $request->validate([
                'name' => 'required|array',
                'name.*' => 'required|string|max:255',
                'hex_color' => 'required|string',
            ]);
            $response = ColorFilter::editFilter($id, $request->input());

            if ($response) {
                Notify::success('Изменения сохранены', $title = null, $options = []);

                return redirect()->route('admin.colorFilters.list');
            } else {
                Notify::error('Произошла ошибка', $title = null, $options = []);
            }
        }

        $pageData['filter'] = ColorFilter::query()->where('id', $id)->firstOrFail();

        return view('admin.pages.color_filters.edit', $pageData);
    }

    public function delete($id)
    {
        if (ColorFilter::query()->where('id', $id)->delete()) {
            return response()->make('Deleted');
        }

        return response()->make('Unprocessable entity')->setStatusCode(Response::HTTP_UNPROCESSABLE_ENTITY);
    }

    public function sort()
    {
        return ColorFilter::sortable();
    }
}
