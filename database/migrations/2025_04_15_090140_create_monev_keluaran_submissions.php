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
        Schema::create('monev_keluaran_submissions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('indikator_keluaran_id')->constrained('monev_indikator_keluarans');
            $table->foreignId('user_id')->constrained('users');
            $table->year('tahun');
            $table->integer('capaian')->default(0);
            $table->tinyInteger('status')->default(0); // 0=pending, 1=approved, 2=rejected
            $table->timestamps();
            
            // Indexes for performance
            $table->index(['user_id', 'indikator_keluaran_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('monev_keluaran_submissions');
    }
};
