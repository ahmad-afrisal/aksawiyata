<?php

namespace App\Http\Requests\Admin\Job;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class JobRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return Auth::check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'company_id' => 'required',
            'name' => 'required',
            'details_of_activities' => 'required',
            'develop_competencies' => 'required',
            'participant_criteria' => 'required',
            'additional_information' => 'required',
            'quota' => 'required|integer',
            'status' => 'required|boolean',
        ];
    }
}
