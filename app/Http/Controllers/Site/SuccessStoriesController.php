<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Page;
use App\Models\SuccessStory;
use Illuminate\Http\Request;

class SuccessStoriesController extends BaseController
{
    protected function detail($url)
    {
        $page = Page::where(['static' => 'success_stories', 'active' => 1])->firstOrFail();
        $item = SuccessStory::where(['url' => $url, 'active' => 1])->firstOrFail();

        $this->renderSEO($item);
        $breadcrumbs = $this->renderBreadcrumbs($page, $item);

        return response()
            ->view('site.pages.success_stories.detail', compact('page', 'item', 'breadcrumbs'));
    }
}
