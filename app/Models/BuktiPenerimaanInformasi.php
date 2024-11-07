<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BuktiPenerimaanInformasi extends Model
{
    use HasFactory;

    protected $table = 'bukti_penerimaaninformasi';

    protected $fillable = [
        'keputusan_informasi_id',
        'waktu',
        'tgl_penerimaan',
    ];

    public function keputusanInformasi()
    {
        return $this->belongsTo(KeputusanInformasi::class, 'keputusan_informasi_id');
    }
}
