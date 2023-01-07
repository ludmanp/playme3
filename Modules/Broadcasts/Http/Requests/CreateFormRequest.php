<?php

namespace TypiCMS\Modules\Broadcasts\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateFormRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'title' => 'required|max:255',
            'summary' => 'required|max:1000',
            'addresses.*.address' => 'nullable|max:255',
            'dates.*.date' => 'nullable|date',
            'dates.*.starts_at' => 'nullable',
            'dates.*.arrive_at' => 'nullable',
            'contact_name' => 'required|max:255',
            'contact_phone' => 'required|max:255',
            'contact_email' => 'required|email',
            'leader_name' => 'nullable|max:255',
            'leader_phone' => 'nullable|max:255',
            'leader_email' => 'nullable|email',
            'company' => 'nullable|max:255',
            'registration_nr' => 'nullable|max:255',
            'legal_address' => 'nullable|max:255',
            'company_phone' => 'nullable|max:255',
            'company_email' => 'nullable|email',
            'is_public' => 'nullable|boolean',
            'parameters' => 'array',
        ];
    }
}
