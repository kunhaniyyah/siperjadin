<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Anggota extends Model
{
    use HasFactory;
    protected $table = 'anggota';
    protected $primaryKey ="id_anggota";
    protected $fillable = [
        'id_anggota',
        'pegawai_id_pegawai',
        'surattugas_id_surattugas',
    ];

    public function surattugas()
    {
        return $this->belongsToMany(surattugas::class);
    }
    
    public function pegawai()
    {
        return $this->belongsToMany(pegawai::class);
    }

}
