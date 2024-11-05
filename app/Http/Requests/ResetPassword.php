<?php

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ResetPassword extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function authorize() {
        return true;
    }
    
    public function rules(): array
    {
        return [
            'password' => 'required|min:6',
            'confirm_password' => 'required|min:6|same:password',
        ];
    }
}
