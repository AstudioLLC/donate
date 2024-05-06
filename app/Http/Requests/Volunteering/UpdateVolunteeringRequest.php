<?php

namespace App\Http\Requests\Volunteering;

use Illuminate\Foundation\Http\FormRequest;

class UpdateVolunteeringRequest extends FormRequest
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
//            'email' => 'required|email|unique:volunteering,email,' . $this->id . '',
            'surname' => 'required|string|max:255',
            'age_group' => 'required|string|max:255',
            'phone' => 'required|string|max:255',
            'file' => 'nullable|max:20480',
            'message' => 'nullable|string'
        ];
    }
}
