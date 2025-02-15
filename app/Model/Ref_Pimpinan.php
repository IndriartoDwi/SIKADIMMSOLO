<?php

namespace App\Model;

// use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Ref_Pimpinan extends Model
{
    // use SoftDeletes;
    protected $table = 'ref_pimpinan';

    protected $fillable = [
        'kader_id',
        'kegiatan_pimpinan',
        'tahun_pimpinan'
    ];

}
