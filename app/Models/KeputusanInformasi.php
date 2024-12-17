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
        'id_pejabat',
        'status',
        'updated_at'
    ];

    public function tandaBukti()
    {
        return $this->hasOne(TandaBuktiPenerimaan::class, 'id', 'tanda_buktipenerimaan_id');
    }

    public function sumberInformasi()
    {
        return $this->belongsTo(SumberInformasi::class, 'sumber_informasi_id', 'id');
    }

    public function biayaInformasi()
    {
        return $this->belongsTo(BiayaInformasi::class, 'biaya_informasi_id', 'id');
    }

    public function jenisInformasi()
    {
        return $this->belongsTo(JenisInformasi::class, 'jenis_informasi_id', 'id');
    }

    public function buktiPenerimaan()
    {
        return $this->hasOne(BuktiPenerimaanInformasi::class, 'keputusan_informasi_id');
    }

    public function pejabatPenerima()
    {
        return $this->belongsTo(User::class, 'id_pejabat');
    }
}
