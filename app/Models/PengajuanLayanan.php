<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PengajuanLayanan extends Model
{
    protected $table = 'pengajuan_layanan';

    protected $fillable = [
        'nama',
        'email',
        'no_hp',
        'layanan_id',
        'deskripsi',
        'file',
        'status',
        'catatan_admin',
    ];

    public function layanan(): BelongsTo
    {
        return $this->belongsTo(Layanan::class, 'layanan_id');
    }
}
