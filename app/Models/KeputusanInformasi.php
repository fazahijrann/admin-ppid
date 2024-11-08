<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class KeputusanInformasi extends Model
{
    protected $table = 'keputusan_informasi';

    protected $fillable = [
        'id', // foreign key related to permohonan_informasi
        'tanda_penerimaan_id',
        'sumber_informasi_id',
        'biaya_informasi_id',
        'jenis_informasi_id',
        'tgl_keputusan',
        'keterangan',
        'status',
    ];

    public function permohonanInformasi()
    {
        return $this->hasOne(PermohonanInformasi::class, 'pernyataan', 'id');
    }
}
