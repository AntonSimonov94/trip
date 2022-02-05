<?php

namespace App\Http\Requests\News;

use Illuminate\Foundation\Http\FormRequest;

class CreateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize():bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules():array
    {
        return [
            'catalogs' => ['required', 'array'],
            'title' => ['required', 'string', 'min:5', 'max:150'],
            'producer' => ['required', 'string', 'min:5', 'max:100'],
            'description' => ['required', 'string', 'min:5'],
            'isImage' => ['nullable', 'boolean'],
            'sourceImage' => ['nullable', 'file', 'image', 'nimes:jpg,png'],
            'likes' => ['nullable', 'integer'],
            'sources' => ['required', 'array']
        ];
    }
    public function messages()
    {
        return [
            'required' => 'Неверно заполнено поле :attribute'
        ];
    }
    public function attributes()
    {
        return [
            'producer' => '"Автор"',
            'sources' => '"Источники"',
            'catalogs' => '"Категории"'
        ];
    }
}
