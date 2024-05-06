<?php

namespace App\Http\Controllers\Site;

use App\Models\OurPublication;
use App\Models\Page;

class OurPublicationController extends BaseController
{
    protected function detail($url)
    {
        $page = Page::where(['static' => 'our_publications', 'active' => 1])->firstOrFail();
        $item = OurPublication::where(['url' => $url, 'active' => 1])->firstOrFail();
        $this->renderSEO($item);
        $breadcrumbs = $this->renderBreadcrumbs($page, $item);

        return response()
            ->view('site.pages.our_publications.detail', compact('page', 'item',  'breadcrumbs'));
    }
}
