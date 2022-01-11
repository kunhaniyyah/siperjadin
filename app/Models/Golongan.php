<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Golongan extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table ="golongan";
    
    protected $fillable = [
        'id',
        'golongan',
    ];
    public function pegawai()
    {
        return $this->hasMany(Pegawai::class);
    }
}
