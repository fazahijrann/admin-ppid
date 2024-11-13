<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Penerima extends Authenticatable
{
    use HasFactory;

    protected $table = 'penerima';

    protected $primarykey = 'id';

    public $timestamps = true;

    protected $fillable = [
        'nama',
        'jabatan',
        'email',
        'password',
    ];

    protected $hidden = [
        'password',
    ];

    public function permohonanInformasi()
    {
        return $this->hasMany(PermohonanInformasi::class, 'id_penerima');
    }
}
