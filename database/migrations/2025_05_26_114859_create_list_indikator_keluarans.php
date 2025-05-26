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
        Schema::create('list_indikator_keluarans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_keluaran');
            $table->string('indikator_keluaran')->nullable();
            $table->string('target')->nullable();
            $table->string('satuan')->nullable();
            $table->foreignId('id_komponen');
            $table->foreignId('id_program');
            $table->foreignId('id_kegiatan');
            $table->foreignId('id_subkegiatan');
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
        Schema::dropIfExists('list_indikator_keluarans');
    }
};
