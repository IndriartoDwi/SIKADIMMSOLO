<?php

namespace App\Model;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Prodi extends Model
{
    use SoftDeletes;
    protected $table = 'prodi';

    protected $fillable = [
        'prodi',
    ];

}
