<?php

namespace App\Model;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Fakultas extends Model
{
    use SoftDeletes;
    protected $table = 'fakultas';

    protected $fillable = [
        'fakultas',
    ];

}
