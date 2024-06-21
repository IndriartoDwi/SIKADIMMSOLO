<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableRefPendidikanTerakhir extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ref_pendidikan_terakhir', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('kader_id')->nullable();
            $table->string('pendidikan_terakhir');
            $table->string('status_pendidikan_terakhir');
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
        Schema::dropIfExists('ref_pendidikan_terakhir');
    }
}
