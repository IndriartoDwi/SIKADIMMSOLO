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
use App\Model\Cabang;

class CabangController extends Controller
{
    public function index(Request $request)
    {
        return view('contents.referensi.cabang.list', [
            'title' => 'Cabang',
        ]);
    }

    public function data(Request $request)
    {
        $list = Cabang::select(DB::raw('id, cabang, created_at'));

        return DataTables::of($list)
            ->addIndexColumn()
            ->make(true);
    }

    public function store(Request $request)
    {
        $id = $request->input('id');
        if ($id) {
            $request->validate([
                'cabang' => 'required',
            ], [
                'cabang.required' => '<strong style="color: red;">Cabang wajib diisi.</strong>',
            ]);
            $data = Cabang::find($id);
        } else {
            $request->validate([
                'cabang' => 'required',
            ], [
                'cabang.required' => '<strong style="color: red;">Judul Cabang wajib diisi.</strong>',
            ]);
        }

        try {

            $data = [
                'cabang' => $request->input('cabang'),
                'updated_at' => date('Y-m-d H:i:s'),
            ];

            if ($id) {
                Cabang::where('id', $id)->update($data);
            } else {
                $data['created_at'] = now();
                Cabang::create($data);
            }

            return response()->json(['status' => true], 200);
        } catch (\Exception $e) {
            return response()->json(['status' => false, 'msg' => $e->getMessage()], 400);
        }
    }

    public function delete(Request $request)
    {
        try {
            $user = Cabang::find($request->id);

            $user->delete();

            if ($user->trashed()) {
                return response()->json(['status' => true], 200);
            }
        } catch (\Exception $e) {
            return response()->json(['status' => false, 'msg' => $e->getMessage()], 400);
        }
    }
}
