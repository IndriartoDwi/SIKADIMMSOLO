<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableProdi extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('prodi', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('kampus_id')->nullable();
            $table->unsignedBigInteger('fakultas_id')->nullable();
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
        Schema::dropIfExists('prodi');
    }
}
