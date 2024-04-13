<?php

namespace App\Model;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

// Model
use App\Model\Ref_Riwayat_Sekolah;
use App\Model\Ref_Pendidikan_Terakhir;
use App\Model\Ref_Pengalaman_Organisasi_IMM;
use App\Model\Ref_Pengalaman_Organisasi_Lainnya;
use App\Model\Ref_Perkaderan;
use App\Model\Ref_Pimpinan;

class Kader extends Model
{
    use SoftDeletes;
    protected $table = 'kader';

    protected $fillable = [
        'nama_lengkap',
        'no_hp',
        'email',
        'sosial_media',
        'jenis_kelamin',
        'agama',
        'kebangsaan',
        'status_menikah',
        'tanggal_lahir',
        'tempat_lahir',
        'domisili',
        'foto',
        'pc',
        'komisariat',
        'universitas',
        'fakultas',
        'prodi'
    ];

    public function ref_perkaderan()
    {
        return $this->hasMany(Ref_Perkaderan::class, 'kader_id', 'id');
    }

    public function ref_pimpinan()
    {
        return $this->hasMany(Ref_Pimpinan::class, 'kader_id', 'id');
    }
}
