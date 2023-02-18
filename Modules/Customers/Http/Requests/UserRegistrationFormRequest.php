<?php

namespace TypiCMS\Modules\Customers\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRegistrationFormRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'email' => 'required|email:rfc,dns|max:255',
            'phone' => 'required|max:255',
            'first_name' => 'required|max:255',
            'password' => 'required|min:8|max:255|confirmed',
            'accept' => 'required|accepted',
//            'my_name' => 'honeypot',
//            'my_time' => 'required|honeytime:5',
        ];
    }

    public function messages(): array
    {
        return [
            'first_name.required' => __('Name is required'),
            'first_name.max' => __('Name is more than 255 characters'),
            'email.required' => __('Email is required'),
            'email.max' => __('Email is more than 255 characters'),
            'email.email' => __('Incorrect contact email'),
            'phone.required' => __('Phone is required'),
            'phone.max' => __('Phone is more than 255 characters'),
            'password.required' => __('Password is required'),
            'password.min' => __('Password is less than 8 characters'),
            'password.max' => __('Password is more than 255 characters'),
            'password.confirmed' => __('Password and confirmation does not match'),
            'accept.required' => __('Acceptance is required'),
            'accept.accepted' => __('You should accept rules'),

        ];
    }
}
