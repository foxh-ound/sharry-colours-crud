<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ColourEditPostRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'hex' => [
                'required',
                'unique:colours',
                'size:6', // this is technically not needed because of the RegEx below, but it throws more user-friendly message if there are not exactly 6 characters
                'regex:/^([A-Fa-f0-9]{6})$/i' // exactly 6 characters needed, a combination of lowercase and uppercase letters A-F and any numbers in any order
            ]
        ];
    }
}
