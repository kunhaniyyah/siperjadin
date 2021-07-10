<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Maatwebsite\Excel\Facades\Excel;
use Maatwebsite\Excel\Concerns\FromCollection;

class Pegawai extends Model
{
    //Explanation : By default laravel will expect created_at & updated_at column in your table.
    // By making it to false it will override the default setting.
    public $timestamps = false;
    protected $table ="pegawai";
    protected $primaryKey ="nip";
    protected $fillable = [
        'nip',
        'nama',
        'fakultas',
        'pangkat',
        'jabfung_id',
        'golongan',
        'tingkat',
    ];

    public function jabfung()
    {
        //belongsto , 1 jabfung memiliki banyak pegawai
        return $this->belongsTo(Jabfung::class);
    }
}
