<?php

namespace App\Http\Requests\User\Checkout;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class Store extends FormRequest
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
            'name' => 'required|string',
            'nim' => 'required|string|max:8|unique:students,nim_mhs,'.Auth::user()->id.',user_id',
            // 'unique:students,nim_mhs,'.Auth::id().',id': Menyatakan bahwa isi field 'nim' harus unik di tabel students pada kolom nim_mhs, kecuali jika nilai Auth::id() (ID pengguna yang sedang terautentikasi) cocok dengan nilai dalam kolom id. Ini berarti bahwa aturan validasi ini memungkinkan pengguna saat ini untuk menggunakan nomor induk mahasiswa yang sama dengan yang sudah ada dalam database (biasanya untuk mengizinkan pengguna memperbarui data mereka sendiri), tetapi nomor induk mahasiswa harus tetap unik di antara pengguna lain.
        ];
    }
}
