<?php

namespace App\Http\Controllers\Site;

use App\Models\Service;

class ServicesController extends BaseController
{
    protected function detail($url)
    {
        $pageData['item'] = Service::query()->where('active', 1)->where('url', $url)->firstOrFail();

        $this->renderSEO($pageData['item']);

        $breadcrumbs = [];

        $breadcrumbs[] = [
            'title' => $pageData['item']->title,
            'url' => route('services.detail', ['url' => $pageData['item']->url])
        ];

        $pageData['breadcrumbs'] = $breadcrumbs;

        return view('site.pages.services.detail', $pageData);
    }
}
