<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

// Model
use App\Model\Kader;

class DashboardController extends Controller
{
    public function index()
    {
        $perguruanTinggi = Kader::groupBy('universitas')->count();
        $fakultas = Kader::groupBy('fakultas')->count();
        $prodi = Kader::groupBy('prodi')->count();
        $kader = Kader::count();

        $chartKampus = Kader::select('universitas', DB::raw('count(*) as total'))
                    ->where('user_id', Auth::user()->id)
                    ->groupBy('universitas')
                    ->get()
                    ->transform(function ($item) {
                        $item->universitas = strtoupper($item->universitas);
                        $item->total = (int) $item->total;
                        return $item;
                    });


        $chartFakultas = Kader::select('fakultas', DB::raw('count(*) as total'))
        ->where('user_id', Auth::user()->id)
                ->groupBy('fakultas')
                ->get()->each(function ($items) {
                    $items->fakultas = strtoupper($items->fakultas);
                    $items->total = (int) $items->total;
                });

        $chartProdi = Kader::select('prodi', DB::raw('count(*) as total'))
        ->where('user_id', Auth::user()->id)
                ->groupBy('prodi')
                ->get()->each(function ($items) {
                    $items->prodi = strtoupper($items->prodi);
                    $items->total = (int) $items->total;
                });

        $chartKomisariat = Kader::select('komisariat', DB::raw('count(*) as total'))
        ->where('user_id', Auth::user()->id)
                ->groupBy('komisariat')
                ->get()->each(function ($items) {
                    $items->komisariat = strtoupper($items->komisariat);
                    $items->total = (int) $items->total;
                });

        $chartImmawan = Kader::select('jenis_kelamin', DB::raw('count(*) as total'))
        ->where('user_id', Auth::user()->id)
                ->groupBy('jenis_kelamin')
                ->get()
                ->map(function ($item) {
                    // Convert jenis_kelamin to uppercase
                    $item->jenis_kelamin = strtoupper($item->jenis_kelamin);

                    // Determine the label based on jenis_kelamin
                    if ($item->jenis_kelamin === 'PRIA') {
                        $item->label = 'IMMAWAN';
                    } elseif ($item->jenis_kelamin === 'WANITA') {
                        $item->label = 'IMMAWATI';
                    }

                    // Convert total to integer
                    $item->total = (int) $item->total;

                    // Unset jenis_kelamin as it's not needed anymore
                    unset($item->jenis_kelamin);

                    return $item;
                });


        $chartPerkaderanUtama = Kader::select('id')
                ->with(['ref_perkaderan' => function ($query) {
                    $query->select('kader_id', 'kegiatan_perkaderan');
                }])
                ->where('user_id', Auth::user()->id)
                ->get()
                ->pluck('ref_perkaderan')
                ->flatten()
                ->groupBy('kegiatan_perkaderan')
                ->map(function ($items, $kegiatan_perkaderan) {
                    return [
                        'kegiatan_perkaderan' => strtoupper($kegiatan_perkaderan),
                        'total' => $items->count(),
                    ];
                })
                ->values();

        $chartPerkaderanKhusus = Kader::select('id')
                ->with(['ref_pimpinan' => function ($query) {
                    $query->select('kader_id', 'kegiatan_pimpinan');
                }])
                ->where('user_id', Auth::user()->id)
                ->get()
                ->pluck('ref_pimpinan')
                ->flatten()
                ->groupBy('kegiatan_pimpinan')
                ->map(function ($items, $kegiatan_pimpinan) {
                    return [
                        'kegiatan_pimpinan' => strtoupper($kegiatan_pimpinan),
                        'total' => $items->count(),
                    ];
                })
                ->values();

        return view('contents.dashboard.home', [
            'title' => 'Beranda',
            'perguruanTinggi' => $perguruanTinggi,
            'fakultas' => $fakultas,
            'prodi' => $prodi,
            'kader' => $kader,
            'chartKampus' => $chartKampus,
            'chartFakultas' => $chartFakultas,
            'chartProdi' => $chartProdi,
            'chartKomisariat' => $chartKomisariat,
            'chartImmawan' => $chartImmawan,
            'chartPerkaderanUtama' => $chartPerkaderanUtama,
            'chartPerkaderanKhusus' => $chartPerkaderanKhusus,
        ]);
    }
}
