<?php

namespace App\Http\Requests\Block;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class StoreBlockRequest extends FormRequest
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

        $this->merge([
            'active' => $request['active'],
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
            'small_title' => 'required|array',
            'url' => 'nullable|string|min:3',
            'image' => 'nullable|image|mimes:jpg,jpeg,png',
            'icon' => 'nullable|image|mimes:jpg,jpeg,png'
        ];
    }
}
