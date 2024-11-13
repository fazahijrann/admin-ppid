<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TandaBuktiPenerimaan extends Model
{
    use HasFactory;

    protected $table = 'tanda_buktipenerimaan';
    public $timestamps = false;

    protected $fillable = [
        'permohonan_id',
        'waktu',
        'tgl_penerimaan',
        'status',
    ];

    public function permohonanInformasi()
    {
        return $this->belongsTo(PermohonanInformasi::class, 'permohonan_id');
    }

    public function tandaKeputusan()
    {
        return $this->hasOne(KeputusanInformasi::class, 'tanda_buktipenerimaan_id');
    }

    //     public function keputusanInformasi()
    //     {
    //         return $this->hasOne(KeputusanInformasi::class, 'pemohon_id');
    //     }
}
