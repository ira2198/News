<?php

namespace App\Http\Requests\Users;

use Illuminate\Foundation\Http\FormRequest;

class Store extends FormRequest
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
            'last_name'=> ['required', 'string', 'min:2', 'max:150'],
            'first_name'=> ['required', 'string', 'min:2', 'max:150'],
            'password'=> ['required', 'string', 'min:4'],
            'current_password'=> ['nullable', 'string', 'current_password'],
            'email'=>['required', 'string','email', 'unique:users,email'],
            'phone'=>['required', 'string'],
            'avatar'=>['nullable', 'file', 'img', 'max:1024'],
        ];
    }
}
