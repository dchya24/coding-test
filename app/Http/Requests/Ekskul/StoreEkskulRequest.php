<?php

namespace App\Http\Requests\Ekskul;

use Illuminate\Foundation\Http\FormRequest;

class StoreEkskulRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            "nama" => "required",
            "tahun" => "required",
        ];
    }

    public function messages(): array {
        return [
            "nama.required" => "Nama Ekstrakulikuler Tidak Boleh Kosong!",
            "tahun.required" => "Tahun Masuk Tidak Boleh Kosong!"
        ];
    }
}
