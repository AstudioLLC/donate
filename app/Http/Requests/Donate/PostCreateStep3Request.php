<?php

namespace App\Http\Requests\Donate;

use App\Rules\Recaptcha;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class PostCreateStep3Request extends FormRequest
{
    /**
     * @var Request
     */
    public $request;

    /**
     * @param Request $request
     */
    public function __construct(Request $request)
    {
        parent::__construct();

        $this->request = $request;
    }

    /**
     * Prepare the data for validation.
     *
     * @return void
     */
    protected function prepareForValidation()
    {
        $request = $this->request->all();
        $session = Session::get('donate');
        $request['checkbox'] = (int)!empty($request['checkbox']);
        $request['subscriber_checkbox'] = (int)!empty($request['subscriber_checkbox']);
        $this->merge([
            'anonymous' => $session['anonymous'],
            'amount' => $session['amount'],
            'message' => $session['message'],
            'is_binding' => $session['is_binding'],
            'checkbox' => $request['checkbox'],
            'subscriber_checkbox' => $request['subscriber_checkbox'],
        ]);
    }

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|string|max:255',
            'phone' => 'required|nullable',
            'email' => 'required|email',
            'country_id' => 'nullable|integer|exists:countries,id',
            'city' => 'nullable',
            'address' => 'nullable',
            'subscriber_checkbox' => 'required|integer',
            'anonymous' => 'required|integer',
            'is_binding' => 'required|integer',
            'amount' => 'required|integer',
            'message' => 'nullable|string',
            'checkbox' => 'required',
            'g-recaptcha-response' => ['required', new Recaptcha()]

        ];
    }
}
