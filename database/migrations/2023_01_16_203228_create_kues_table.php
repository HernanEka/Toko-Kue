<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kues', function (Blueprint $table) {
            $table->id();
            $table->text('nama_kue');
            $table->longText('deskripsi_kue');
            $table->text('jenis_kue');
            $table->bigInteger('harga_kue');
            $table->text('foto_kue');
            $table->bigInteger('total_order')->default('0');
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
        Schema::dropIfExists('kues');
    }
};
