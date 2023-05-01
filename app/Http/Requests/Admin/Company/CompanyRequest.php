<?php

namespace App\Http\Requests\Admin\Company;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class CompanyRequest extends FormRequest
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
            'name' => 'required|string',
            'about' => 'required|string',
            'ceo' => 'required|string',
            'number_of_employees' => 'required|integer',
            'street' => 'required|string',
            'postal_code' => 'required|string',
            'district' => 'required|string',
            'regency' => 'required|string',
            'province' => 'required|string',
            'logo' => 'image|mimes:jpg,png,jpeg|max:1048',
            'photo.*' => 'image|mimes:jpg,png,jpeg|max:4048',
            // 'photo' => 'image|mimes:jpg,png,jpeg|max:4048',
        ];
    }
}
