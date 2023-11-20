<?php

namespace App\Http\Requests;

use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Http\FormRequest;

class ComplaintRequest extends FormRequest
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
            'title' => 'required|string|max:50',
            'body' => 'required|string',
            'category' => 'required|numeric',
            'photo' => 'image|mimes:jpg,png,jpeg',
            "is_private" => 'boolean',
            "is_anonymous" => 'boolean'
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'title.required' => 'Judul tidak boleh kosong!',
            'title.max' => 'Judul tidak boleh lebih dari :max karakter!',
            'body.required' => 'Isi aduan tidak boleh kosong!',
            'category.required' => 'Kategori tidak boleh kosong!',
            'photo.image' => 'File harus berupa foto!',
            'photo.mimes' => 'Foto harus berupa jpg, png, jpeg!',
        ];
    }
}
