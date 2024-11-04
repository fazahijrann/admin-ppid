<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KategoriMemperoleh extends Model
{
    use HasFactory;

    protected $table = 'kategori_memperoleh';

    protected $fillable = [
        'jenis_memperoleh', // Pastikan field ini sesuai dengan kolom yang ada di tabel
    ];

    // Relasi ke tabel permohonan_informasi
    public function permohonanInformasi()
    {
        return $this->hasMany(PermohonanInformasi::class, 'id_kategori_memperoleh');
    }
}
