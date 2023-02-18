<?php

namespace TypiCMS\Modules\Broadcasts\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateFormRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'title' => 'required|max:255',
            'summary' => 'required|max:1000',
        ];
    }

    public function messages(): array
    {
        return [
            'title.required' => __('The title is required'),
            'title.max' => __('The title is more than 255 characters'),
            'summary.required' => __('The summary is required'),
            'summary.max' => __('The title is more than 1000 characters'),
        ];
    }
}
