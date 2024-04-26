<?php

namespace App\Model;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

// Model
use App\Model\Kampus;

class Fakultas extends Model
{
    use SoftDeletes;
    protected $table = 'fakultas';

    protected $fillable = [
        'kampus_id',
        'fakultas',
    ];

    public function kampus()
    {
        return $this->hasMany(Kampus::class, 'id', 'kampus_id');
    }
}
