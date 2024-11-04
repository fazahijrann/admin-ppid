<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Berita extends Model
{
    use HasFactory;

    protected $fillable = [
        'thumbnail',
        'judul',
        'category',
        'isi'
    ];

    protected static function boot()
    {
        parent::boot();

        // Mengisi slug secara otomatis dari judul sebelum menyimpan data
        static::creating(function ($berita) {
            $berita->slug = Str::slug($berita->judul);
        });
    }
}
