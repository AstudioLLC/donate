<?php

namespace App\Http\Controllers\Site\Auth;

use App\Http\Controllers\Site\BaseController;
use App\Models\Banner;
use App\Models\User;
use App\Services\Notify\Facades\Notify;
use Illuminate\Foundation\Auth\ResetsPasswords;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class ResetPasswordController extends BaseController
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset requests
    | and uses a simple trait to include this behavior. You're free to
    | explore this trait and override any methods you wish to tweak.
    |
    */

    use ResetsPasswords;

    /**
     * Where to redirect users after resetting their password.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
        parent::__construct();
    }

    public function showResetForm($email, $token)
    {
        if (!User::checkRecoverToken($email, $token)) abort(404);
        $user = User::getUser($email);
        if (!$user) abort(404);

        $data['seo'] = $this->staticSEO(__('app.password recovery'));

        $breadcrumbs = [
            [
                'title' => __('app.password recovery'),
                'url' => ''
            ]
        ];

        $data['breadcrumbs'] = $breadcrumbs;
        $data['token'] = $token;
        $data['email'] = $email;

        return view('site.pages.auth.reset', $data);
    }

    public function reset(Request $request, $email, $token)
    {
        if (!User::checkRecoverToken($email, $token)) abort(404);
        $user = User::getUser($email);
        if (!$user) abort(404);
        $this->validator($request->all());
        User::recoverUserPassword($user, $request->input('password'));
        Auth::login($user);

        Notify::success('Пароль успешно восстановлен.');

        return redirect()->route('cabinet.profile.settings');
    }

    private function validator($inputs)
    {
        Validator::make($inputs, [
            'password' => ['required', 'string', 'min:5'],
            'password_confirmation' => ['required_with:password', 'same:password'],
        ], [
            'required' => __('auth.reset_failed'),
            'required_with:password' => __('auth.reset_failed'),
            'same:password' => __('auth.reset_failed'),
            'string' => __('auth.reset_failed'),
            'min:8' => __('auth.reset_failed'),
        ])->validate();
    }
}
