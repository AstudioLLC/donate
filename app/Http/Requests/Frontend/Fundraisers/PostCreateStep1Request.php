<?php

namespace App\Http\Requests\Frontend\Fundraisers;

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
        if ($request['radio_amount'] == '3000') {
            $request['amount'] = '3000';
        }elseif($request['radio_amount'] == '5000'){
            $request['amount'] = '5000';
        }
        elseif($request['radio_amount'] == '10000'){
            $request['amount'] = '10000';
        }
        elseif($request['radio_amount'] == '20000'){
            $request['amount'] = '20000';
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
            'id' => 'required|integer|exists:fundraisers,id',
            'anonymous' => 'required|integer',
            'amount' => 'required|integer',
            'message' => 'nullable|string',
        ];
    }
}
