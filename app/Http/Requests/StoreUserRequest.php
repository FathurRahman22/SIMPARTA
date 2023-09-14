<?php

namespace App\Http\Requests;

use App\Models\User;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreUserRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('user_create');
    }

    public function rules()
    {
        return [
            'name' => [
                'string',
                'required',
            ],
            'email' => [
                'required',
                'unique:users',
            ],
            'password' => [
                'required',
                'min:8',                // Minimal 8 karakter
                'regex:/[A-Z]/',        // Harus memiliki huruf besar
                'regex:/[0-9]/',        // Harus memiliki angka
                'regex:/[^A-Za-z0-9]/', // Harus memiliki simbol
                'message' => [
                    'regex' => 'Password harus memiliki setidaknya satu huruf besar, satu angka, dan satu simbol.',
            
                ],
                ], 
            'roles.*' => [
                'integer',
            ],
            'roles' => [
                'required',
                'array',
            ],
        ];
    }
}
