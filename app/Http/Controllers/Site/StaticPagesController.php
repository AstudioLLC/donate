<?php

namespace App\Http\Controllers\Site;

use App\Models\Achievement;
use App\Models\Block;
use App\Models\CoreValue;
use App\Models\CorporateDonor;
use App\Models\Fundraiser;
use App\Models\Gift;
use App\Models\HomeBlock;
use App\Models\Information;
use App\Models\News;
use App\Models\OurPublication;
use App\Models\Page;
use App\Models\Slider;
use App\Models\SuccessStory;
use App\Models\Tender;
use App\Models\WelcomeModal;
use App\Services\PageManager\StaticPages;
use Illuminate\Support\Facades\DB;

class StaticPagesController extends BaseController
{
    use StaticPages;

    /**
     * @param $page
     * @return \Illuminate\Http\Response
     */
    public function static_home($page)
    {
        $slider = Slider::where('active', 1)->sort()->get();
        $coreValues = CoreValue::where('active', 1)->sort()->get();
        $homeFirstBlock = HomeBlock::where(['active' => 1, 'id' => 1])->first();
        $homeFirstBlock->count = json_decode($homeFirstBlock->count, true);
        $homeSecondBlock = HomeBlock::where(['active' => 1, 'id' => 2])->first();
        $corporateDonor = Page::select('title_content', 'content', 'url')->where(['active' => 1, 'static' => 'donors'])->first();
        $corporateDonors = CorporateDonor::where('active', 1)->sort()->limit(10)->get();
        $fundraisers = Fundraiser::where(['active' => 1, 'private' => 0, 'campaign' => 0])->sort()->limit(10)->get();
        $successStory = Page::select('title_content', 'content', 'url')->where(['active' => 1, 'static' => 'success_stories'])->first();
        $successStories = SuccessStory::where('active', 1)->whereNotNull('imageSmall')->select('imageSmall', 'title','url')->sort()->limit(12)->get();
        $donateBlock = Page::select('id')->where(['active' => 1, 'static' => 'support_our_programs'])->with('childrenForHeader')->first();
        $modal = WelcomeModal::where('id', '1')->where('active',1)->first();
        $payment = false;
        if (\session()->get('donate')) {
            \session()->forget('donate');
            $payment = true;
        }

        return response()
            ->view('site.pages.static.home',
                compact('page',
                    'slider',
                    'coreValues',
                    'homeFirstBlock',
                    'homeSecondBlock',
                    'corporateDonor',
                    'corporateDonors',
                    'fundraisers', 'successStory', 'successStories', 'donateBlock','modal','payment'));
    }

    public function static_contact($page)
    {
        $information = Information::where(['id' => 1])->first();

        $this->renderSEO($page);
        $breadcrumbs = $this->renderBreadcrumbs($page);

        return response()
            ->view('site.pages.static.contact', compact('page', 'breadcrumbs', 'information'));
    }
    public function static_our_grand_programs($page)
    {
        $this->renderSEO($page);
        $breadcrumbs = $this->renderBreadcrumbs($page);
        $achievements = Achievement::where('active',true)->where('page_id',$page->id)->get();
        return response()
            ->view('site.pages.static.our_grand_programs', compact('page', 'breadcrumbs','achievements'));
    }
    public function static_our_publications($page)
    {
        $this->renderSEO($page);
        $breadcrumbs = $this->renderBreadcrumbs($page);
        $items = OurPublication::whereActive(true)->get();
        return response()
            ->view('site.pages.static.our_publications', compact('page', 'breadcrumbs','items'));
    }
    public function static_our_donors($page)
    {
        $this->renderSEO($page);
        $breadcrumbs = $this->renderBreadcrumbs($page);
        $items = CorporateDonor::where('active', 1)->where('is_our_donor',true)->sort()->paginate('12');
        return response()
            ->view('site.pages.static.our_donors', compact('page', 'breadcrumbs','items'));
    }
    public function static_tenders($page)
    {
        $this->renderSEO($page);
        $breadcrumbs = $this->renderBreadcrumbs($page);
        $items = Tender::where('active', 1)->sort()->get();
        return response()
            ->view('site.pages.static.tenders', compact('page', 'breadcrumbs','items'));
    }
    public function static_news($page)
    {
        $this->renderSEO($page);
        $breadcrumbs = $this->renderBreadcrumbs($page);

        $news = News::where('active', 1)->orderBy('created_at', 'desc')->paginate('9');

        return response()
            ->view('site.pages.static.news', compact('page', 'news', 'breadcrumbs'));
    }

    public function static_success_stories($page)
    {
        $this->renderSEO($page);
        $breadcrumbs = $this->renderBreadcrumbs($page);

        $items = SuccessStory::where('active', 1)->orderBy('created_at', 'desc')->paginate('12');

        return response()
            ->view('site.pages.static.success_stories', compact('page', 'items', 'breadcrumbs'));
    }

    public function static_donors($page)
    {
        $this->renderSEO($page);
        $breadcrumbs = $this->renderBreadcrumbs($page);

        $corporateDonor = Page::select('title_content', 'content', 'url')->where(['active' => 1, 'static' => 'donors'])->first();

        $items = CorporateDonor::where('active', 1)->where('is_our_donor',false)->sort()->paginate('12');

        return response()
            ->view('site.pages.static.donors', compact('page', 'items', 'breadcrumbs','corporateDonor'));
    }

    public function static_about($page)
    {
        $this->renderSEO($page);
        $breadcrumbs = $this->renderBreadcrumbs($page);

        $infoBlocks = Block::where('active', 1)->sort()->get();
        $coreValues = CoreValue::where('active', 1)->sort()->get();

        return response()
            ->view('site.pages.static.about', compact('page', 'infoBlocks', 'coreValues', 'breadcrumbs'));
    }

    public function static_faq($page)
    {
        $items = Page::where('active', 1)->whereHas('faq')->with('faq')->sort()->get();
        $active = $items->first();

        $this->renderSEO($page);
        $breadcrumbs = $this->renderBreadcrumbs($page);

        return response()
            ->view('site.pages.static.faq', compact('page', 'breadcrumbs', 'items', 'active'));
    }

    public function static_give_a_gift($page)
    {
        $gifts = Gift::where('active', 1)->sort()->get();
        $faq = Page::where(['active' => 1, 'static' => 'faq'])->first();

        $payment = false;
        if (\session()->get('gift_payment')) {
            \session()->forget('gift_payment');
            $payment = true;
        }

        $this->renderSEO($page);
        $breadcrumbs = $this->renderBreadcrumbs($page);

        return response()
            ->view('site.pages.static.give_a_gift', compact('page', 'breadcrumbs', 'gifts', 'faq', 'payment'));
    }

    public function static_terms_and_contidions($page)
    {
        $this->renderSEO($page);
        $breadcrumbs = $this->renderBreadcrumbs($page);

        return response()
            ->view('site.pages.static.terms_and_contidions', compact('page', 'breadcrumbs'));
    }

    public function static_sms_donation($page)
    {
        $faq = Page::where(['active' => 1, 'static' => 'faq'])->first();
        $news = News::where('active', 1)->limit(10)->inRandomOrder()->get();

        $this->renderSEO($page);
        $breadcrumbs = $this->renderBreadcrumbs($page);

        return response()
            ->view('site.pages.static.sms_donation', compact('page', 'breadcrumbs', 'faq', 'news'));
    }

    public function static_day_care($page)
    {
        $faq = Page::where(['active' => 1, 'static' => 'faq'])->first();
        $fundraisers = Fundraiser::where(['active' => 1, 'campaign' => 0, 'private' => 0])->sort()->get();
        $donations = DB::table('donations')
            ->where('status',1)
                ->whereNotNull('fundraiser_id')
                    ->orderBy('id')
                        ->get();

        $succ_donation = DB::table('donations')->orderBy('id','desc')->first();
        $payment = false;
        if (\session()->get('fundraiser_payment')) {
            \session()->forget('fundraiser_payment');
            $payment = true;
        }

        $this->renderSEO($page);
        $breadcrumbs = $this->renderBreadcrumbs($page);

        return response()
            ->view('site.pages.static.day_care', compact('succ_donation','page','donations', 'breadcrumbs', 'faq', 'fundraisers', 'payment'));
    }

    public function static_become_a_sponsor($page)
    {
        $faq = Page::where(['active' => 1, 'static' => 'faq'])->first();

        $this->renderSEO($page);
        $breadcrumbs = $this->renderBreadcrumbs($page);

        return response()
            ->view('site.pages.static.become_a_sponsor', compact('page', 'breadcrumbs', 'faq'));
    }

    public function static_volunteering($page)
    {
        $faq = Page::where(['active' => 1, 'static' => 'faq'])->first();

        $this->renderSEO($page);
        $breadcrumbs = $this->renderBreadcrumbs($page);

        return response()
            ->view('site.pages.static.volunteering', compact('page', 'breadcrumbs', 'faq'));
    }

    public function static_support_our_programs($page)
    {
        $this->renderSEO($page);
        $breadcrumbs = $this->renderBreadcrumbs($page);

        return response()
            ->view('site.pages.static.support_our_programs', compact('page', 'breadcrumbs'));
    }

    public function static_corporate_partnership($page)
    {
        $this->renderSEO($page);
        $breadcrumbs = $this->renderBreadcrumbs($page);
        $day_care = Page::where(['active' => 1, 'static' => 'day_care'])->first();
        //TODO add current campaigns part
        $current_campaigns = Page::where(['active' => 1, 'static' => 'current_campaigns'])->first();

        $tailored_project = Page::where(['active' => 1, 'static' => 'tailored_project'])->first();

        return response()
            ->view('site.pages.static.corporate_partnership', compact('page', 'breadcrumbs','current_campaigns', 'day_care', 'tailored_project'));
    }

    public function static_tailored_project($page)
    {
        $this->renderSEO($page);
        $breadcrumbs = $this->renderBreadcrumbs($page);

        return response()
            ->view('site.pages.static.tailored_project', compact('page', 'breadcrumbs'));
    }

    public function static_donate($page)
    {
        $this->renderSEO($page);
        $breadcrumbs = $this->renderBreadcrumbs($page);
        $prices  =  [
            1 => '3000',
            2 => '5000',
            3=> '10000',
            4 => '20000'
        ];
        $donateBlock = Page::select('id')
            ->where(['active' => 1, 'static' => 'support_our_programs'])
            ->with('childrenForHeader')
            ->first();

        return response()
            ->view('site.pages.static.donate', compact('page', 'prices','breadcrumbs', 'donateBlock'));
    }

    public function static_current_campaigns($page)
    {
        $this->renderSEO($page);
        $breadcrumbs = $this->renderBreadcrumbs($page);

        $fundraisers = Fundraiser::where(['active' => 1, 'campaign' => 1, 'private' => 0])->sort()->get();

        return response()
            ->view('site.pages.static.current_campaigns', compact('page', 'breadcrumbs', 'fundraisers'));
    }

    private function dynamic_page($page)
    {
        $this->renderSEO($page);
        $breadcrumbs = $this->renderBreadcrumbs($page);

        return view('site.pages.dynamic_page', compact('page', 'breadcrumbs'));
    }
}
