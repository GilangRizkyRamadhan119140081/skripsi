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
        Schema::create('informasis', function (Blueprint $table) {
            $table->string('id_informasi', 255)->primary();
            $table->string('judul_informasi', 255);
            $table->string('alamat_informasi', 255);
            $table->string('gambar_informasi', 255);
            $table->date('tanggal_informasi');
            $table->string('pemilik_informasi', 255);
            $table->text('keterangan_informasi')->default('');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('informasis');
    }
};
