<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BiayaInformasi extends Model
{
    use HasFactory;

    protected $table = 'biaya_informasi';
    protected $primaryKey = 'id';
    public $timestamps = false;

    protected $fillable = [
        'nama',
        'biaya',
    ];

    public function keputusanInformasi()
    {
        // Relasi hasMany jika satu biaya informasi dimiliki oleh banyak keputusan informasi
        return $this->hasMany(KeputusanInformasi::class, 'biaya_informasi_id', 'id');
    }
}
