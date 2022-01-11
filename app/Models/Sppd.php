<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class Sppd extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table ="sppd";
    protected $primaryKey = "id_sppd";
    protected $fillable = [
        'no_sppd',
        'surattugas_id_surattugas',
        'tgl_berangkat',
        'tgl_pulang',
        'provinsi',
        'kota',
        'kegiatan',
        'status',
        'tanggal_sppd',
    ];
    public function user(){
        return $this->belongsTo(User::class);
    }
    public function pegawai(){
        return $this->belongsTo(Pegawai::class);
    }
    public function surattugas(){
        return $this->belongsTo(Surattugas::class);
    }
}
