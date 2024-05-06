<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Auth\LoginController as BaseLoginController;
use App\Models\User;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends BaseLoginController
{
    protected $viewsNamespace = 'admin';

    protected $redirectTo = null;

    public function __construct()
    {
        parent::__construct();

        $this->redirectTo = route(env('CMS_HOMEPAGE_ROUTE'));
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
            return redirect()->route(env('CMS_HOMEPAGE_ROUTE'))->withErrors(['global' => __('frontend.Blocked')])->withInput();
        }

        Auth::login($user, true);

        return $this->sendLoginResponse($request);
    }
}
