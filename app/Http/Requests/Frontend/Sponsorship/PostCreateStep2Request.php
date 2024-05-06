<?php

namespace App\Http\Requests\Frontend\Sponsorship;

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
            //'children_gender' => $session['children_gender'],
           // 'children_age_beetwen' => $session['children_age_beetwen'],
            'children_region' => $session['children_region'],
            'frequency' => $session['frequency'],
            'whom_sp' => $session['whom_sp'],
            'recurring_payment' => $session['recurring_payment'],
            'want_recive_letters' => $session['want_recive_letters'],
            'message' => $session['message'],
            'checkbox' => $request['checkbox'],
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
            //'children_gender' => 'required|integer',
            //'children_age_beetwen' => 'required|string',
            'children_region' => 'required|integer|exists:regions,id',
            'frequency' => 'required|integer',
            'recurring_payment' => 'required|integer',
            'whom_sp' => 'required|string',

            'want_recive_letters' => 'required|integer',
            'message' => 'nullable|string',
            'checkbox' => 'required',
        ];
    }
}
