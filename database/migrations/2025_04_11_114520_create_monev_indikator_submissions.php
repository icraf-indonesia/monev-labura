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
        Schema::create('monev_indikator_submissions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('indikator_id')->constrained('monev_indikators');
            $table->foreignId('user_id')->constrained('users');
            $table->year('tahun');
            $table->integer('capaian')->default(0);
            $table->string('dokumen_pendukung')->nullable();
            $table->tinyInteger('status')->default(0); // 0=pending, 1=approved, 2=rejected
            $table->timestamps();
            
            $table->index(['user_id', 'indikator_id']); // For faster submission counting
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('monev_indikator_submissions');
    }
};
