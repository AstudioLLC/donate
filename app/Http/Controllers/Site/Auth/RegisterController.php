<?php

namespace App\Http\Controllers\Site\Auth;

use App\Constants\UserRole;
use App\Http\Controllers\Site\BaseController;
use App\Http\Requests\Frontend\User\RegisterRequest;
use App\Mail\VerifyMail;
use App\Models\User;
use App\Models\VerifyUser;
use App\Services\Notify\Facades\Notify;
use App\Services\Support\Str;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use MailchimpMarketing\ApiClient;
use Illuminate\Support\Facades\Mail;


class
RegisterController extends BaseController
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();

        //$this->redirectTo = route('cabinet.profile.settings');
        //$this->redirectTo = '';
        $this->redirectTo = 'cabinet.sponsorship.create.step1';
//        $this->middleware('guest')->except('verifyEmail');
    }


    public function verifyForCabinet()
    {
        return view('emails.verifyforCabinet');
    }
    /**
     * @return \Illuminate\Http\Response
     */
    public function showRegistrationForm()
    {
        $this->staticSEO(__('frontend.Registration'));
        $role = UserRole::SPONSOR;

        $breadcrumbs = [
            [
                'title' => __('frontend.Registration'),
                'url' => ''
            ]
        ];

        return response()
            ->view('site.pages.auth.register', compact('breadcrumbs', 'role'));
    }

    /**
     * @param RegisterRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function register(RegisterRequest $request)
    {
        $day = $request->validated()['day'];
        if (strlen($day) < 2) {
            $day = '0' . $day;
        }
        $month = $request->validated()['month'];
        if (strlen($month) < 2) {
            $month = '0' . $month;
        }
        $year = $request->validated()['year'];
        $dateOfBirth = implode('-', array($year, $month, $day));

        $user = $this->create($request->all());
        Auth::login($user);
        $createOptions = User::where('id', $user->getAuthIdentifier())->first();
        $createOptions->createOptions($user->getAuthIdentifier(), $dateOfBirth);

        //$verification_token = Str::random(32);

        //$user->sendRegisteredNotification($verification_token);

        return redirect()
            ->route($this->redirectTo);

        /*$this->validator($request->all())->validate();

        $verification_token = Str::random(32);
        $user = $this->create($request->all(), $verification_token);

        /** For email send */
        //$user->sendRegisteredNotification($verification_token);

        /*Notify::success(__('auth.mail sended'));*/

        /*$this->guard()->login($user);

        $user->initBasketWithSession();

        return redirect($this->redirectPath());*/
    }

    /**
     * @param array $data
     * @return mixed
     */
    protected function create(array $data)
    {
        $user = User::create([
            'role' => 6,
            'name' => $data['name'],
            'email' => $data['email'],
            'phone' => $data['phone'],
            'verified' => 1,
            'password' => Hash::make($data['password']),
        ]);

//        $verifyUser = VerifyUser::create([
//            'user_id' => $user->id,
//            'token' => sha1(time())
//        ]);
        try {
            Mail::to($user->email)->send(new VerifyMail($user));
        }catch (\Exception $exception)
        {
            return $user;
        }

        return $user;

    }

    public function authenticated(Request $request, $user)
    {
        if (!$user->verified) {
            auth()->logout();
            return back()->with('warning', 'You need to confirm your account. We have sent you an activation code, please check your email.');
        }
        return redirect()->intended($this->redirectPath());
    }
    protected function registered(Request $request, $user)
    {
        $this->guard()->logout();
        return redirect('/login')->with('status', 'We sent you an activation code. Check your email and click on the link to verify.');
    }
    public function verifyUser($token)
    {
        $verifyUser = VerifyUser::where('token', $token)->first();
        if(isset($verifyUser) ){
            $user = $verifyUser->user;
            if(!$user->verified) {
                $verifyUser->user->verified = 1;
                $verifyUser->user->save();
                if (Auth::check()){
                    Auth::logout();
                }
                $status = "Your e-mail is verified. You can now login.";
            } else {
                $status = "Your e-mail is already verified. You can now login.";
            }
        } else {
            return redirect('/login')->with('warning', "Sorry your email cannot be identified.");
        }
        Auth::login(User::where('id',$verifyUser->user_id)->first());
        return redirect()->route('cabinet.sponsorship.create.step1');
    }
//    public function verifyEmail($email, $token)
//    {
//        $user = User::where('email', $email)->firstOrFail();
//
//        if (!$user->verification || !Hash::check($token, $user->verification)) abort(404);
//        $user->verification = null;
//        $user->save();
//
//        Notify::success(__('auth.mail confirmed'));
//
//        return redirect()->route('cabinet.profile');
//    }
}
