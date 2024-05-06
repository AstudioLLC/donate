<?php

namespace App\Http\Controllers\Admin;

use App\Models\Collection;
use App\Services\Notify\Facades\Notify;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CollectionsControllerAdmin extends AdminBaseController
{
    public function main()
    {
        $data = ['title'=>t('Admin Sidebar.Collections')];
        $data['items'] = Collection::adminList();
        return view('admin.pages.collections.main', $data);
    }

    public function add()
    {
        $data = ['title'=>t('Admin pages titles.add'), 'edit'=>false];
        $data['back_url'] = route('admin.collections.main');
        return view('admin.pages.collections.form', $data);
    }

    public function add_put(Request $request)
    {
        $checkQuery = Collection::query()
            ->whereRaw('JSON_EXTRACT(title, "$.'.$this->lang.'") = "'.$request->get('title')[$this->lang].'"')
            ->get();
        if (count($checkQuery)) {
            Notify::error(t('Admin action notify.error unique'));
            return redirect()->back()->withInput();
        }
        $validator = $this->validator($request);
        $validator['validator']->validate();
        if(Collection::action(null, $validator['inputs'])) {
            Notify::success(t('Admin action notify.success added'));
            return redirect()->route('admin.collections.main');
        }
        else {
            Notify::get(t('Admin action notify.something wrong'));
            return redirect()->back()->withInput();
        }
    }

    public function edit($id)
    {
        $data['back_url'] = route('admin.collections.main');
        $data['item'] = Collection::getItem($id);
        $data['title'] = t('Admin pages titles.edit') . " - " . $data['item']->title;
        $data['edit'] = true;
        return view('admin.pages.collections.form', $data);
    }

    public function edit_patch($id, Request $request)
    {
        $item = Collection::getItem($id);
        $checkQuery = Collection::query()
            ->where('id', '!=', $item->id)
            ->whereRaw('JSON_EXTRACT(title, "$.'.$this->lang.'") = "'.$request->get('title')[$this->lang].'"')
            ->get();
        if (count($checkQuery)) {
            Notify::error(t('Admin action notify.error unique'));
            return redirect()->back()->withInput();
        }
        $validator = $this->validator($request, $id, $item);
        $validator['validator']->validate();
        if(Collection::action($item, $validator['inputs'])) {
            Notify::success(t('Admin action notify.success edited'));
            return redirect()->route('admin.collections.main');
        }
        else {
            Notify::get(t('Admin action notify.something wrong'));
            return redirect()->back()->withInput();
        }
    }

    public function delete(Request $request)
    {
        $result = ['success'=>false];
        $id = $request->input('item_id');
        if ($id && is_id($id)) {
            $item = Collection::where('id',$id)->first();
            if ($item && Collection::deleteItem($item)) $result['success'] = true;
        }
        return response()->json($result);
    }

    public function deleteImage(Request $request)
    {
        $result = ['success' => false];
        $id = $request->input('item_id');
        if ($id && is_id($id)) {
            $item = Collection::where('id', $id)->first();
            if ($item && Collection::deleteImage($item)) $result['success'] = true;
        }
        return response()->json($result);
    }

    public function sort()
    {
        return Collection::sortable();
    }

    private function validator($request, $ignore = false, $page = null)
    {
        $inputs = $request->all();
        /*if (!empty($inputs['url'])) $inputs['url'] = lower_case($inputs['url']);
        $inputs['generated_url'] = !empty($inputs['title'][$this->urlLang]) ? to_url($inputs['title'][$this->urlLang]) : null;
        $request->merge(['url' => $inputs['url']]);*/
        $unique = $ignore === false ? null : ',' . $ignore;
        $result = [];
        $rules = [
            //'generated_url' => 'required_with:generate_url|string|nullable',
            'title' => 'required|array',
            'title.*' => 'required|string|max:255',
            'code' => 'nullable|string|max:255',
            'image' => ($ignore?'nullable':'required').'|image|mimes:jpeg,jpg,png',
            //'image_alt' => 'nullable|string|max:255',
            //'image_title' => 'nullable|string|max:255',
        ];
        /*if (empty($inputs['generate_url'])) {
            $rules['url'] = 'required|is_url|string|unique:pages,url' . $unique . '|min:3|nullable';
            if (!$page || $page->url !== $inputs['url']) {
                $rules['url'] .= '|not_in_routes';
            }
        }*/
        $result['validator'] = Validator::make($inputs, $rules, [
            'title.*.required' => 'Введите название ',
            /*'generated_url.required_with' => 'Введите название (' . $this->urlLang . ') чтобы сгенерировать URL.',
            'url.required' => 'Введите URL или подставьте галочку "сгенерировать автоматический".',
            'url.is_url' => 'Неправильный URL.',
            'url.unique' => 'URL уже используется.',
            'url.not_in_routes' => 'URL уже используется.',
            'url.min' => 'URL должен содержать мин. 3 символов.',*/
        ]);
        $result['inputs'] = $inputs;

        return $result;
    }
}
