<?php

namespace App\Exports;

use App\Models\Staff;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class StaffsExport implements FromCollection, WithHeadings, WithMapping
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Staff::where('status', true)->get();
    }
    

    public function map($data):array
    {
        return [
            $data->nupl,
            $data->nama,
            $data->no_kk,
            $data->no_nik,
            $data->tempat_lahir,
            $data->tanggal_lahir,
            $data->pendidikan_terakhir,
            $data->lulusan,
            $data->tmt,
            $data->jabatan,
            $data->nama_istri,
            $data->nik_istri,
            $data->tempat_lahir_istri,
            $data->tanggal_lahir_istri,
            $data->pendidikan_istri,
            $data->pekerjaan_istri,
            $data->alamat_ktp,
            $data->alamat_domisili,
        ];

    }
    public function headings(): array
    {
        return [
            'nupl',
            'nama',
            "no kk",
            "no nik",
           " tempat lahir",
           " tanggal lahir",
            "pendidikan terakhir",
            "lulusan",
            "tmt",
            "jabatan",
            "nama istri",
            "nik istri",
            "tempat lahir istri",
            "tanggal lahir istri",
            "pendidikan istri",
            "pekerjaan istri",
           " alamat ktp",
            "alamat domisili",
        ];
    }
}
