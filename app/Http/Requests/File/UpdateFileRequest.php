<?php

namespace App\Http\Requests\File;

use Illuminate\Foundation\Http\FormRequest;

class UpdateFileRequest extends FormRequest
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
            'file' => 'required|string',
            'key' => 'required|integer',
            'title' => 'required|array',
            'title.*' => 'nullable|string|max:255',
            'name' => ($this->id ? 'nullable' : 'required').'|max:20480|mimes:doc,docx,xlsx,xls,csv,pdf',
            //'name' => 'required|max:20480|mimes:doc,docx,xlsx,xls,csv,pdf',
            'imageSmall' => 'nullable|image|max:2048|mimes:jpg,jpeg,png',
            'imageBig' => 'nullable|image|max:2048|mimes:jpg,jpeg,png',
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
            'image' => 'Формат не поддерживается',
            'mimes' => 'Формат не поддерживается',
            'name.required' => 'Загрузите файл!',
            'name.mimes' => 'Допустимые форматы doc, docx, xlsx, xls, csv, pdf.',
            'name.max' => 'Максимальный размер файла 20мб.',
            'imageSmall.max' => 'Максимальный размер файла :max',
            'imageBig.max' => 'Максимальный размер файла :max',
        ];
    }
}
