<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KategoriSalinan extends Model
{
    use HasFactory;

    protected $table = 'kategori_salinan';

    protected $fillable = [
        'jenis_salinan', // Pastikan field ini sesuai dengan kolom yang ada di tabel
    ];

    // Relasi ke tabel permohonan_informasi
    public function permohonanInformasi()
    {
        return $this->hasMany(PermohonanInformasi::class, 'id_kategori_salinan');
    }

    public function keberatanInformasi()
    {
        return $this->hasMany(KeberatanInformasi::class, 'kategori_keberatan_id');
    }
}
