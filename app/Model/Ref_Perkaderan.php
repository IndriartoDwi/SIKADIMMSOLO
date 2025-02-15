<?php

namespace App\Model;

// use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Ref_Perkaderan extends Model
{
    // use SoftDeletes;
    protected $table = 'ref_perkaderan';

    protected $fillable = [
        'kader_id',
        'kegiatan_perkaderan',
        'tahun_perkaderan'
    ];

}
