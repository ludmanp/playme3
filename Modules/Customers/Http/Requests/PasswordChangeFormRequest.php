<?php

namespace TypiCMS\Modules\Customers\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PasswordChangeFormRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'old_password' => 'required',
            'password' => 'required|min:8|max:255|confirmed',
        ];
    }

    public function messages()
    {
        return [
            'old_password.required' => __('Old password is required'),
            'password.required' => __('Password is required'),
            'password.min' => __('Password is less than 8 characters'),
            'password.max' => __('Password is more than 255 characters'),
            'password.confirmed' => __('Password and confirmation does not match'),
        ];
    }
}
