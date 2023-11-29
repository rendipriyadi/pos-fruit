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
        Schema::create('item_buah', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('kategori_buah_id')->unsigned();
            $table->string('nama'); // required
            $table->string('unit'); // required
            $table->string('harga'); // required
            $table->string('foto'); // required
            $table->timestamps(); // created_at, updated_at
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('item_buah');
    }
};
