<?php

namespace App\Http\Requests\User\Activity;

use Illuminate\Foundation\Http\FormRequest;

class StoreLogbookRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'activity' => 'required',
            'detail_activity' => 'required',
            // 'photo' => 'required|image|mimes:jpg,jpeg,png|max:2048'
        ];
    }
}
