<?php

namespace App\Http\Requests;

use App\Rules\ConfirmOldPassword;
use Illuminate\Foundation\Http\FormRequest;

class UpdatePasswordRequest extends FormRequest
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


    // current_password
    // password -> required, min: 8
    // password_confirmation

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'current_password' => ['required', new ConfirmOldPassword()],
            'password' => ['required', 'min:8', 'max:255', 'confirmed']
        ];
    }
}
