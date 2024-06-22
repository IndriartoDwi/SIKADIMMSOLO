<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableRefPimpinan extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ref_pimpinan', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('kader_id')->nullable();
            $table->string('kegiatan_pimpinan');
            $table->string('tahun_pimpinan');
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
        Schema::dropIfExists('ref_pimpinan');
    }
}
