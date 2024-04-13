<?php

namespace App\Model;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Komisariat extends Model
{
    use SoftDeletes;
    protected $table = 'komisariat';

    protected $fillable = [
        'komisariat',
    ];

}
