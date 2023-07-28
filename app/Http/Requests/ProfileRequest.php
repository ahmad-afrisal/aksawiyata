<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class ProfileRequest extends FormRequest
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
            'name' => 'string',
            'nim' => 'string',
            'angkatan_mhs' => 'string',
            'concentration' => 'string',
            'about' => 'string',
            'phone_number' => 'string',
            'instagram_profile' => 'string',
            'linkedin_profile' => 'string',
            'github_profile' => 'string',
            'transkip' => 'string',
            'cv' => 'string',
            'avatar' => 'image|mimes:png,jpg,jpeg|max:2048',
        ];
    }
}
