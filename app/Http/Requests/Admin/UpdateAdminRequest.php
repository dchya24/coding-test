<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class UpdateAdminRequest extends FormRequest
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
            "firstName" => "required",
            "lastName" => "required",
            "email" => "required|email",
            "tgl_lahir" => "required|date",
            "jenisKelamin" => "required"
        ];
    }

    public function messages(): array {
        return [
            "firstName.required" => "Nama Depan Tidak Boleh Kosong!",
            "lastName.required" => "Nama Belakang Tidak Boleh Kosong!",
            "email.required" => "Email Tidak Boleh Kosong!",
            "email.email" => "Format Email Harus Valid!",
            "tgl_lahir.required" => "Tanggal Lahir Tidak Boleh Kosong!",
            "jenisKelamin.required" => "Jenis Kelamin Tidak Boleh Kosong!",
        ];
    }
}
