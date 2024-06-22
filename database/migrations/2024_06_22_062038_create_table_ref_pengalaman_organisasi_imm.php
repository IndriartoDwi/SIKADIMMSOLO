<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableRefPengalamanOrganisasiImm extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ref_pengalaman_organisasi_imm', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('kader_id')->nullable();
            $table->string('posisi_jabatan');
            $table->dateTime('mulai_organisasi');
            $table->dateTime('selesai_organisasi');
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
        Schema::dropIfExists('ref_pengalaman_organisasi_imm');
    }
}
