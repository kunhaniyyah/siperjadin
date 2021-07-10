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
            $table->integer('nip', 18);
            $table->string('nama', 100);
            $table->enum('pangkat', 
            [
                'Lektor',
                'Pembina',
                'Pembina Utama',
                'Pembina Utama Madya',
                'Pembina Utama Muda',
                'Pembina Tk.1',
                'Penata',
                'Penata Tk.1',
                'Penata Muda',
                'Penata Muda Tk.1',
                'Pengatur',
                'Pengatur Muda',
                'Juru',
            ]);
            $table->enum('golongan', 
            [
                'III/a',
                'III/b',
                'III/c',
                'III/d',
                'II/a',
                'I/c',
                'II/c',
                'IV/a',
                'IV/b',
                'IV/c',
            ]);
            $table->enum('jabfung',
            [
                'Lektor',
                'Lektor Kepala',
                'Fungsional Umum',
                'Tenaga Pengajar',
                'Asisten Ahli',
                'Guru Besar',
                'Arsiparis',
                'Tenaga Pendidik',
                'Pranata Laboratorium',
            ]);
            $table->enum('tingkat',
            [
                'B',
                'C',
            ]);
            $table->enum('fakultas',
            [
                'FMIPA',
                'Sekolah Vokasi',
                'FP',
                'FK',
                'FKIP',
                'FISIP',
                'FH',
                'FEB',
                'FIB',
                'FT',
                'FSRD',
                'FKOR',
                'PDD Madiun',
                'UNS Pusat',
                'UPT Kearsipan',
            ]);
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
