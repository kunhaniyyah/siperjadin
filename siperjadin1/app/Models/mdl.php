<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class PegawaiModel extends Model
{
    protected $table = "pegawai";
    protected $primaryKey = "nip";
    protected $fillable = 
    [
        
        
    ];

    public function allData()
        {
            return DB::table('pegawai')->get();
        }
    public function detailData($nip)
        {

            $user = DB::table('pegawai')->where('nip', $nip)->first();
           
        }
        public function addData($data)
        {
            DB::table('pegawai')->insert($data);
        }
}
