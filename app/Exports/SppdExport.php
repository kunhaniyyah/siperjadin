<?php

namespace App\Exports;

use App\Models\Sppd;
use Maatwebsite\Excel\Concerns\FromCollection;

class SppdExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Sppd::all();
    }
}
