<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSppdsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sppd', function (Blueprint $table) {
            $table->string('no_sppd', 100);
            $table->string('no_st', 100);
            $table->string('nip', 100);
            $table->string('tingkat', 100);
            $table->date('tgl_sppd');
            $table->date('tgl_berangkat');
            $table->date('tgl_pulang');
            $table->string('provinsi', 100);
            $table->string('kota', 100);
            $table->string('total_ajuan', 100);
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
        Schema::dropIfExists('sppd');
    }
}
