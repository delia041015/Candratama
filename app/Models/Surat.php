<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Surat extends Model
{
    use HasFactory;

    protected $fillable = [
        'nomer_surat',
        'divisi_dari',
        'divisi_tujuan',
        'dasar_pengajuan',
        'no_pengajuan',
        'item_diajukan',
        'jumlah',
        'harga',
        'total',
        'status',
    ];
}
