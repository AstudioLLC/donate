<?php

namespace App\Http\Controllers\Admin;

use App\Models\Filter;
use App\Services\Notify\Facades\Notify;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use ReflectionException;

class FiltersControllerAdmin extends AdminBaseController
{
    public function filtersList()
    {
        $pageData['title'] = t('Admin Sidebar.Filters');
        $pageData['filters'] = Filter::sort()->get();

        return view('admin.pages.filters.list', $pageData);
    }

    public function create(Request $request)
    {
        if ($request->isMethod('post')) {
            $request->validate([
                'name' => 'array|required',
                'name.*' => 'string|required|max:255',
                'criterion' => 'required|array',
                'criterion.new' => 'required|array',
                'criterion.new.*.*' => 'required|string',
            ]);

            $filtersModel = new Filter;
            if ($filtersModel->fillRequest($request)) {
                Notify::success(t('Admin action notify.success added'), $title = null, $options = []);
            } else {
                Notify::error(t('Admin action notify.something wrong'), $title = null, $options = []);
            }
        }
        $pageData['title'] = t('Admin pages titles.add');

        return view('admin.pages.filters.add', $pageData);
    }

    public function update($id, Request $request)
    {
        if ($request->isMethod('post')) {
            $request->validate([
                'name' => 'array|required',
                'name.*' => 'string|required|max:255',
                'criterion' => 'required|array',
                'criterion.old.*.*' => 'required|string',
                'criterion.new' => 'array',
                'criterion.new.*.*' => 'required|string',
            ]);

            /** @var Filter $filter */
            $filter = Filter::query()->where('id', $id)->firstOrFail();
            if ($filter->fillRequest($request)) {
                Notify::success(t('Admin action notify.success edited'), $title = null, $options = []);

                return redirect()->route('admin.filters.list');
            } else {
                Notify::error(t('Admin action notify.something wrong'), $title = null, $options = []);
            }
        }

        $pageData['filter'] = Filter::with(['criteria'])->where('id', $id)->firstOrFail();
        $pageData['title'] = t('Admin pages titles.edit') . " - " . $pageData['filter']->name;

        return view('admin.pages.filters.edit', $pageData);
    }

    public function delete($id)
    {
        if (!Filter::deleteEntity($id)) {
            return response('Failed', Response::HTTP_UNPROCESSABLE_ENTITY);
        }

        return response('Deleted');
    }

    /**
     * @return array|JsonResponse
     * @throws ReflectionException
     */
    public function sort()
    {
        return Filter::sortable();
    }
}
