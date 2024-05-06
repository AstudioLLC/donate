<?php

namespace App\Http\Requests\Frontend\Sponsorship;

use Illuminate\Foundation\Http\FormRequest;

class PostCreateStep1Request extends FormRequest
{
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
            'whom_sp' => 'required|string',
            'children_region' => 'required|integer|exists:regions,id',
            'frequency' => 'required|integer',
            'recurring_payment' => 'required|integer',
            'message' => 'nullable|string',
            'want_recive_letters' => 'required|integer',
        ];
    }
}
