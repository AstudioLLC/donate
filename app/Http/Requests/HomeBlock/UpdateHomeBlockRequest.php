<?php

namespace App\Http\Requests\HomeBlock;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class UpdateHomeBlockRequest extends FormRequest
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
        $request['active'] = (int)!empty($request['active']);
        $request['count'] = isset($request['count']) ? json_encode($request['count']) : null;

        $this->merge([
            'active' => $request['active'],
            'count' => $request['count'],
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
            'title' => 'required|array',
            'image' => 'nullable|image|mimes:jpg,jpeg,png'
        ];
    }

    /**
     * Get the validation fail meessages that apply to the request.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'title.*.required' => 'Введите название.',
        ];
    }
}
