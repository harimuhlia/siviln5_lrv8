<?php

namespace App\Imports;

use App\Models\Siswa;
use Illuminate\Validation\Rule;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Validator;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithValidation;

class SiswaImport implements ToModel, WithValidation
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Siswa([
            'namalengkap' => $row[0],
            'jenis_kelamin' => $row[1],
            'NISN' => $row[2],
            'jurusan' => $row[3],
            'tempatlahir' => $row[4],
            'tanggal_lahir' => $row[5],
            'wali' => $row[6],
            'thn_masuk' => $row[7],
            'thn_lulus' => $row[8],
            'no_ijazah' => $row[9],
            'asalsekolah' => $row[10]
        ]);
    }

    // public function model(array $row)
    // {
    //     return new User([
    //         'name' => $row[0],
    //         'email' => $row[1],
    //         'password' => $row[2],
    //     ]);
    // }

    public function rules(): array
    {
        return [
            '2' => 'required|unique:siswas,NISN',
        ];
        // return [
        //     '2' => [
        //         'required',
        //         'string',
        //         'NISN',
        //         Rule::unique('siswas', 'NISN'),
        //     ],
        // ];
    }
}
