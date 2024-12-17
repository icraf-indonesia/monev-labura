<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MonevIndikator extends Model
{
    use HasFactory;

    protected $fillable = [
        'indikator',
        'id_komponen',
        'id_instansi',
        'target',
        'satuan',
        'tahun',
        'capaian',
        'dokumen_pendukung',
        'keterangan',
    ];
}
