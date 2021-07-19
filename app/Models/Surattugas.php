<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Surattugas extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table ="surattugas";
    protected $primaryKey ="id_st";
    protected $fillable = [
        'no_st',
        'user_nip',
        'nama',
        'keperluan',
        'tanggal',
        'tempat',
        'status',
        'created_at',
    ];
    public function user(){
        return $this->belongsTo(User::class);
    }
}
