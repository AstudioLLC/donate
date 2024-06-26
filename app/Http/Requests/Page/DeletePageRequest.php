<?php

namespace App\Http\Requests\Page;

use Illuminate\Foundation\Http\FormRequest;

class DeletePageRequest extends FormRequest
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
            'itemId' => 'required|integer|exists:pages,id',
        ];
    }

    /**
     * Get the validation fail meessages that apply to the request.
     *
     * @return array
     */
    /*public function messages()
    {
        return [
            //
        ];
    }*/
}
