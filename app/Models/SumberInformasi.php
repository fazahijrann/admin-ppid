<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SumberInformasi extends Model
{
    use HasFactory;

    protected $table = 'sumber_informasi';
    protected $primaryKey = 'id';
    public $timestamps = false;

    protected $fillable = [
        'jenis_sumber',
    ];

    public function keputusanInformasi()
    {
        // Relasi hasMany jika satu sumber informasi dimiliki oleh banyak keputusan informasi
        return $this->hasMany(KeputusanInformasi::class, 'sumber_informasi_id', 'id');
    }
}
