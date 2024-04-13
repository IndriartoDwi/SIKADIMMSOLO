<?php

namespace App\Model;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

// Model
use App\User;

class Timeline extends Model
{
    use SoftDeletes;
    protected $table = 'timeline';

    protected $fillable = [
        'nama_agenda',
        'tanggal_mulai',
        'tanggal_selesai',
        'dokumen',
        'is_verif',
        'user_id'
    ];

    public function koms()
    {
        return $this->HasOne(User::class, 'id', 'user_id');
    }
}
