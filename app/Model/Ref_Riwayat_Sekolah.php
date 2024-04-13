<?php

namespace App\Model;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Ref_Riwayat_Sekolah extends Model
{
    use SoftDeletes;
    protected $table = 'ref_riwayat_sekolah';

    protected $fillable = [
        'kader_id',
        'jenjang_sekolah',
        'nama_sekolah',
        'tahun_lulus'
    ];

}
