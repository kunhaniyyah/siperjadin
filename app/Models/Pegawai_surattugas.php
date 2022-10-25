<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pegawai_surattugas extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table ="pegawai_surattugas";
    protected $primaryKey ="id";
    protected $fillable = [
        'pegawai_id',
        'surattugas_id',
    ];

    public function pegawai()
    {
        return $this->belongsTo(pegawai::class);
    }
}

