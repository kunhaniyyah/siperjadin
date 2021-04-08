<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePegawaisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pegawai', function (Blueprint $table) {
            $table->id();
            $table->string('nip', 100);
            $table->text('nama', 100);
            $table->enum('fakultas',
                [
                    'Sekolah Vokasi', 
                    'Fakultas Pertanian',
                    'Fakultas MIPA',
                    'Fakultas Kedokteran',
                    'Fakultas Keguruan dan Ilmu Pendidikan',
                    'Fakultas Ilmu Sosial dan Politik',
                    'Fakultas Ekonomi Bisnis',
                    'Fakultas Ilmu Budaya',
                    'Fakultas Teknik',
                    'Fakultas Seni Rupa Desain',
                    'PDD Madiun'
                ]
            
            );
            $table->enum('golongan', 
            [
                'IA',
                'IIA', 
                'IIIA', 
                'IVA',
                'IB',
                'IIB',
                'IIIB',
                'IVB',
                'IC',
                'IIC',
                'IIIC',
                'IVC',
                'ID',
                'IID',
                'IIID',
                'IVD',
            ]);
            $table->string('pangkat', 100);
            $table->enum('jabfung', 
            [
                'Guru Besar', 
                'Lektor', 
                'Asisten Ahli', 
                'Lektor Kepala',
                'Arsiparis',
                'Tenaga Pengajar',
                'Fungsional Umum',
                'Tenaga Pendidik',
                'Pranata Laboraturium Pendidikan',
            ]);
            $table->string('jabstruk', 100);
            $table->string('jabatan', 100);
            $table->timestamps();


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pegawai');
    }
}
