<?php

namespace App\Http\Requests\Sources;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
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
            'title' => ['required', 'string', 'min:5', 'max:150'],
            'author' => ['required', 'string', 'min:5', 'max:100'],
            'country' => ['required', 'string', 'min:5'],
            'year' => ['required', 'integer']
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
            'author' => '"Автор"',
            'country' => '"Страна"',
            'year' => '"Год"'
        ];
    }
}
