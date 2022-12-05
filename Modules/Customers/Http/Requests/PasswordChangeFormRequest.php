<?php

namespace TypiCMS\Modules\Customers\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PasswordChangeFormRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'old_password' => 'required|max:255',
            'password' => 'required|min:8|max:255|confirmed',
        ];
    }
}
