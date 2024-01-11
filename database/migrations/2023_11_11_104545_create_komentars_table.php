<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('komentars', function (Blueprint $table) {
            $table->id();
            $table->integer('situs_id');
            $table->integer('user_id');
            $table->text('message');
            $table->string('nama');
            $table->timestamps();
        });
    }
};
