<?php

namespace TypiCMS\Modules\Shootings\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateFormRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'title' => 'required|max:255',
            'summary' => 'required|max:1000',
            'addresses.*.address' => 'required|max:255',
            'dates.*.date' => 'required|date',
            'leader_name' => 'required|max:255',
            'leader_phone' => 'required|max:255',
            'leader_email' => 'required|email',
            'company' => 'nullable|max:255',
            'registration_nr' => 'nullable|max:255',
            'legal_address' => 'nullable|max:255',
            'company_phone' => 'nullable|max:255',
            'company_email' => 'nullable|email',
            'products' => 'required|array',
            'think_yourself' => 'nullable|boolean',
            'parameters' => 'array',
        ];
    }
}
