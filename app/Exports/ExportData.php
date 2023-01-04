<?php

namespace App\Exports;

use App\Models\Mahasiswa;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithCustomCsvSettings;

class ExportData implements FromCollection, WithHeadings, WithCustomCsvSettings
{
    /**
    * @return \Illuminate\Support\Collection
    */

    public function getCsvSettings(): array
    {
        return [
            'delimiter' => ','
        ];
    }

    public function collection()
    {
        return Mahasiswa::select('nama', 'score')->get();
    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    
    public function headings(): array
    {
        return ["Name","Score"];
    }
}
