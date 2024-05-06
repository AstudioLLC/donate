<?php

namespace App\Http\Controllers\Site\Auth;

use App\Http\Controllers\Site\BaseController;
use App\Http\Controllers\Auth\LoginController as BaseLoginController;
use App\Models\User;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use SoapClient;

class LoginController extends BaseController
{
    use AuthenticatesUsers;

    protected $viewsNamespace = 'site';

    protected $redirectTo = null;

    public function __construct()
    {
        parent::__construct();
        $this->middleware('guest')->except('logout');
        if(parse_url(url()->previous(), PHP_URL_PATH) == '/sp-login'){
            $this->redirectTo = route('cabinet.sponsorship.create.step1');
        }else{
            $this->redirectTo = route('cabinet.home.index');
        }
    }

    /**
     * Show the application's login form.
     *
     * @return \Illuminate\Http\Response
     */
    public function showLoginForm()
    {
        $this->staticSEO('test');

        $breadcrumbs = [
            [
                'title' => __('frontend.Login'),
                'url' => ''
            ]
        ];

        return response()
            ->view(($this->viewsNamespace ? "$this->viewsNamespace." : '') . 'pages.auth.login', compact('breadcrumbs'));
    }
    /**
     * Show the application's login form.
     *
     * @return \Illuminate\Http\Response
     */
    public function showSpLoginForm()
    {
        $this->staticSEO('test');

        $breadcrumbs = [
            [
                'title' => __('frontend.Login'),
                'url' => ''
            ]
        ];

        return response()
            ->view(($this->viewsNamespace ? "$this->viewsNamespace." : '') . 'components.splogin', compact('breadcrumbs'));
    }

    public function login(Request $request)
    {
        $this->validateLogin($request);
        if (method_exists($this, 'hasTooManyLoginAttempts') &&
            $this->hasTooManyLoginAttempts($request)) {
            return $this->sendLockoutResponse($request);
        }

        /** @var Authenticatable|User $user */
        $user = User::query()->where(['email' => $request->input('email')])->first();

        if (!$user || !Hash::check($request->input('password'), $user->password)) {
            $this->incrementLoginAttempts($request);

            return $this->sendFailedLoginResponse($request);
        } elseif ($user->active == 0) {
            return redirect()->route('login')->withErrors(['global' => __('frontend.Blocked')])->withInput();
        }

        Auth::login($user, true);

        return $this->sendLoginResponse($request);
    }

}
