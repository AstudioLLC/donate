<?php

namespace App\Http\Controllers\Site;

use App\Models\CorporateDonor;
use App\Models\Donation;
use App\Models\Faq;
use App\Models\Fundraiser;
use App\Models\Gift;
use App\Models\News;
use App\Models\Page;
use App\Models\SuccessStory;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

class SearchController extends BaseController
{
    public function index(Request $request)
    {
        $searchQuery = $request->query('searchQuery');
        if (empty($request->query('searchQuery'))) {
            return redirect()->back();
        }

        $this->staticSEO(__('frontend.Search.Search'));

        $breadcrumbs = [
            [
                'title' => __('frontend.Search.Search'),
                'url' => ''
            ]
        ];

        $result = [];
        $query_parts = explode(' ', $request->query('searchQuery'));

        $pagesResult = Page::query()->where('active', 1)->where(function ($q) use ($query_parts) {
            foreach ($query_parts as $part) {
                $q->where('title', 'LIKE', '%' . $part . '%')
                    ->orWhere('content', 'LIKE', '%' . $part . '%')
                    ->orWhere('title_content', 'LIKE', '%' . $part . '%');
            }
        })->sort()->get();
        if (count($pagesResult)) {
            foreach ($pagesResult as $item) {
                array_push($result, $item);
            }
        }

        /*$corporateDonorsResult = CorporateDonor::query()->where('active', 1)->where(function ($q) use ($query_parts) {
            foreach ($query_parts as $part) {
                $q->where('title', 'LIKE', '%' . $part . '%')
                    ->orWhere('content', 'LIKE', '%' . $part . '%');
            }
        })->sort()->get();
        if (count($corporateDonorsResult)) {
            foreach ($corporateDonorsResult as $item) {
                array_push($result, $item);
            }
        }*/


        /*$faqResult = Faq::query()->where('active', 1)->where(function ($q) use ($query_parts) {
            foreach ($query_parts as $part) {
                $q->where('title', 'LIKE', '%' . $part . '%')
                    ->orWhere('content', 'LIKE', '%' . $part . '%');
            }
        })->sort()->get();
        if (count($faqResult)) {
            foreach ($faqResult as $item) {
                array_push($result, $item);
            }
        }*/

        $fundraisersResult = Fundraiser::query()->where('active', 1)->where(function ($q) use ($query_parts) {
            foreach ($query_parts as $part) {
                $q->where('title', 'LIKE', '%' . $part . '%')
                    ->orWhere('content', 'LIKE', '%' . $part . '%')
                    ->orWhere('short', 'LIKE', '%' . $part . '%');
            }
        })->sort()->get();
        if (count($fundraisersResult)) {
            foreach ($fundraisersResult as $item) {
                array_push($result, $item);
            }
        }

        $giftsResult = Gift::query()->where('active', 1)->where(function ($q) use ($query_parts) {
            foreach ($query_parts as $part) {
                $q->where('title', 'LIKE', '%' . $part . '%')
                    ->orWhere('content', 'LIKE', '%' . $part . '%');
            }
        })->sort()->get();
        if (count($giftsResult)) {
            foreach ($giftsResult as $item) {
                array_push($result, $item);
            }
        }

        $newsResult = News::query()->where('active', 1)->where(function ($q) use ($query_parts) {
            foreach ($query_parts as $part) {
                $q->where('title', 'LIKE', '%' . $part . '%')
                    ->orWhere('short', 'LIKE', '%' . $part . '%')
                    ->orWhere('content', 'LIKE', '%' . $part . '%');
            }
        })->sort()->get();
        if (count($newsResult)) {
            foreach ($newsResult as $item) {
                array_push($result, $item);
            }
        }

        $successStoriesResult = SuccessStory::query()->where('active', 1)->where(function ($q) use ($query_parts) {
            foreach ($query_parts as $part) {
                $q->where('title', 'LIKE', '%' . $part . '%')
                    ->orWhere('short', 'LIKE', '%' . $part . '%')
                    ->orWhere('content', 'LIKE', '%' . $part . '%');
            }
        })->sort()->get();
        if (count($successStoriesResult)) {
            foreach ($successStoriesResult as $item) {
                array_push($result, $item);
            }
        }

        $result = $this->paginate($result);
        //dd($result, $result->links());
        //dd($request->all());

        return response()
            ->view('site.pages.search.index', compact('result', 'breadcrumbs', 'searchQuery'));
    }

    public function paginate($items, $perPage = 1000, $page = null, $options = [])
    {
        $page = $page ?: (Paginator::resolveCurrentPage() ?: 1);
        $items = $items instanceof Collection ? $items : Collection::make($items);
        return new LengthAwarePaginator($items->forPage($page, $perPage), $items->count(), $perPage, $page, $options);
    }
}
