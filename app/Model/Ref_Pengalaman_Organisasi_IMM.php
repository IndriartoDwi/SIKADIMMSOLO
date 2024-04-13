<?php

namespace App\Model;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Ref_Pengalaman_Organisasi_IMM extends Model
{
    use SoftDeletes;
    protected $table = 'ref_pengalaman_organisasi_imm';

    protected $fillable = [
        'kader_id',
        'posisi_jabatan',
        'mulai_organisasi',
        'selesai_organisasi'
    ];

}
