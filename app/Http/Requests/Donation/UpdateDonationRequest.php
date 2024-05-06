<?php

namespace App\Http\Requests\Donation;

use App\Models\Language;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class UpdateDonationRequest extends FormRequest
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

        $request['status'] = (int)!empty($request['status']);
        $request['is_binding'] = (int)!empty($request['is_binding']);

        $this->merge([
            'status' => $request['status'],
            'is_binding' => $request['is_binding'],
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
            'status' => 'required|integer',
            'is_binding' => 'required|integer',
            'message' => 'nullable|string',
            'message_admin' => 'nullable|string',
        ];
    }
}
