<?php

namespace App\Model;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Ref_Pendidikan_Terakhir extends Model
{
    use SoftDeletes;
    protected $table = 'ref_pendidikan_terakhir';

    protected $fillable = [
        'kader_id',
        'pendidikan_terakhir',
        'status_pendidikan_terakhir'
    ];

}
