<?php

namespace App\Http\Requests;

use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Http\FormRequest;

class DocumentRequest extends FormRequest
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
            "document_type" => "required|in:surat keterangan usaha,surat keterangan domisili",
            "document_requirements.*" => "required|mimes:png,jpg,jpeg",
            "names.*" => "required|string"
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
            'document_type.required' => 'Jenis surat tidak boleh kosong!',
            "document_requirements.*.required" => "File harus diisi!",
            "document_requirements.*.mimes" => "File harus berupa gambar!"
        ];
    }
}
