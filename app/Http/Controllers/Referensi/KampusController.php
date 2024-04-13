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
use App\Model\Kampus;

class KampusController extends Controller
{
    public function index(Request $request)
    {
        return view('contents.referensi.kampus.list', [
            'title' => 'Kampus',
        ]);
    }

    public function data(Request $request)
    {
        $list = Kampus::select(DB::raw('id, kampus, created_at'));

        return DataTables::of($list)
            ->addIndexColumn()
            ->make(true);
    }

    public function store(Request $request)
    {
        $id = $request->input('id');
        if ($id) {
            $request->validate([
                'kampus' => 'required',
            ], [
                'kampus.required' => '<strong style="color: red;">Kampus wajib diisi.</strong>',
            ]);
            $data = Kampus::find($id);
        } else {
            $request->validate([
                'kampus' => 'required',
            ], [
                'kampus.required' => '<strong style="color: red;">Judul Kampus wajib diisi.</strong>',
            ]);
        }

        try {

            $data = [
                'kampus' => $request->input('kampus'),
                'updated_at' => date('Y-m-d H:i:s'),
            ];

            if ($id) {
                Kampus::where('id', $id)->update($data);
            } else {
                $data['created_at'] = now();
                Kampus::create($data);
            }

            return response()->json(['status' => true], 200);
        } catch (\Exception $e) {
            return response()->json(['status' => false, 'msg' => $e->getMessage()], 400);
        }
    }

    public function delete(Request $request)
    {
        try {
            $user = Kampus::find($request->id);

            $user->delete();

            if ($user->trashed()) {
                return response()->json(['status' => true], 200);
            }
        } catch (\Exception $e) {
            return response()->json(['status' => false, 'msg' => $e->getMessage()], 400);
        }
    }
}
