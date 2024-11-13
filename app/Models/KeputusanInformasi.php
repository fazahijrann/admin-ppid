<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class KeputusanInformasi extends Model
{
    protected $table = 'keputusan_informasi';
    public $timestamps = false;

    protected $fillable = [
        'id',
        'tanda_buktipenerimaan_id',
        'sumber_informasi_id',
        'biaya_informasi_id',
        'jenis_informasi_id',
        'tgl_keputusan',
        'keterangan',
        'status',
        'updated_at'
    ];

    // public function permohonanInformasi()
    // {
    //     return $this->hasOne(PermohonanInformasi::class, 'pernyataan', 'id');
    // }

    public function tandaBukti()
    {
        return $this->hasOne(TandaBuktiPenerimaan::class, 'tanda_buktipenerimaan_id');
    }
}
