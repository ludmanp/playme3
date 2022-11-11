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
}
