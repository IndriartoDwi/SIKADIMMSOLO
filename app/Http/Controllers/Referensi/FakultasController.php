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

class FakultasController extends Controller
{
    public function index(Request $request)
    {
        $universitas = Kampus::select('id','kampus')->get();
        return view('contents.referensi.fakultas.list', [
            'title' => 'Fakultas',
            'universitas' => $universitas,

        ]);
    }

    public function data()
    {
        $list = Fakultas::with('kampus')->get();
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
                'fakultas' => 'required',
            ], [
                'kampus_id.required' => '<strong style="color: red;">Perguruan Tinggi wajib diisi.</strong>',
                'fakultas.required' => '<strong style="color: red;">Fakultas wajib diisi.</strong>',
            ]);
            $data = Fakultas::find($id);
        } else {
            $request->validate([
                'kampus_id' => 'required',
                'fakultas' => 'required',
            ], [
                'kampus_id.required' => '<strong style="color: red;">Perguruan Tinggi wajib diisi.</strong>',
                'fakultas.required' => '<strong style="color: red;">Judul Fakultas wajib diisi.</strong>',
            ]);
        }

        try {
            $data = [
                'kampus_id' => $request->input('kampus_id'),
                'fakultas' => $request->input('fakultas'),
                'updated_at' => date('Y-m-d H:i:s'),
            ];

            if ($id) {
                Fakultas::where('id', $id)->update($data);
            } else {
                $data['created_at'] = now();
                Fakultas::create($data);
            }

            return response()->json(['status' => true], 200);
        } catch (\Exception $e) {
            return response()->json(['status' => false, 'msg' => $e->getMessage()], 400);
        }
    }

    public function show_edit_form(Request $request)
    {
        $id_ubah = $request->id_ubah;
        $data = Fakultas::with('kampus')->where('id', $id_ubah)->first();
        $kampus = Kampus::
            where('deleted_at', null)
            ->get();
        // return $data;
        $list = [
            'title' => $data->fakultas,
            'data' => $data,
            'kampus' => $kampus
        ];

        return view('contents.referensi.fakultas.edit', $list);
    }

    public function delete(Request $request)
    {
        try {
            $user = Fakultas::find($request->id);

            $user->delete();

            if ($user->trashed()) {
                return response()->json(['status' => true], 200);
            }
        } catch (\Exception $e) {
            return response()->json(['status' => false, 'msg' => $e->getMessage()], 400);
        }
    }
}
