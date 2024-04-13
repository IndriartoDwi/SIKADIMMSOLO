<?php

namespace App\Model;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Kampus extends Model
{
    use SoftDeletes;
    protected $table = 'kampus';

    protected $fillable = [
        'kampus',
    ];

}
