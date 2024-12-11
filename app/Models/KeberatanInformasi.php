<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Pemohon;
use App\Models\KategoriKeberatan;

class KeberatanInformasi extends Model
{
    protected $table = 'keberatan_informasi';

    // Field yang boleh diisi
    protected $fillable = [
        'no_keberatan_informasi',
        'id_pemohon',
        'keputusan_informasi_id',
        'kategori_keberatan_id',
        'status',
        'id_penerima',
        'keterangan',
        'tgl_keberatan',
    ];

    // Relasi dengan tabel pemohon
    public function pemohon()
    {
        return $this->belongsTo(Pemohon::class, 'id_pemohon');
    }

    // Relasi dengan tabel keberatan_informasi
    public function keberatanInformasi()
    {
        return $this->belongsTo(KategoriKeberatan::class, 'kategori_keberatan_id');
    }

    public function tanggapanKeberatan()
    {
        return $this->hasOne(TanggapanKeberatan::class, 'id', 'keberatan_informasi_id');
    }

    public function keputusanInformasi()
    {
        return $this->belongsTo(KeputusanInformasi::class, 'keputusan_informasi_id');
    }

    public function penerimaKeberatan()
    {
        return $this->belongsTo(User::class, 'id_penerima');
    }
}
