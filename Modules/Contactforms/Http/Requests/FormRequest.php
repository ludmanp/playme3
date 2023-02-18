<?php

namespace TypiCMS\Modules\Contactforms\Http\Requests;

use TypiCMS\Modules\Core\Http\Requests\AbstractFormRequest;

class FormRequest extends AbstractFormRequest
{
    public function rules()
    {
        return [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|max:255',
            'message' => 'required|max:1000',
            'agree_privacy_policy' => 'required|boolean',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => __('Name is required'),
            'name.max' => __('Name is more than 255 characters'),
            'email.required' => __('Email is required'),
            'email.max' => __('Email is more than 255 characters'),
            'email.email' => __('Incorrect contact email'),
            'phone.required' => __('Phone is required'),
            'phone.max' => __('Phone is more than 255 characters'),
            'message.required' => __('Message is required'),
            'message.max' => __('Message is more than 1000 characters'),
            'agree_privacy_policy.required' => __('You should agree to the privacy policy'),
            'agree_privacy_policy.boolean' => __('Agreement to the privacy policy should be boolean'),
        ];
    }
}
