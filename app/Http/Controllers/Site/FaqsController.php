<?php

namespace App\Http\Controllers\Site;

use App\Models\News;
use App\Models\Page;

class FaqsController extends BaseController
{
    protected function detail($url)
    {
        $page = Page::where(['static' => 'faq', 'active' => 1])->firstOrFail();
        $items = Page::where('active', 1)->whereHas('faq')->with('faq')->sort()->get();
        $active = Page::where(['active' => 1, 'url' => $url])->firstOrFail();

        $this->renderSEO($active);
        $breadcrumbs = $this->renderBreadcrumbs($page, $active);

        return response()
            ->view('site.pages.faq.detail', compact('page','items', 'breadcrumbs', 'active'));
    }
}
