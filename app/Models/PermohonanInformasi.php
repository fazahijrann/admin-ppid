<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PermohonanInformasi extends Model
{
    use HasFactory;

    protected $table = 'permohonan_informasi';

    protected $fillable = [
        'no_permohonan_informasi',
        'id_pemohon',
        'rincian_informasi',
        'tujuan_informasi',
        'id_kategori_memperoleh',
        'id_kategori_salinan',
        'tgl_permohonan',
        'id_penerima',
        'pernyataan',

    ];

    // Relasi dengan tabel kategori_memperoleh
    public function pemohon()
    {
        return $this->belongsTo(Pemohon::class, 'id_pemohon');
    }

    // Relasi dengan tabel kategori_memperoleh
    public function kategoriMemperoleh()
    {
        return $this->belongsTo(KategoriMemperoleh::class, 'id_kategori_memperoleh');
    }

    // Relasi dengan tabel kategori_salinan
    public function kategoriSalinan()
    {
        return $this->belongsTo(KategoriSalinan::class, 'id_kategori_salinan');
    }

    public function keputusanInformasi()
    {
        return $this->hasOne(KeputusanInformasi::class);
    }

    public function tandaBuktiPenerimaan()
    {
        return $this->hasOne(TandaBuktiPenerimaan::class, 'permohonan_id');
    }

    public function penerimaInformasi()
    {
        return $this->belongsTo(User::class, 'id_penerima');
    }
}
