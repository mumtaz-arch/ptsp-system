<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Layanan extends Model
{
    protected $table = 'layanan';

    protected $fillable = [
        'nama_layanan',
        'deskripsi',
    ];

    public function pengajuan(): HasMany
    {
        return $this->hasMany(PengajuanLayanan::class, 'layanan_id');
    }
}
