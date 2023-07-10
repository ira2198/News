<?php

namespace App\Http\Requests\Sources;

use Illuminate\Foundation\Http\FormRequest;

class Update extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name_source' => ['required', 'string', 'min:3', 'max:150'],
            'description' => ['nullable', 'string','min:6','max:300'],
            'links' => ['sometimes', 'url']
        ];
    }

    public function messages():array
    {
        return [
            'url'=>'Такого адреса не существует. Пожалуйста проверьте поле :attribute',
        ];
    }

    public function attributes():array
    {
        return [
            'links' => 'Ссылки',
        ];
    }
}
