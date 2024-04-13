<?php

namespace App\Model;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Dokumen extends Model
{
    use SoftDeletes;
    protected $table = 'dokumen';

    protected $fillable = [
        'nama_dokumen',
        'dokumen',
        'is_active'
    ];

}
