<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail; // Jika diperlukan untuk verifikasi email
use Illuminate\Support\Facades\Hash;

class Pemohon extends Authenticatable
{
    use Notifiable;

    protected $table = 'pemohon'; // Nama tabel

    // Kolom yang dapat diisi
    protected $fillable = [
        'no_pendaftaran',
        'nama',
        'nik',
        'alamat',
        'no_tlp',
        'email',
        'pekerjaan',
        'file_ktp',
        'password',
        'id_kategori', // Tambahkan id_kategori

        // Kolom tambahan untuk Badan Hukum
        'nama_kuasa',
        'alamat_kuasa',
        'no_tlp_kuasa',
        'sk_badanhukum',
    ];

    // Kolom yang tidak ditampilkan secara langsung
    protected $hidden = [
        'password',
        'remember_token',
    ];

    // Relasi dengan tabel kategori_pemohon
    public function kategoriPemohon()
    {
        return $this->belongsTo(KategoriPemohon::class, 'id_kategori');
    }

    // Pastikan password di-hash secara otomatis
    public function setPasswordAttribute($value)
    {
        // Hanya hash password jika belum di-hash
        $this->attributes['password'] = Hash::needsRehash($value) ? Hash::make($value) : $value;
    }

    // Mengambil password untuk autentikasi
    public function getAuthPassword()
    {
        return $this->password;
    }

    // Jika kamu perlu menggabungkan nama depan dan nama belakang, misalnya:
    public function getFullName()
    {
        return $this->nama; // Bisa disesuaikan jika ada logika penggabungan nama
    }
}
