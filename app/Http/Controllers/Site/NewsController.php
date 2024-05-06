<?php

namespace App\Http\Controllers\Site;

use App\Models\News;
use App\Models\Page;

class NewsController extends BaseController
{
    protected function detail($url)
    {
        $page = Page::where(['static' => 'news', 'active' => 1])->firstOrFail();
        $item = News::where(['url' => $url, 'active' => 1])->firstOrFail();
        $items = News::where(['active' => 1])->where('url', '!=', $url)->inRandomOrder()->limit(10)->get();

        $this->renderSEO($item);
        $breadcrumbs = $this->renderBreadcrumbs($page, $item);

        return response()
            ->view('site.pages.news.detail', compact('page', 'item', 'items', 'breadcrumbs'));
    }
}
