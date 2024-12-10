<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JenisInformasi extends Model
{
    use HasFactory;

    protected $table = 'jenis_informasi';
    protected $primaryKey = 'id';
    public $timestamps = false;

    protected $fillable = [
        'jenis_informasi',
    ];

    public function keputusanInformasi()
    {
        // Relasi hasMany jika satu jenis informasi dimiliki oleh banyak keputusan informasi
        return $this->hasMany(KeputusanInformasi::class, 'jenis_informasi_id', 'id');
    }

    public static $jenisinf = [
        'Softcopy (termasuk rekaman)',
        'Hardcopy (salinan tertulis)',
    ];
}
