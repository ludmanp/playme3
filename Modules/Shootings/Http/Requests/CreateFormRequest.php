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

    public function messages(): array
    {
        return [
            'title.required' => __('Title is required'),
            'title.max' => __('Title is more than 255 characters'),
            'summary.required' => __('Summary is required'),
            'summary.max' => __('Title is more than 1000 characters'),
            'addresses.*.address.required' => __('Address is required'),
            'addresses.*.address.max' => __('Address is more then 255 characters'),
            'dates.*.date.date' => __('Incorrect date format'),
            'leader_name.required' => __('Leader name is required'),
            'leader_name.max' => __('Leader name is more then 255 characters'),
            'leader_phone.required' => __('Leader phone is required'),
            'leader_phone.max' => __('Leader phone is more then 255 characters'),
            'leader_email.required' => __('Leader email is required'),
            'leader_email.email' => __('Incorrect leader email'),
            'company.max' => __('Company is more then 255 characters'),
            'registration_nr.max' => __('Registration nr is more then 255 characters'),
            'legal_address.max' => __('Legal address is more then 255 characters'),
            'company_phone.max' => __('Company phone is more then 255 characters'),
            'company_email.email' => __('Incorrect company email'),
            'parameters.array' => __('Parameters should be an array'),
            'products.required' => __('Products are not selected'),
        ];
    }
}
