<?php

namespace App\Http\Requests;

use App\Rules\AllLowerCase;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateProfileRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'username' => ['nullable', 'max:255', Rule::unique('users')->ignore(auth()->id()), new AllLowerCase(), 'alpha_dash'],
            'email' => ['nullable', 'email', 'max:255', Rule::unique('users')->ignore(auth()->id())],
        ];
    }
}
