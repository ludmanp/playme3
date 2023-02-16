<?php

namespace TypiCMS\Modules\Projects\Http\Requests;

use TypiCMS\Modules\Core\Http\Requests\AbstractFormRequest;

class FormRequest extends AbstractFormRequest
{
    /**
     * Prepare the data for validation.
     *
     * @return void
     */
    protected function prepareForValidation()
    {
        if(!$this->has('team_members')) {
            $this->merge([
                'team_members' => [],
            ]);
        }
    }


    public function rules()
    {
        return [
            'image_id' => 'nullable|integer',
            'client_id' => 'required|integer',
            'team_members' => 'nullable|array',
            'title.*' => 'nullable|max:255',
            'slug.*' => 'nullable|alpha_dash|max:255|required_if:status.*,1|required_with:title.*',
            'status' => 'boolean',
            'summary.*' => 'nullable',
            'body.*' => 'nullable',
            'date' => 'nullable|date',
            'location' => 'nullable|max:255',
        ];
    }
}
