<?php

namespace App\Http\Requests\Frontend\User;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
//            'role' => 'required|integer',
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required_with:repeatPass|string|max:20|same:repeatPass|min:5',
            'day' => 'nullable|numeric|min:1|max:31',
            'month' => 'nullable|numeric|min:1|max:12',
            'year' => 'nullable|numeric',
        ];
    }
    public function messages()
    {
        return [
            'password.min' => __('frontend.login.Password min'),
            'password.max' => __('frontend.login.Password min')

        ];

    }
}
