<?php

namespace App\Http\Requests;

use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
            'role_id' => 'required|integer|in:2,1',
            'name' => 'required|string|max:50|regex:/^[^0-9]+$/',
            'email' => 'required|string|email|max:50|unique:users',
            'nik' => 'required|string|min:16|max:16|regex:/^[0-9]+$/',
            'phone' => 'required|string|max:15|regex:/^[0-9]+$/',
            'address' => 'required|string',
            'password' => 'required|string|confirmed|min:8',
        ];
    }
}
