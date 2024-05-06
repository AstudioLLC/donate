<?php

namespace App\Http\Requests\Frontend\Donate;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class PostCreateStep1Request extends FormRequest
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
        if ($request['radio_amount'] == '8000') {
            $request['amount'] = '8000';
        }
        else {
            $request['amount'] = $request['other_amount'];
        }

        $this->merge([
            'amount' => $request['amount'],
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
            'recurring_payment' => 'required|integer',

        ];
    }
}
