<?php

namespace App\Http\Controllers\Referensi;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Yajra\DataTables\Facades\DataTables;
use App\Http\Controllers\Controller;
use File;

// Model
use App\Model\Fakultas;
use App\Model\Kampus;
use App\Model\Prodi;

class ProdiController extends Controller
{
    public function index(Request $request)
    {
        $kampus = Kampus::select('id','kampus')->get();
        $fakultas = Fakultas::select('id','fakultas')->get();

        return view('contents.referensi.prodi.list', [
            'title' => 'Prodi',
            'kampus' => $kampus,
            'fakultas' => $fakultas,
        ]);
    }

    public function data()
    {
        $list = Prodi::with('kampus','fakultas');

        return DataTables::of($list)
            ->addIndexColumn()
            ->make(true);
    }

    public function store(Request $request)
    {
        $id = $request->input('id');
        if ($id) {
            $request->validate([
                'kampus_id' => 'required',
                'fakultas_id' => 'required',
                'prodi' => 'required',
            ], [
                'prodi.required' => '<strong style="color: red;">Prodi wajib diisi.</strong>',
            ]);
            $data = Prodi::find($id);
        } else {
            $request->validate([
                'kampus_id' => 'required',
                'fakultas_id' => 'required',
                'prodi' => 'required',
            ], [
                'prodi.required' => '<strong style="color: red;">Judul Prodi wajib diisi.</strong>',
            ]);
        }

        try {

            $data = [
                'kampus_id' => $request->input('kampus_id'),
                'fakultas_id' => $request->input('fakultas_id'),
                'prodi' => $request->input('prodi'),
                'updated_at' => date('Y-m-d H:i:s'),
            ];

            if ($id) {
                Prodi::where('id', $id)->update($data);
            } else {
                $data['created_at'] = now();
                Prodi::create($data);
            }

            return response()->json(['status' => true], 200);
        } catch (\Exception $e) {
            return response()->json(['status' => false, 'msg' => $e->getMessage()], 400);
        }
    }

    public function show_edit_form(Request $request)
    {
        $id_ubah = $request->id_ubah;
        $data = Prodi::with('kampus','fakultas')->where('id', $id_ubah)->first();

        $kampus = Kampus::
            where('deleted_at', null)
            ->get();

        $fakultas = Fakultas::
            where('deleted_at', null)
            ->get();

        $list = [
            'title' => $data->prodi,
            'data' => $data,
            'kampus' => $kampus,
            'fakultas' => $fakultas
        ];

        return view('contents.referensi.prodi.edit', $list);
    }

    public function delete(Request $request)
    {
        try {
            $user = Prodi::find($request->id);

            $user->delete();

            if ($user->trashed()) {
                return response()->json(['status' => true], 200);
            }
        } catch (\Exception $e) {
            return response()->json(['status' => false, 'msg' => $e->getMessage()], 400);
        }
    }
}
