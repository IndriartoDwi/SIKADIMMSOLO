<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableRefRiwayatSekolah extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ref_riwayat_sekolah', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('kader_id')->nullable();
            $table->string('jenjang_sekolah');
            $table->string('nama_sekolah');
            $table->string('tahun_lulus');
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
        Schema::dropIfExists('ref_riwayat_sekolah');
    }
}
