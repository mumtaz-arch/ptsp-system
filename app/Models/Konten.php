<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Konten extends Model
{
    protected $table = 'konten';

    protected $fillable = [
        'judul',
        'slug',
        'isi',
        'gambar',
        'tipe',
    ];

    protected static function booted(): void
    {
        static::creating(function (Konten $konten) {
            if (empty($konten->slug)) {
                $konten->slug = Str::slug($konten->judul);
            }
        });
    }
}
