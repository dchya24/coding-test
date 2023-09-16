<?php

namespace App\Http\Requests\Siswa;

use Illuminate\Foundation\Http\FormRequest;

class UpdateSiswaRequest extends FormRequest
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
            "noTelp" => "required",
            "nis" => "required",
            "jenisKelamin" => "required",
            "alamat" => "required",
            "profileImage" => "image|mimes:jpg,png,jpeg"
        ];
    }

    public function messages(): array {
        return [
            "firstName.required" => "Nama Depan Tidak Boleh Kosong!",
            "lastName.required" => "Nama Belakang Tidak Boleh Kosong!",
            "noTelp.required" => "No HP Tidak Boleh Kosong!",
            "nis.required" => "Nomor Induk Siswa Tidak Boleh Kosong",
            "jenisKelamin.required" => "Jenis Kelamin Tidak Boleh Kosong!",
            "alamat.required" => "Alamat Tidak Boleh Kosong",
            "profileImage.image" => "File Yang Diupload Harus Berupa Gambar!"
        ];
    }
}
