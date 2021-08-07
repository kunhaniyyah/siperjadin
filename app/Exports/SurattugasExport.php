<?php

namespace App\Exports;

use App\Models\Surattugas;
use Maatwebsite\Excel\Concerns\FromCollection;

class SurattugasExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Surattugas::all();
    }
}
