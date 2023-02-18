<?php

namespace TypiCMS\Modules\Customers\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProfileFormRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'email' => 'required|email:rfc,dns|max:255',
            'phone' => 'required|max:255',
            'first_name' => 'required|max:255',
        ];
    }

    public function messages()
    {
        return [
            'first_name.required' => __('Name is required'),
            'first_name.max' => __('Name is more than 255 characters'),
            'email.required' => __('Email is required'),
            'email.max' => __('Email is more than 255 characters'),
            'email.email' => __('Incorrect contact email'),
            'phone.required' => __('Phone is required'),
            'phone.max' => __('Phone is more than 255 characters'),
        ];
    }
}
