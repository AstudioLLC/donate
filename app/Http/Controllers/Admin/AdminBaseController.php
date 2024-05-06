<?php

namespace App\Http\Controllers\Admin;

use App\Constants\UserRole;
use App\Http\Controllers\Controller;
use App\Models\Chat;
use App\Models\Donation;
use App\Models\Language;
use App\Models\Message;
use App\Models\User;
use App\Models\Volunteering;
use Illuminate\Support\Facades\Session;

class AdminBaseController extends Controller
{
    protected $languages;
    protected $lang;
    protected $isos;
    protected $urlLang;
    protected $shared;
    protected $unread_messages;
    protected $seen;
    protected $message_unread;
    protected $new_donations;

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
        $unread_messages = Chat::where('message_from',1)->where('admin_is_read', 0)->get();
        $seen = Volunteering::where('seen',0)->get();
        $message_unread = Message::where('seen',0)->get();
        $languages = Language::where('active', 1)->sort()->get();
        $new_donations = Donation::where('seen',0)->where('status',1)->get();
        $languagesResult = [];
        $isos = [];
        $admin_language = Language::select('id')->where('admin', 1)->sort()->first()->id;
        $url_language = Language::select('id')->where('url', 1)->sort()->first()->id;
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
        $default_language = Language::where('default', 1)->first()->iso;
        if (!$this->lang) $this->lang = $default_language;
        if (!$this->urlLang) $this->urlLang = $default_language;
        $this->languages = $languagesResult;
        $this->isos = $isos;
        $this->unread_messages = $unread_messages;
        $this->seen = $seen;
        $this->new_donations = $new_donations;
        $this->message_unread = $message_unread;
        $this->shared = [
            //'items_count' => Item::all()->count(),
            'new_users_count' => User::where(['watched' => 0, 'role' => UserRole::SPONSOR])->count(),
            'lang' => $this->lang,
            'languages' => $languagesResult,
            'isos' => $isos,
            'urlLang' => $this->urlLang,
            'unread_messages' => $this->unread_messages,
            'seen' => $this->seen,
            'message_unread' => $this->message_unread,
            'new_donations' => $this->new_donations,
        ];
        view()->share($this->shared);
    }
}
