<?php

namespace App\Http\Requests\Frontend\Volunteering;

use Illuminate\Foundation\Http\FormRequest;

class StoreVolunteeringRequest extends FormRequest
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
            'surname' => 'required|string|max:255',
            'age_group' => 'required|string|max:255',
            'phone' => 'required|string|max:255',
            'file' => 'required|max:20480',
            'message' => 'nullable|string'
        ];
    }
}
