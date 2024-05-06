<?php

namespace App\Http\Controllers\Admin;

use App\Services\Notify\Facades\Notify;
use App\Services\Support\Str;
use Illuminate\Http\Request;
use Zakhayko\Translator\Facades\TranslatorModel;

class TranslationsControllerAdmin extends AdminBaseController
{
    private function getLocale($locale)
    {
        $thisLocale = collect($this->shared['languages'])->where('iso', $locale)->first();
        if (!$thisLocale) abort(404);

        return $thisLocale;
    }

    public function main($locale)
    {
        $thisLocale = $this->getLocale($locale);
        $data = ['locale' => $locale];
        $data['title'] = t('Admin pages titles.translates') . ' - ' .$thisLocale['title'];
        $data['back_url'] = route('admin.languages.main');
        $data['items'] = TranslatorModel::getFiles();

        return view('admin.pages.translations.main', $data);
    }

    public function edit($locale, $filename)
    {
        $data = ['back_url' => route('admin.languages.main')];
        $thisLocale = $this->getLocale($locale);
        $data['fileContent'] = TranslatorModel::getFile($filename);
        if ($data['fileContent'] === null) abort(404);
        $data['locale'] = $locale;
        $data['filename'] = $filename;
        $fileTitle = Str::title($filename);
        $data['title'] = 'Перевод слов файла "' . $fileTitle . '" на "' . $thisLocale['title'] . '"';
        $data['title'] = t('Admin pages titles.translates') . ' "' . $fileTitle . '" - "' . $thisLocale['title'] . '"';

        return view('admin.pages.translations.form', $data);
    }

    public function edit_patch($locale, $filename, Request $request)
    {
        $this->getLocale($locale);
        if (!TranslatorModel::hasFile($filename)) abort(404);
        $t = $request->input('t');
        if (!$t || !is_array($t)) {
            Notify::get(t('Admin action notify.something wrong'));

            return redirect()->back()->withInput();
        }
        TranslatorModel::putContents($locale, $filename, $t);
        Notify::get(t('Admin action notify.success saved'));

        return redirect()->back();
    }
}
