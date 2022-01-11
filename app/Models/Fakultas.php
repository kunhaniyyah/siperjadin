<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fakultas extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table ="fakultas";
    
    protected $fillable = [
        'id',
        'fakultas',
    ];
    public function pegawai()
    {
        return $this->hasMany(Pegawai::class);
    }
}
