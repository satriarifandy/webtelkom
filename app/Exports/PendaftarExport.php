<?php

namespace App\Exports;

use App\Models\Pendaftar;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromQuery;

class PendaftarExport implements FromCollection{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Pendaftar::all();
    }

    public function map($row): array{
           $fields = [
              $row->nama,
              $row->alamat,
         ];
        return $fields;
    }
}
