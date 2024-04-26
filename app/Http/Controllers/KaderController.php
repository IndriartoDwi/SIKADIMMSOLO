<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Yajra\DataTables\Facades\DataTables;
use File;

// Model
use App\Model\Kader;
use App\Model\Cabang;
use App\Model\Kampus;
use App\Model\Komisariat;
use App\Model\Fakultas;
use App\Model\Prodi;

use App\Model\Ref_Riwayat_Sekolah;
use App\Model\Ref_Pendidikan_Terakhir;
use App\Model\Ref_Pengalaman_Organisasi_IMM;
use App\Model\Ref_Pengalaman_Organisasi_Lainnya;
use App\Model\Ref_Perkaderan;
use App\Model\Ref_Pimpinan;

class KaderController extends Controller
{
    public function index(Request $request)
    {

        $cabang = Cabang::
            where('deleted_at', null)
            ->get();

        $kampus = Kampus::
            where('deleted_at', null)
            ->get();

        $komisariat = Komisariat::
            where('deleted_at', null)
            ->get();

        $fakultas = Fakultas::
            where('deleted_at', null)
            ->get();


        $prodi = Prodi::
            where('deleted_at', null)
            ->get();

        return view('contents.kader.list', [
            'title' => 'Kader',
            'cabang' => $cabang,
            'kampus' => $kampus,
            'fakultas' => $fakultas,
            'prodi' => $prodi,
            'komisariat' => $komisariat,
        ]);
    }

    public function data(Request $request)
    {
        $role_id = session('role_id');

        if ($role_id === 2) {
            $list = Kader::with('ref_pimpinan', 'ref_perkaderan')->get();
        } else {
            $list = Kader::where('user_id', Auth::user()->id)->with('ref_pimpinan', 'ref_perkaderan')->get();
        }

        return DataTables::of($list)
            ->addIndexColumn()
            ->make(true);
    }

    public function store(Request $request)
    {
        $id = $request->input('id');
        if ($id) {
            $request->validate([
                // 'nama_lengkap' => 'required',
                // 'no_hp' => 'required',
                // 'email' => 'required',
                // 'sosial_media' => 'required',
                // 'jenis_kelamin' => 'required',
                // 'agama' => 'required',
                // 'kebangsaan' => 'required',
                // 'status_menikah' => 'required',
                // 'tanggal_lahir' => 'required',
                // 'tempat_lahir' => 'required',
                // 'pc' => 'required',
                // 'komisariat' => 'required',
                // 'universitas' => 'required',
                // 'fakultas' => 'required',
                // 'prodi' => 'required',
                // 'domisili' => 'required',
                // 'foto' => 'image|mimes:jpeg,png,jpg|max:5240',
            ], [
                // 'nama_kader.required' => '<strong style="color: red;">Nama Lengkap wajib diisi.</strong>',
                // 'no_hp.required' => '<strong style="color: red;">No Hp wajib diisi.</strong>',
                // 'email.required' => '<strong style="color: red;">Email wajib diisi.</strong>',
                // 'sosial_media.required' => '<strong style="color: red;">Sosial Media wajib diisi.</strong>',
                // 'jenis_kelamin.required' => '<strong style="color: red;">Jenis Kelamin wajib diisi.</strong>',
                // 'agama.required' => '<strong style="color: red;">Agama wajib diisi.</strong>',
                // 'kebangsaan.required' => '<strong style="color: red;">Kebangsaan wajib diisi.</strong>',
                // 'status_menikah.required' => '<strong style="color: red;"Status wajib diisi.</strong>',
                // 'tanggal_lahir.required' => '<strong style="color: red;">Tanggal Lahir wajib diisi.</strong>',
                // 'tempat_lahir.required' => '<strong style="color: red;">Tempat Lahir wajib diisi.</strong>',
                // 'domisili.required' => '<strong style="color: red;">Domisili wajib diisi.</strong>',
                // 'pc.required' => '<strong style="color: red;">Pimpinan Cabang wajib diisi.</strong>',
                // 'komisariat.required' => '<strong style="color: red;">Komisariat wajib diisi.</strong>',
                // 'universitas.required' => '<strong style="color: red;">Universitas wajib diisi.</strong>',
                // 'fakultas.required' => '<strong style="color: red;">Fakultas wajib diisi.</strong>',
                // 'prodi.required' => '<strong style="color: red;">Program Studi wajib diisi.</strong>',
                // 'foto.image' => '<strong style="color: red;">File yang diunggah harus berupa JPG/PNG.</strong>',
                // 'foto.mimes' => '<strong style="color: red;">Format file harus JPG/PNG.</strong>',
                // 'foto.max' => '<strong style="color: red;">Maksimal ukuran file JPG/PNG adalah 5 MB.</strong>',
            ]);
            $data = Kader::find($id);
        } else {
            $request->validate([
                'nama_lengkap' => 'required',
                'no_hp' => 'required',
                'email' => 'required',
                'sosial_media' => 'required',
                'jenis_kelamin' => 'required',
                'agama' => 'required',
                'kebangsaan' => 'required',
                'status_menikah' => 'required',
                'tanggal_lahir' => 'required',
                'tempat_lahir' => 'required',
                'pc' => 'required',
                'komisariat' => 'required',
                'universitas' => 'required',
                'fakultas' => 'required',
                'prodi' => 'required',
                'domisili' => 'required',
                'foto' => 'image|mimes:jpeg,png,jpg|max:5240',
            ], [
                'nama_kader.required' => '<strong style="color: red;">Nama Lengkap wajib diisi.</strong>',
                'no_hp.required' => '<strong style="color: red;">No Hp wajib diisi.</strong>',
                'email.required' => '<strong style="color: red;">Email wajib diisi.</strong>',
                'sosial_media.required' => '<strong style="color: red;">Sosial Media wajib diisi.</strong>',
                'jenis_kelamin.required' => '<strong style="color: red;">Jenis Kelamin wajib diisi.</strong>',
                'agama.required' => '<strong style="color: red;">Agama wajib diisi.</strong>',
                'kebangsaan.required' => '<strong style="color: red;">Kebangsaan wajib diisi.</strong>',
                'status_menikah.required' => '<strong style="color: red;"Status wajib diisi.</strong>',
                'tanggal_lahir.required' => '<strong style="color: red;">Tanggal Lahir wajib diisi.</strong>',
                'tempat_lahir.required' => '<strong style="color: red;">Tempat Lahir wajib diisi.</strong>',
                'pc.required' => '<strong style="color: red;">Pimpinan Cabang wajib diisi.</strong>',
                'komisariat.required' => '<strong style="color: red;">Komisariat wajib diisi.</strong>',
                'universitas.required' => '<strong style="color: red;">Universitas wajib diisi.</strong>',
                'fakultas.required' => '<strong style="color: red;">Fakultas wajib diisi.</strong>',
                'prodi.required' => '<strong style="color: red;">Program Studi wajib diisi.</strong>',
                'domisili.required' => '<strong style="color: red;">Domisili wajib diisi.</strong>',
                'foto.image' => '<strong style="color: red;">File yang diunggah harus berupa JPG/PNG.</strong>',
                'foto.mimes' => '<strong style="color: red;">Format file harus JPG/PNG.</strong>',
                'foto.max' => '<strong style="color: red;">Maksimal ukuran file JPG/PNG adalah 5 MB.</strong>',
            ]);
        }

        try {
            if ($request->hasFile('foto')) {
                $file = $request->file('foto');
                $name = time() . '_' . $file->getClientOriginalName();
                $path = storage_path() . '/app/public/foto/';
                if (!File::isDirectory($path)) {
                    File::makeDirectory($path, 0775, true, true);
                }
                if ($file->move($path, $name)) {
                    $foto = $name;
                }

                if (!empty($data->foto)) {
                    if (File::exists(public_path($data->foto))) {
                        File::delete(public_path($data->foto));
                    }
                }
                $fotoName = '/foto/' . $foto;
            }

            $data = [
                'nama_lengkap' => $request->input('nama_lengkap'),
                'no_hp' => $request->input('no_hp'),
                'email' => $request->input('email'),
                'sosial_media' => $request->input('sosial_media'),
                'jenis_kelamin' => $request->input('jenis_kelamin'),
                'agama' => $request->input('agama'),
                'kebangsaan' => $request->input('kebangsaan'),
                'status_menikah' => $request->input('status_menikah'),
                'tanggal_lahir' => $request->input('tanggal_lahir'),
                'tempat_lahir' => $request->input('tempat_lahir'),
                'pc' => $request->input('pc'),
                'komisariat' => $request->input('komisariat'),
                'universitas' => $request->input('universitas'),
                'fakultas' =>$request->input('fakultas'),
                'prodi' => $request->input('prodi'),
                'domisili' => $request->input('domisili'),
                'updated_at' => date('Y-m-d H:i:s'),
                'user_id' => Auth::user()->id,
            ];

            if (!empty($fotoName)) {
                $data['foto'] = $fotoName;
            }

            if ($id) {
                Kader::where('id', $id)->update($data);
                $newId = $id;
            } else {
                $data['created_at'] = now();
                Kader::insert($data);
                $newId = Kader::latest()->first()->id;
            }

            $dataToInsert = [];
            $dataToInsert1 = [];
            $dataToInsert2 = [];
            $dataToInsert3 = [];
            $dataToInsert4 = [];
            $dataToInsert5 = [];

            foreach ($data as $key => $value) {
                $jenjang_sekolah = $request->input('jenjang_sekolah');
                $nama_sekolah = $request->input('nama_sekolah');
                $tahun_lulus = $request->input('tahun_lulus');

                for ($i = 0; $i < count($jenjang_sekolah); $i++) {
                    $dataToInsert[] = [
                        'kader_id' => $newId,
                        'jenjang_sekolah' => $jenjang_sekolah[$i],
                        'nama_sekolah' => $nama_sekolah[$i],
                        'tahun_lulus' => $tahun_lulus[$i],
                    ];
                }
            }

            foreach ($dataToInsert as $data) {
                if ($data['kader_id'] !== null) {
                    $updateOrCreateData['kader_id'] = $data['kader_id'];
                }

                if ($data['jenjang_sekolah'] !== null) {
                    $updateOrCreateData['jenjang_sekolah'] = $data['jenjang_sekolah'];
                }

                if ($data['nama_sekolah'] !== null) {
                    $updateOrCreateData['nama_sekolah'] = $data['nama_sekolah'];
                }

                if ($data['tahun_lulus'] !== null) {
                    $updateOrCreateData['tahun_lulus'] = $data['tahun_lulus'];
                }

                Ref_Riwayat_Sekolah::updateOrCreate(
                    $updateOrCreateData
                );
            }

            foreach ($data as $key => $value) {
                $pendidikan_terakhir = $request->input('pendidikan_terakhir');
                $status_pendidikan_terakhir = $request->input('status_pendidikan_terakhir');

                for ($i = 0; $i < count($pendidikan_terakhir); $i++) {
                    $dataToInsert1[] = [
                        'kader_id' => $newId,
                        'pendidikan_terakhir' => $pendidikan_terakhir[$i],
                        'status_pendidikan_terakhir' => $status_pendidikan_terakhir[$i],
                    ];
                }
            }

            foreach ($dataToInsert1 as $data) {
                if ($data['kader_id'] !== null) {
                    $updateOrCreateData1['kader_id'] = $data['kader_id'];
                }

                if ($data['pendidikan_terakhir'] !== null) {
                    $updateOrCreateData1['pendidikan_terakhir'] = $data['pendidikan_terakhir'];
                }

                if ($data['status_pendidikan_terakhir'] !== null) {
                    $updateOrCreateData1['status_pendidikan_terakhir'] = $data['status_pendidikan_terakhir'];
                }

                Ref_Pendidikan_Terakhir::updateOrCreate(
                    $updateOrCreateData1
                );
            }

            foreach ($data as $key => $value) {
                $posisi_jabatan = $request->input('posisi_jabatan');
                $mulai_organisasi = $request->input('mulai_organisasi');
                $selesai_organisasi = $request->input('selesai_organisasi');

                for ($i = 0; $i < count($posisi_jabatan); $i++) {
                    $dataToInsert2[] = [
                        'kader_id' => $newId,
                        'posisi_jabatan' => $posisi_jabatan[$i],
                        'mulai_organisasi' => $mulai_organisasi[$i],
                        'selesai_organisasi' => $selesai_organisasi[$i],
                    ];
                }

            }

            foreach ($dataToInsert2 as $data) {
                if ($data['kader_id'] !== null) {
                    $updateOrCreateData2['kader_id'] = $data['kader_id'];
                }

                if ($data['posisi_jabatan'] !== null) {
                    $updateOrCreateData2['posisi_jabatan'] = $data['posisi_jabatan'];
                }

                if ($data['mulai_organisasi'] !== null) {
                    $updateOrCreateData2['mulai_organisasi'] = $data['mulai_organisasi'];
                }

                if ($data['selesai_organisasi'] !== null) {
                    $updateOrCreateData2['selesai_organisasi'] = $data['selesai_organisasi'];
                }

                Ref_Pengalaman_Organisasi_IMM::updateOrCreate(
                    $updateOrCreateData2
                );
            }

            foreach ($data as $key => $value) {
                $tempat = $request->input('tempat');
                $posisi_jabatan_lainnya = $request->input('posisi_jabatan_lainnya');
                $mulai_organisasi = $request->input('mulai_organisasi');
                $selesai_organisasi = $request->input('selesai_organisasi');
                for ($i = 0; $i < count($tempat); $i++) {
                    $dataToInsert3[] = [
                        'kader_id' => $newId,
                        'tempat' => $tempat[$i],
                        'posisi_jabatan_lainnya' => $posisi_jabatan_lainnya[$i],
                        'mulai_organisasi' => $mulai_organisasi[$i],
                        'selesai_organisasi' => $selesai_organisasi[$i],
                    ];
                }
            }

            foreach ($dataToInsert3 as $data) {
                if ($data['tempat'] !== null) {
                    Ref_Pengalaman_Organisasi_Lainnya::updateOrCreate(
                        [
                            'kader_id' => $data['kader_id'],
                            'tempat' => $data['tempat']
                        ],
                        [
                            'kader_id' => $data['kader_id'],
                            'tempat' => $data['tempat'],
                            'posisi_jabatan_lainnya' => $data['posisi_jabatan_lainnya'],
                            'mulai_organisasi' => $data['mulai_organisasi'],
                            'selesai_organisasi' => $data['selesai_organisasi'],
                        ]
                    );
                }
            }


            foreach ($data as $key => $value) {
                $kegiatan_perkaderan = $request->input('kegiatan_perkaderan');
                $tahun_perkaderan = $request->input('tahun_perkaderan');
                for ($i = 0; $i < count($kegiatan_perkaderan); $i++) {
                    $dataToInsert4[] = [
                        'kader_id' => $newId,
                        'kegiatan_perkaderan' => $kegiatan_perkaderan[$i],
                        'tahun_perkaderan' => $tahun_perkaderan[$i],
                    ];
                }
            }

            foreach ($dataToInsert4 as $data) {
                if ($data['kegiatan_perkaderan'] !== null) {
                    Ref_Perkaderan::updateOrCreate(
                        [
                            'kader_id' => $data['kader_id'],
                            'kegiatan_perkaderan' => $data['kegiatan_perkaderan'],
                        ],
                        [
                            'kader_id' => $data['kader_id'],
                            'kegiatan_perkaderan' => $data['kegiatan_perkaderan'],
                            'tahun_perkaderan' => $data['tahun_perkaderan']
                        ]
                    );
                }
            }


            foreach ($data as $key => $value) {
                $kegiatan_pimpinan = $request->input('kegiatan_pimpinan');
                $tahun_pimpinan = $request->input('tahun_pimpinan');
                for ($i = 0; $i < count($kegiatan_pimpinan); $i++) {
                    $dataToInsert5[] = [
                        'kader_id' => $newId,
                        'kegiatan_pimpinan' => $kegiatan_pimpinan[$i],
                        'tahun_pimpinan' => $tahun_pimpinan[$i],
                    ];
                }
            }

            foreach ($dataToInsert5 as $data) {
                if ($data['kegiatan_pimpinan'] !== null) {
                    Ref_Pimpinan::updateOrCreate(
                        [
                            'kader_id' => $data['kader_id'],
                            'kegiatan_pimpinan' => $data['kegiatan_pimpinan']
                        ],
                        [
                            'kader_id' => $data['kader_id'],
                            'kegiatan_pimpinan' => $data['kegiatan_pimpinan'],
                            'tahun_pimpinan' => $data['tahun_pimpinan']
                        ]
                    );
                }
            }

            return response()->json(['status' => true], 200);
        } catch (\Exception $e) {
            return response()->json(['status' => false, 'msg' => $e->getMessage()], 400);
        }
    }

    public function show_edit_form(Request $request)
    {
        $id_ubah = $request->id_ubah;
        $data = Kader::where('id', $id_ubah)->first();

        $pendidikan = Ref_Riwayat_Sekolah::where('kader_id', $id_ubah)
            ->where('deleted_at', null)
            ->select('id','jenjang_sekolah', 'nama_sekolah', 'tahun_lulus')
            ->get();

        $pendidikanTerakhir = Ref_Pendidikan_Terakhir::where('kader_id', $id_ubah)
            ->where('deleted_at', null)
            ->select('id','pendidikan_terakhir', 'status_pendidikan_terakhir')
            ->get();

        $pengalamanOrganisasiIMM = Ref_Pengalaman_Organisasi_IMM::where('kader_id', $id_ubah)
            ->where('deleted_at', null)
            ->select('id','posisi_jabatan', 'mulai_organisasi', 'selesai_organisasi','deleted_at')
            ->get();

        $pengalamanOrganisasiLainnya = Ref_Pengalaman_Organisasi_Lainnya::where('kader_id', $id_ubah)
            ->where('deleted_at', null)
            ->select('id','tempat','posisi_jabatan_lainnya', 'mulai_organisasi', 'selesai_organisasi')
            ->get();

        $Perkaderan = Ref_Perkaderan::where('kader_id', $id_ubah)
            ->where('deleted_at', null)
            ->select('id','kegiatan_perkaderan','tahun_perkaderan')
            ->get();


        $Pimpinan = Ref_Pimpinan::where('kader_id', $id_ubah)
            ->where('deleted_at', null)
            ->select('id','kegiatan_pimpinan','tahun_pimpinan')
            ->get();


        $cabang = Cabang::
            where('deleted_at', null)
            ->get();

        $kampus = Kampus::
            where('deleted_at', null)
            ->get();

        $komisariat = Komisariat::
            where('deleted_at', null)
            ->get();

        $fakultas = Fakultas::
            where('deleted_at', null)
            ->get();


        $prodi = Prodi::
            where('deleted_at', null)
            ->get();

        $list = [
            'title' => 'Kader ' . $data->nama_lengkap,
            'data' => $data,
            'pendidikan' => $pendidikan,
            'pendidikanTerakhir' => $pendidikanTerakhir,
            'pengalamanOrganisasiIMM' => $pengalamanOrganisasiIMM,
            'pengalamanOrganisasiLainnya' => $pengalamanOrganisasiLainnya,
            'Perkaderan' => $Perkaderan,
            'Pimpinan' => $Pimpinan,
            'cabang' => $cabang,
            'kampus' => $kampus,
            'fakultas' => $fakultas,
            'prodi' => $prodi,
            'komisariat' => $komisariat,
        ];

        return view('contents.kader.edit', $list);
    }

    public function delete_repeater(Request $request)
    {
        $hapus = $request->hapus;
        $id_ubah = $request->id_ubah;

        if($hapus==1){
            $pendidikan = Ref_Riwayat_Sekolah::where('id', $id_ubah)
                ->delete();
        }elseif($hapus==2){
            $pendidikanTerakhir = Ref_Pendidikan_Terakhir::where('id', $id_ubah)
            ->delete();
        }elseif($hapus==3){
            $pengalamanOrganisasiIMM = Ref_Pengalaman_Organisasi_IMM::where('id', $id_ubah)
            ->delete();
        }elseif($hapus==4){
            $pengalamanOrganisasiLainnya = Ref_Pengalaman_Organisasi_Lainnya::where('id', $id_ubah)
            ->delete();
        }elseif($hapus==5){
            $Perkaderan = Ref_Perkaderan::where('id', $id_ubah)
            ->delete();
        }elseif($hapus==6){
            $Pimpinan = Ref_Pimpinan::where('id', $id_ubah)
            ->delete();
        }
    }

    public function delete(Request $request)
    {
        try {

            $user = Kader::find($request->id);

            $user->delete();

            if ($user->trashed()) {
                return response()->json(['status' => true], 200);
            }
        } catch (\Exception $e) {
            return response()->json(['status' => false, 'msg' => $e->getMessage()], 400);
        }
    }

    public function get_fakultas(Request $request)
    {
        $fakultas = Fakultas::where('kampus_id', $request->id)->get();
        // return $fakultas;
        $option = '<option value="">-- Pilih Fakultas --</option>';
        foreach ($fakultas as $value) {
            $option .= '<option data-kampus="' . $value->kampus_id . '" value="' . $value->kampus_id . '">' . $value->fakultas . '</option>';
        }

        echo json_encode($option);
    }

    public function get_prodi(Request $request)
    {
        $fakultas = $request->input('fakultas');

        $prodi = Prodi::where('fakultas_id', $fakultas)->get();
        $option = '<option value="">-- Pilih Program Studi --</option>';
        foreach ($prodi as $value) {
            $option .= '<option data-fakultas="' . $value->fakultas_id . '" data-kampus="' . $value->kampus_id . '"value="' . $value->id . '">' . $value->prodi . '</option>';
        }

        echo json_encode($option);
    }


}
