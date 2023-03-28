<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateAbsensiRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'namaKaryawan' => 'required',
            'tanggalMasuk' => 'required',
            'waktuMasuk' => 'required',
            'status' => 'required',
            'waktuKeluar' => 'required'
        ];
    }
    public function messages()
    {
        return [
            'namaKaryawan.required' => 'Nama Karyawan Tidak Boleh Kosong!',
            'tanggalMasuk.required' => 'Tanggal Masuk Tidak Boleh Kosong!',
            'waktuMasuk.required' => 'Waktu Masuk Tidak Boleh Kosong!',
            'status.required' => 'Status Tidak Boleh Kosong!',
            'waktuKeluar.required' => 'Waktu Keluar Tidak Boleh Kosong!'
        ];
    }
}
