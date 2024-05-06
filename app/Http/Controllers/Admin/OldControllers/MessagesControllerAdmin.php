<?php

namespace App\Http\Controllers\Admin;

use App\Models\Message;
use App\Services\Notify\Facades\Notify;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class MessagesControllerAdmin extends AdminBaseController
{
    public function main()
    {
        $data['title'] = t('Admin header.Letters');
        $data['items'] = Message::adminList();
        return view('admin.pages.messages.main', $data);
    }

    public function view($id)
    {
        $data = [];
        $data['item'] = Message::where('id', $id)->firstOrFail();
        $data['item']->message = json_decode($data['item']->message);
        $data['title'] = t('Admin header.Letters') . ' "' . $data['item']->page . '"';

        return view('admin.pages.messages.view', $data);
    }

    public function edit($id)
    {
        $data['item'] = News::getItemAdmin($id);
        $data['back_url'] = route('admin.news.main');
        $data['title'] = t('Admin pages titles.edit') . " - " . $data['item']->title;
        $data['edit'] = true;
        return view('admin.pages.news.form', $data);
    }

    public function edit_patch($id, Request $request)
    {
        $item = News::getItemAdmin($id);
        $validator = $this->validator($request, $id, $item);
        $validator['validator']->validate();
        if(News::action($item, $validator['inputs'])) {
            Notify::success(t('Admin action notify.success edited'));
            //return redirect()->route('admin.news.edit', ['id'=>$item->id]);
            return redirect()->route('admin.news.main');
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
            $item = News::where('id',$id)->first();
            if ($item && News::deleteItem($item)) $result['success'] = true;
        }
        return response()->json($result);
    }

    public function deleteImage(Request $request)
    {
        $result = ['success' => false];
        $id = $request->input('item_id');
        if ($id && is_id($id)) {
            $item = News::where('id', $id)->first();
            if ($item && News::deleteImage($item)) $result['success'] = true;
        }
        return response()->json($result);
    }

    private function validator($request, $ignore = false, $page = null)
    {
        $inputs = $request->all();
        if (!empty($inputs['url'])) $inputs['url'] = lower_case($inputs['url']);
        $inputs['generated_url'] = !empty($inputs['title'][$this->urlLang]) ? to_url($inputs['title'][$this->urlLang]) : null;
        $request->merge(['url' => $inputs['url']]);
        $unique = $ignore === false ? null : ',' . $ignore;
        $result = [];
        $rules = [
            'generated_url' => 'required_with:generate_url|string|nullable',
            'title' => 'required|array',
            'title.*' => 'required|string|max:255',
            'image' => ($ignore?'nullable':'required').'|image|mimes:jpeg,png',
            'image_alt' => 'nullable|string|max:255',
            'image_title' => 'nullable|string|max:255',
        ];
        if (empty($inputs['generate_url'])) {
            $rules['url'] = 'required|is_url|string|unique:pages,url' . $unique . '|min:3|nullable';
            if (!$page || $page->url !== $inputs['url']) {
                $rules['url'] .= '|not_in_routes';
            }
        }
        $result['validator'] = Validator::make($inputs, $rules, [
            'generated_url.required_with' => 'Введите название (' . $this->urlLang . ') чтобы сгенерировать URL.',
            'title.*.required' => 'Введите название ',
            'url.required' => 'Введите URL или подставьте галочку "сгенерировать автоматический".',
            'url.is_url' => 'Неправильный URL.',
            'url.unique' => 'URL уже используется.',
            'url.not_in_routes' => 'URL уже используется.',
            'url.min' => 'URL должен содержать мин. 3 символов.',
        ]);
        $result['inputs'] = $inputs;

        return $result;
    }
}
