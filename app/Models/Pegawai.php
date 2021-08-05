<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Maatwebsite\Excel\Facades\Excel;
use Maatwebsite\Excel\Concerns\FromCollection;

class Pegawai extends Model
{
    //Explanation : By default laravel will expect created_at & updated_at column in your table.
    // By making it to false it will override the default setting.
    public $timestamps = false;
    protected $table ="pegawai";
    protected $primaryKey ="id_pegawai";
    protected $fillable = [
        'nip',
        'nama',
        'fakultas',
        'pangkat',
        'jabatan',
        'jabfung_id',
        'golongan',
        'tingkat',
        'foto',
    ];

    public function jabfung()
    {
        //belongsto , 1 jabfung memiliki banyak pegawai
        return $this->belongsTo (Jabfung::class);
    }
    public function user()
    {
       return $this->belongsTo(User::class);
    }
}
