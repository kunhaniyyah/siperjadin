<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sppd extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table ="sppd";
    protected $primaryKey ="no_sppd";
    protected $fillable = [
        'tgl_sppd',
        'no_st',
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
