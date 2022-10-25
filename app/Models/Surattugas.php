<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Surattugas extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table ="surattugas";
    // protected $primaryKey ="id";
    protected $fillable = [
        'no_st',
        'keperluan',
        'tanggal',
        'tempat',
        'status',
        'tanggal_st',
        'created_at',
    ];
    public function anggota()
    {
        return $this->belongsToMany(Anggota::class);
    }
    public function sppd(){
        return $this->hasOne(Sppd::class);
    }
    public function pegawai()
    {
        return $this->belongsToMany(pegawai::class);
    }
    public function user()
    {
        return $this->belongsToMany(User::class);
    }
}
