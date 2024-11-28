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
        Schema::create('monev_capaians', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_keluaran');
            $table->string('tahun')->nullable();
            $table->string('semester')->nullable();
            $table->string('capaian')->nullable();
            $table->foreignId('id_stakeholder');
            $table->string('sumber_pembiayaan')->nullable();
            $table->integer('status')->default(0);
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
        Schema::dropIfExists('monev_capaians');
    }
};
