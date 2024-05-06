<?php

namespace App\Http\Requests\WelcomeModal;

use Illuminate\Foundation\Http\FormRequest;

class ActiveWelcomeModalRequest extends FormRequest
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
            'itemId' => 'required|integer|exists:welcome_modals,id',
            'value' => 'required|integer',
        ];
    }
}
