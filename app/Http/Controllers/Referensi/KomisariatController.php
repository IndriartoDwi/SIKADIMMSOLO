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
use App\Model\Komisariat;

class KomisariatController extends Controller
{
    public function index(Request $request)
    {
        return view('contents.referensi.komisariat.list', [
            'title' => 'Komisariat',
        ]);
    }

    public function data(Request $request)
    {
        $list = Komisariat::select(DB::raw('id, komisariat, created_at'));

        return DataTables::of($list)
            ->addIndexColumn()
            ->make(true);
    }

    public function store(Request $request)
    {
        $id = $request->input('id');
        if ($id) {
            $request->validate([
                'komisariat' => 'required',
            ], [
                'komisariat.required' => '<strong style="color: red;">Komisariat wajib diisi.</strong>',
            ]);
            $data = Komisariat::find($id);
        } else {
            $request->validate([
                'komisariat' => 'required',
            ], [
                'komisariat.required' => '<strong style="color: red;">Judul Komisariat wajib diisi.</strong>',
            ]);
        }

        try {

            $data = [
                'komisariat' => $request->input('komisariat'),
                'updated_at' => date('Y-m-d H:i:s'),
            ];

            if ($id) {
                Komisariat::where('id', $id)->update($data);
            } else {
                $data['created_at'] = now();
                Komisariat::create($data);
            }

            return response()->json(['status' => true], 200);
        } catch (\Exception $e) {
            return response()->json(['status' => false, 'msg' => $e->getMessage()], 400);
        }
    }

    public function delete(Request $request)
    {
        try {
            $user = Komisariat::find($request->id);

            $user->delete();

            if ($user->trashed()) {
                return response()->json(['status' => true], 200);
            }
        } catch (\Exception $e) {
            return response()->json(['status' => false, 'msg' => $e->getMessage()], 400);
        }
    }
}
