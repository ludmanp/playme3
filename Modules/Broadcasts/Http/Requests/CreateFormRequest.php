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

    public function messages(): array
    {
        return [
            'title.required' => __('Title is required'),
            'title.max' => __('Title is more than 255 characters'),
            'summary.required' => __('Summary is required'),
            'summary.max' => __('Title is more than 1000 characters'),
            'dates.*.date.date' => __('Incorrect date format'),
            'contact_name.required' => __('Contact name is required'),
            'contact_name.max' => __('Contact name is more then 255 characters'),
            'contact_phone.required' => __('Contact phone is required'),
            'contact_phone.max' => __('Contact phone is more then 255 characters'),
            'contact_email.required' => __('Contact email is required'),
            'contact_email.email' => __('Incorrect contact email'),
            'leader_name.max' => __('Leader name is more then 255 characters'),
            'leader_phone.max' => __('Leader phone is more then 255 characters'),
            'leader_email.email' => __('Incorrect leader email'),
            'company.max' => __('Company is more then 255 characters'),
            'registration_nr.max' => __('Registration nr is more then 255 characters'),
            'legal_address.max' => __('Legal address is more then 255 characters'),
            'company_phone.max' => __('Company phone is more then 255 characters'),
            'company_email.email' => __('Incorrect company email'),
            'is_public.boolean' => __('Public/private should be boolean'),
            'parameters.array' => __('Parameters should be an array'),
        ];
    }
}
