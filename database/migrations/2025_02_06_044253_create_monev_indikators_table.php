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
        Schema::create('monev_indikators', function (Blueprint $table) {
            $table->id();
            $table->string('indikator')->nullable();
            $table->foreignId('id_komponen');
            $table->foreignId('id_instansi');
            $table->string('target')->nullable();
            $table->string('satuan')->nullable();
            $table->string('tahun')->nullable();
            $table->string('capaian')->nullable();
            $table->string('dokumen_pendukung')->nullable();
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
        Schema::dropIfExists('monev_indikators');
    }
};
