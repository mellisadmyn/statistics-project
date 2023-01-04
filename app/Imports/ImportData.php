<?php

namespace App\Imports;

use App\Models\Mahasiswa;
use Maatwebsite\Excel\Concerns\ToModel;

class ImportData implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    
    public function model(array $row)
    {
        //dd($row);

        return new Mahasiswa([
            'nama'  => $row[0],
            'score' => $row[1],
        ]);
    }
}
