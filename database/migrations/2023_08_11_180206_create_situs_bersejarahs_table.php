<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSitusBersejarahsTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('situs_bersejarahs', function (Blueprint $table) {
            $table->id('id_situs');
            // $table->foreignId('user_id')->constrained('users');
            $table->integer('user_id');
            $table->string('gambar_situs', 255);
            $table->string('nama_situs', 255);
            $table->string('alamat_situs', 255);
            $table->date('tanggal_berdiri_situs');
            $table->string('pemilik_situs', 255);
            $table->string('jenis_situs', 255);
            $table->string('status_situs', 255);
            $table->text('keterangan_situs')->default('');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Schema::dropIfExists('situs_bersejarahs');
        Schema::table('situs_bersejarahs', function (Blueprint $table) {
            $table->dropForeign(['user_id']);
            $table->dropColumn('user_id');
        });
    }
}
