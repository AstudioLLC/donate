<?php

namespace App\Http\Controllers\Admin;

use App\Constants\UserRole;
use App\Http\Controllers\Controller;
use App\Models\Application;
use App\Models\Banner;
use App\Models\Category;
use App\Models\Item;
use App\Models\Items;
use App\Models\Language;
use App\Models\Order;
use App\Models\PriceApplication;
use App\Models\User;

class BaseController extends Controller
{
    protected $languages;
    protected $lang;
    protected $isos;
    protected $urlLang;
    protected $shared;

    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            if (!$this->shared) {
                $this->view_share();
            }

            return $next($request);
        });
    }

    protected function view_share()
    {
        $languages = Language::select('id', 'iso', 'title')->where('active', '>=', '0')->sort()->get();
        $languagesResult = [];
        $isos = [];
        $admin_language = settings('admin_language', 1);
        $url_language = settings('url_language', 4);
        foreach ($languages as $language) {
            if ($language->id == $admin_language) {
                $this->lang = $language->iso;
            }
            if ($language->id == $url_language) {
                $this->urlLang = $language->iso;
            }
            $languagesResult[] = [
                'iso' => $language->iso,
                'title' => $language->title,
            ];
            $isos[] = $language->iso;
        }
        $default_language = $languages->where('id', settings('default_language', 1))->first()->iso;
        if (!$this->lang) $this->lang = $default_language;
        if (!$this->urlLang) $this->urlLang = $default_language;
        $this->languages = $languagesResult;
        $this->isos = $isos;


        $this->shared = [
            //'items_count' => Item::all()->count(),
            //'users_count' => User::query()->where('type', UserRole::DEFAULT)->count(),
            'lang' => $this->lang,
            'languages' => $languagesResult,
            'isos' => $isos,
            'urlLang' => $this->urlLang,

            /*'new_orders_count' => Order::getCount(Order::STATUS_NEW),
            'pending_orders_count' => Order::getCount(Order::STATUS_PENDING),
            'declined_orders_count' => Order::getCount(Order::STATUS_DECLINED),
            'done_orders_count' => Order::getCount(Order::STATUS_DONE),*/
        ];
        view()->share($this->shared);
    }
}
