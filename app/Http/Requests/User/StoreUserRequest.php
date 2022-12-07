<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreUserRequest extends FormRequest
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
            'name'      => 'required|string|max:255',
            'email'     => 'required|string|email|max:255|' . Rule::unique('users')->whereNull('deleted_at'),
            'phone'     => 'nullable|numeric|digits_between:10,15',
            'gender'    => 'required|in:MALE,FEMALE',
            'address'   => 'nullable|string|max:1000',
            'avatar'    => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'password_confirmation' => [
                'nullable',
                'min:8', 
                'regex:/[a-z]/',
                'regex:/[A-Z]/',
                'regex:/[0-9]/',
                'regex:/[@$!%*#?&]/',
            ],
            'password'              => [
                'nullable', 
                'confirmed',
            ],
        ];
    }

    public function messages()
    {
        return [
            'password_confirmation.regex' => 'Password must contain at least one uppercase letter, one digit, and one special character.',
        ];
    }
}
