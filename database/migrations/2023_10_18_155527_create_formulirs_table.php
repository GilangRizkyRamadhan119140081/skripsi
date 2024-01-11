<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    // public function up(): void
    // {
    //     Schema::create('formulirs', function (Blueprint $table) {
    //         $table->id();
    //         $table->string('nama');
    //         $table->string('instansi');
    //         $table->string('email')->unique();
    //         $table->text('alamat');
    //         $table->string('nomor_hp');
    //         $table->string('jenis_keperluan');
    //         $table->text('keterangan');
    //         $table->string('surat_perizinan');
    //         $table->string('gambar');
    //         $table->string('status')->nullable();
    //         $table->string('download')->nullable();
    //         $table->timestamps();
    //     });
    // }
    public function up(): void
    {
        Schema::create('formulirs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained(); // Menambahkan foreign key untuk mengaitkan dengan tabel users
            $table->string('nama');
            $table->string('instansi');
            $table->string('email');
            $table->text('alamat');
            $table->string('nomor_hp');
            $table->string('jenis_keperluan');
            $table->text('keterangan');
            $table->string('surat_perizinan');
            $table->string('gambar');
            $table->string('status')->nullable();
            $table->string('download')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('formulirs');
    }
};
