<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pangkat extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table ="pangkat";
    
    protected $fillable = [
        'id',
        'pangkat',
    ];
    public function pegawai()
    {
        return $this->hasMany(Pegawai::class);
    }
}
