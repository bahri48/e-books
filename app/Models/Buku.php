<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Buku extends Model
{
    use HasFactory;
    protected $table='buku';
    protected $primaryKey = 'id_buku';
    protected $fillable = [
        'id_kategori',
        'judul',
        'penulis',
        'abstrak',
        'tahun_terbit',
        'jumlah_halaman',
        'cover'
    ];
    public function JoinToKategori(){
        return $this->hasOne(Kategori::class,'id_kategori','id_kategori');
    }
}
