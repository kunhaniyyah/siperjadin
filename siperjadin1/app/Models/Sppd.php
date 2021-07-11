<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sppd extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table ="sppd";
    protected $primaryKey = "id_sppd";
    protected $fillable = [
        'no_sppd',
        'no_st',
        'nama',
        'nip',
        'tgl_berangkat',
        'tgl_pulang',
        'provinsi',
        'kota',
        'kegiatan',
        'total_ajuan',
        'tingkat',
    ];
}
