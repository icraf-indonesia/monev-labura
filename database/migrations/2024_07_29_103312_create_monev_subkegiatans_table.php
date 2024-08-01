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
        Schema::create('monev_subkegiatans', function (Blueprint $table) {
            $table->id();
            $table->string('subkegiatan')->nullable();
            $table->foreignId('id_kegiatan');
            $table->string('indikator_keluaran')->nullable();
            $table->string('target')->nullable();
            $table->string('satuan')->nullable();
            $table->foreignId('id_instansi');
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
        Schema::dropIfExists('monev_subkegiatans');
    }
};
