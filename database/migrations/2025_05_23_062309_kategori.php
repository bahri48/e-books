<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('kategori', function(Blueprint $table){
            $table->id('id_kategori');
            $table->string('nama_kategori',50);
            $table->timestamps();
        });
    }
    public function down()
    {
        Schema::dropIfExists('kategori');
    }
};
