<?php

namespace App\Http\Controllers\Admin;

use App\Models\Language;
use App\Services\Notify\Facades\Notify;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class LanguagesControllerAdmin extends AdminBaseController
{
    public function main()
    {
        $data = [];
        $data['title'] = t('Admin Sidebar.Languages');
        $data['languages'] = Language::getAll();
        $data['settings'] = $this->get_settings();

        return view('admin.pages.languages.main', $data);
    }

    public function editLanguage(Request $request)
    {
        $settings = $this->get_settings();
        Language::clearCaches();
        $validator = Validator::make($request->all(), [
            'language_id' => 'required|numeric',
            'active' => 'nullable|numeric|min:-1|max:1',
        ]);
        if ($validator->fails()) $notifyError = true;
        else {
            $model = Language::find($request->input('language_id'));
            if (!$model) $notifyError = true;
        }
        if (!empty($notifyError)) {
            Notify::get(t('Admin action notify.something wrong'));
        } else {
            if (!$model->default) {
                $newActive = $request->input('active');
                if ($newActive !== null) $model->active = $newActive;
            }
            $settingsUpdate = [];
            if ($request->input('default_in_admin') == '1' && $settings['admin_language'] !== $model->id) {
                $settingsUpdate['admin_language'] = $model->id;
            }
            if ($request->input('url_language') == '4' && $settings['url_language'] !== $model->id) {
                $settingsUpdate['url_language'] = $model->id;
            }
            if (arraySize($settingsUpdate)) {
                settings($settingsUpdate);
            }
            $model->save();
            Notify::get(t('Admin action notify.success saved'));
        }

        return redirect()->route('admin.languages.main');
    }

    private function get_settings()
    {
        return [
            'default_language' => settings('default_language', 1),
            'admin_language' => settings('admin_language', 1),
            'url_language' => settings('url_language', 4),
        ];
    }
    public function sort()
    {
        return Language::sortable();
    }
}
