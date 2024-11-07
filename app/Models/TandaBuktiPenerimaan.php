<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TandaBuktiPenerimaan extends Model
{
    use HasFactory;

    protected $table = 'tanda_buktipenerimaan';

    protected $fillable = [
        'pemohon_id',
        'waktu',
        'tgl_penerimaan',
        'status',
    ];

    public function pemohon()
    {
        return $this->belongsTo(Pemohon::class, 'pemohon_id');
    }
}
