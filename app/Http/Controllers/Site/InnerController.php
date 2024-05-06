<?php

namespace App\Http\Controllers\Site;

use App\Http\Requests\Frontend\Message\StoreMessageRequest;
use App\Http\Requests\Frontend\Subscriber\StoreSubscriberRequest;
use App\Http\Requests\Frontend\Volunteering\StoreVolunteeringRequest;
use App\Mail\Contact;
//use App\Models\Message;
use App\Models\Message;
use App\Models\Page;
use App\Models\Subscriber;
use App\Models\Volunteering;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class InnerController extends BaseController
{
    /**
     * @param StoreVolunteeringRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function sendVolunteeringMessage(StoreVolunteeringRequest $request)
    {
        $page = Page::where(['active' => 1, 'static' => 'volunteering'])->firstOrFail();
        try {
            Volunteering::create($request->validated());
        }
        catch (\Exception $exception) {
            return redirect()
                ->route('page', ['url' => $page->url])
                ->withErrors(['global' => $exception->getMessage()])
                ->withInput();
        }
        return redirect()
            ->route('page', ['url' => $page->url])->with(['message_sent' => true]);
    }

    /**
     * @param StoreMessageRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function sendContactMessage(StoreMessageRequest $request)
    {
        $page = Page::where(['active' => 1, 'static' => 'contact'])->firstOrFail();
        // TODO add mail send part

        try {
            Message::create($request->validated());
            session()->flash('successContact','true');

        }
        catch (\Exception $exception) {
            return redirect()
                ->route('page', ['url' => $page->url])
                ->withErrors(['global' => $exception->getMessage()])
                ->withInput();
        }
        return redirect()
            ->route('page', ['url' => $page->url])->with(['message_sent' => true]);
    }

    /**
     * @param StoreSubscriberRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function addSubscriber(StoreSubscriberRequest $request)
    {
        try {
            Subscriber::create($request->validated());
        }
        catch (\Exception $exception) {
            return redirect()
                ->back()
                ->withErrors(['global' => $exception->getMessage()])
                ->withInput();
        }
        return redirect()->back()->with(['subscriber_sent' => true]);
    }



    public function sendContactsMessage(Request $request)
    {
        if(!is_active('contacts')) abort(404);
        $inputs = $request->except('_token');
        Validator::make($inputs, [
            'name' => 'required|string|max:200',
            'email' => 'required|string|email|max:200',
            'phone' => 'required|string|phone|max:200',
            'message' => 'required|string|max:1000',
        ], [
            'required' => 'Поле обязательно для заполнения.',
            'string' => 'Поле обязательно для заполнения.',
            'email' => 'Адрес эл.почты недействителен.',
            'phone' => 'Номер телефона недействительный.',
            'max' => 'Количество символов не может превышать :max.',
        ])->validate();
        $redirect = redirect(page('contacts'));
        $email = $this->shared['infos']->data->contact_email;
        if (!$email || !is_email($email)) return $redirect->withErrors(['global' => __('app.internal error')])->withInput();
        try {
            Mail::to($email)->send(new Contact($request->only('name', 'email', 'phone', 'message')));
        }
        catch (\Exception $exception) {
            return $redirect->withErrors(['global' => __('app.internal error')])->withInput();
        }
        return $redirect->with(['message_sent' => true]);
    }

    public function sendLoanMessage(Request $request)
    {
        if(!is_active('loan')) abort(404);
        $redirect = redirect(page('loan'));
        $validator = $this->LoanMessageValidator($request);
        $validator['validator']->validate();
        if(Message::action(null, $validator['inputs'])) {
            return $redirect->with(['message_sent' => true]);
        }
        else {
            return redirect()->back()->withInput();
        }


        /*$email = $this->shared['infos']->data->contact_email;
        if (!$email || !is_email($email)) return $redirect->withErrors(['global' => __('app.internal error')])->withInput();
        try {
            Mail::to($email)->send(
                new Contact(
                    $request->only(
                        'name',
                        'surname',
                        'patronymic',
                        'address',
                        'passport',
                        'social',
                        'email',
                        'phone',
                        'total_price',
                        'loan_amount',
                        'prepayment_percent',
                        'prepayment_amount',
                        'loan_term'
                    )
                )
            );
        }
        catch (\Exception $exception) {
            return $redirect->withErrors(['global' => __('app.internal error')])->withInput();
        }*/

    }

    public function sendMeasurementMessage(Request $request)
    {
        if(!is_active('measurement')) abort(404);
        $redirect = redirect(page('measurement'));
        $validator = $this->MeasurementMessageValidator($request);
        $validator['validator']->validate();
        if(Message::action(null, $validator['inputs'])) {
            return $redirect->with(['message_sent' => true]);
        }
        else {
            return redirect()->back()->withInput();
        }

        /*$email = $this->shared['infos']->data->contact_email;
        if (!$email || !is_email($email)) return $redirect->withErrors(['global' => __('app.internal error')])->withInput();
        try {
            Mail::to($email)->send(
                new Contact(
                    $request->only(
                        'name',
                        'surname',
                        'patronymic',
                        'address',
                        'message',
                        'wall_code',
                        'email',
                        'phone',
                        'color',
                        'wall_sizes',
                        'floor_sizes',
                        'price',
                        'ceiling_height',
                        'file'
                    )
                )
            );
        }
        catch (\Exception $exception) {
            return $redirect->withErrors(['global' => __('app.internal error')])->withInput();
        }
        return $redirect->with(['message_sent' => true]);*/
    }

    private function LoanMessageValidator($request)
    {
        $inputs = $request->except('_token');
        $rules = [
            'name' => 'required|string|max:200',
            'surname' => 'required|string|max:200',
            'patronymic' => 'required|string|max:200',
            'address' => 'string|nullable|max:200',
            'passport' => 'required|string|max:200',
            'social' => 'required|string|max:200',
            //'email' => 'required|string|email|max:200',
            'phone' => 'required|string|phone|max:200',
            'other_phone' => 'required|string|phone|max:200',
            'total_price' => 'required|string|numeric',
            'loan_amount' => 'nullable|string|numeric',
            'prepayment_percent' => 'nullable|string|numeric',
            'prepayment_amount' => 'nullable|string|numeric',
            'loan_term' => 'nullable|string|numeric',
        ];
        $result['validator'] = Validator::make($inputs, $rules, [
            'required' => 'Поле обязательно для заполнения.',
            'string' => 'Поле обязательно для заполнения.',
            'email' => 'Адрес эл.почты недействителен.',
            'phone' => 'Номер телефона недействительный.',
            'max' => 'Количество символов не может превышать :max.',
            'numeric' => 'Допускаются только цифры.',
        ]);
        $result['inputs'] = $inputs;

        return $result;
    }

    private function MeasurementMessageValidator($request)
    {
        $inputs = $request->except('_token');
        $rules = [
            'name' => 'required|string|max:200',
            'surname' => 'required|string|max:200',
            'patronymic' => 'required|string|max:200',
            'address' => 'required|string|max:200',
            'phone' => 'required|string|phone|max:200',
            'other_phone' => 'required|string|phone|max:200',
            'color' => 'required|string|max:200',
            'wall_sizes' => 'required|string|numeric|max:200',
            'category' => 'nullable|string',
            'code' => 'nullable|string',
            'length' => 'nullable|string',
            'width' => 'nullable|string',
            'desired_size' => 'nullable|string',
            'ceiling_height' => 'required|string',
            'message' => 'string|nullable|max:1000',
            'file' => 'required|max:20480|',
        ];
        $result['validator'] = Validator::make($inputs, $rules, [
            'required' => 'Поле обязательно для заполнения.',
            'string' => 'Поле обязательно для заполнения.',
            'email' => 'Адрес эл.почты недействителен.',
            'phone' => 'Номер телефона недействительный.',
            'max' => 'Количество символов не может превышать :max.',
            'file.max' => 'Максимальный размер не должен превышать :max мб.',
            'numeric' => 'Допускаются только цифры.',
        ]);
        $result['inputs'] = $inputs;

        return $result;
    }
}
