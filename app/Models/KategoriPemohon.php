<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class KategoriPemohon extends Model
{
    protected $table = 'kategori_pemohon'; // Nama tabel di database

    protected $fillable = [
        'nama_kategori', // Pastikan field ini sesuai dengan kolom yang ada di tabel
    ];

    // Relasi dengan tabel pemohon
    public function pemohon()
    {
        return $this->hasMany(Pemohon::class, 'id_kategori');
    }
}
