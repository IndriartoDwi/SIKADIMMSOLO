<?php

namespace App\Model;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Ref_Pengalaman_Organisasi_Lainnya extends Model
{
    use SoftDeletes;
    protected $table = 'ref_pengalaman_organisasi_lainnya';

    protected $fillable = [
        'kader_id',
        'tempat',
        'posisi_jabatan_lainnya',
        'mulai_organisasi',
        'selesai_organisasi'
    ];

}
