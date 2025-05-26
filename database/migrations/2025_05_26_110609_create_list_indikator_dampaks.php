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
        Schema::create('list_indikator_dampaks', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_indikator');
            $table->string('indikator')->nullable();
            $table->foreignId('id_komponen');
            $table->foreignId('id_instansi');
            $table->string('target')->nullable();
            $table->string('satuan')->nullable();
            $table->string('jenis_dokumen')->nullable();
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
        Schema::dropIfExists('list_indikator_dampaks');
    }
};
