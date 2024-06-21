<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableKader extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kader', function (Blueprint $table) {
            $table->id();
            $table->string('nama_lengkap');
            $table->string('no_hp');
            $table->string('email');
            $table->string('sosial_media');
            $table->string('jenis_kelamin');
            $table->string('agama');
            $table->string('kebangsaan');
            $table->string('status_menikah');
            $table->dateTime('tanggal_lahir');
            $table->string('tempat_lahir');
            $table->text('domisili');
            $table->string('foto');
            $table->string('pc');
            $table->string('komisariat');
            $table->string('universitas');
            $table->string('fakultas');
            $table->string('prodi');
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
        Schema::dropIfExists('kader');
    }
}
