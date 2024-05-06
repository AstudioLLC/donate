<?php

namespace App\Http\Requests\Frontend\Donate;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class PostCreateStep2Request extends FormRequest
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
        $this->merge([
            'children_id' => $session['children_id'],
            'amount' => $session['amount'],
            'checkbox' => $request['checkbox'],
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
            'amount' => 'required|integer',
            'children_id' => 'required|integer',
            'checkbox' => 'required',
            'recurring_payment' => 'required|integer',
        ];
    }
}
