<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('buku', function(Blueprint $table){
            $table->id('id_buku');
            $table->foreignId('id_kategori');
            $table->string('judul',75);
            $table->string('penulis',100);
            $table->longText('abstrak');
            $table->date('tahun_terbit');
            $table->char('jumlah_halaman',5);
            $table->string('cover',100);
            $table->timestamps();
            $table->foreign('id_kategori')
            ->references('id_kategori')
            ->on('kategori')
            ->cascadeOnUpdate()
            ->cascadeOnDelete();
        });
    }
    public function down()
    {
        Schema::dropIfExists('buku');
    }
};
