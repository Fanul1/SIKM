<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('beritas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('ukm_id');
            $table->string('judul');
            $table->string('category');
            $table->text('deskripsi');
            $table->string('gambar')->nullable();
            $table->date('tanggal');
            $table->string('status')->default('Belum Dipublish')->nullable();
            $table->timestamps();

            $table->foreign('ukm_id')->references('id')->on('ukms');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('beritas');
    }
};
