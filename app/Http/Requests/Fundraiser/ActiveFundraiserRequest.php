<?php

namespace App\Http\Requests\Fundraiser;

use Illuminate\Foundation\Http\FormRequest;

class ActiveFundraiserRequest extends FormRequest
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
            'itemId' => 'required|integer|exists:fundraisers,id',
            'value' => 'required|integer',
        ];
    }
}
