<?php

namespace App\Http\Requests\Frontend\Donate;

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
        $session = Session::get('sponsorship');
        $request['checkbox'] = (int)!empty($request['checkbox']);
        $request['subscriber_checkbox'] = (int)!empty($request['subscriber_checkbox']);
        $this->merge([
            'children_id' => $session['children_id'],
            'checkbox' => $request['checkbox'],
            'subscriber_checkbox' => $request['subscriber_checkbox'],
            'amount' => $session['amount'],
            'recurring_payment' => $session['recurring_payment'],
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
//            'children_gender' => 'required|integer',
//            'children_age_beetwen' => 'required|string',
//            'children_region' => 'required|integer|exists:regions,id',
//            'frequency' => 'required|integer',
            'recurring_payment' => 'required|integer',
//            'want_recive_letters' => 'required|integer',
//            'message' => 'nullable|string',
            'amount' => 'required|integer',
            'children_id' => 'required|integer',
            'checkbox' => 'required',
            'subscriber_checkbox' => 'required|integer',
        ];
    }
}
