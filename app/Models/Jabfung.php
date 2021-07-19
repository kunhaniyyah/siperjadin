<?php

namespace App\Models;
use App\Models\Pegawai;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jabfung extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table ="jabfung";
    
    protected $fillable = [
        'id',
        'jabfung',
    ];
    public function pegawai()
    {
        return $this->hasMany(Pegawai::class);
    }
}
