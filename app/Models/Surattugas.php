<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Surattugas extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table ="surattugas";
    protected $primaryKey ="id_surattugas";
    protected $fillable = [
        'no_st',
        'keperluan',
        'tanggal',
        'tempat',
        'status',
        'tanggal_st',
        'created_at',
        'pegawai_id_pegawai',
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function pegawai()
    {
        return $this->belongsTo(Pegawai::class);
    }
    public function sppd(){
        return $this->hasOne(Sppd::class);
    }
}
