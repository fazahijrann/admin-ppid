<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TanggapanKeberatan extends Model
{
    use HasFactory;

    protected $table = 'tanggapan_keberatan'; // Nama tabel
    protected $primaryKey = 'id'; // Primary key
    public $timestamps = false; // Tidak menggunakan kolom timestamps (created_at, updated_at)

    protected $fillable = [
        'keberatan_informasi_id',
        'keterangan',
        'keputusan_atasan',
        'jangka_waktu',
        'tgl_tanggapan',
        'id_pejabat'
    ];

    /**
     * Relasi ke model KeberatanInformasi (one-to-one atau many-to-one)
     */
    public function keberatanInformasi()
    {
        return $this->belongsTo(KeberatanInformasi::class, 'keberatan_informasi_id');
    }

    public function pejabatPenerima()
    {
        return $this->belongsTo(User::class, 'id_pejabat');
    }
}
