<?php

namespace App\Model;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Cabang extends Model
{
    use SoftDeletes;
    protected $table = 'cabang';

    protected $fillable = [
        'cabang',
    ];

}
