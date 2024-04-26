<?php

namespace App\Model;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

// Model
use App\Model\Kampus;
use App\Model\Fakultas;

class Prodi extends Model
{
    use SoftDeletes;
    protected $table = 'prodi';

    protected $fillable = [
        'kampus_id',
        'fakultas_id',
        'prodi',
    ];

    public function kampus()
    {
        return $this->hasMany(Kampus::class, 'id', 'kampus_id');
    }

    public function fakultas()
    {
        return $this->hasMany(Fakultas::class, 'id', 'fakultas_id');
    }
}
