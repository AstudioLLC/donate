<?php

namespace App\Http\Requests\Frontend\Message;

use App\Rules\Recaptcha;
use Illuminate\Foundation\Http\FormRequest;

class StoreMessageRequest extends FormRequest
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
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'message' => 'nullable|string',
            'g-recaptcha-response' => ['required', new Recaptcha()]
        ];
    }
}
