<?php

namespace App\Http\Requests\News;

use App\Enums\NewsStatus;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Enum;

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

    public function rules():array
    {   
        return [
           'title' => ['required', 'string', 'min:3', 'max:150'],
           'categories_id' => ['required', 'exists:categories,id'],
           'user_id' => ['required', 'exists:users,id'],// 'string', 'min: ', 'max: '
           'status' => ['required', new Enum(NewsStatus::class)],
           'sources.*' => ['required','exists:sources,id'],
           'main_img' => ['sometimes'],
           'description' => ['nullable', 'string','min:6','max:300'],
           'text' => ['required', 'string', 'max:30000'],
        ];

    }

    public function getSources():array
    {
       return $this->validated('sources');
    }

    public function messages():array
    {
        return [
            'exists'=>'Значение :attribute не существует. Пожалуйста проверьте данные в поле attribute',
        ];
    }

    public function attributes():array
    {
        return [
            'categories_id' => 'Категория',
            'user_id' => 'Автор',
            'main_img' => 'Аватар'
        ];
    }

}
