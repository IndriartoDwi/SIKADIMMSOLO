<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Http\Response;
use File;

// Model
use App\Model\Timeline;

class TimelineController extends Controller
{
    public function index(Request $request)
    {
        return view('contents.timeline.list', [
            'title' => 'Timeline',
        ]);
    }

    public function data(Request $request)
    {

        $role_id = session('role_id');

        if ($role_id === 2) {
            $list = Timeline::select(DB::raw('id, nama_agenda, tanggal_mulai, tanggal_selesai, dokumen, catatan, is_verif, created_at, user_id'))->with('koms');
        } else {
            $list = Timeline::where('user_id', Auth::user()->id)->with('koms')->get();
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
                'nama_agenda' => 'required',
                'tanggal_mulai' => 'required',
                'tanggal_selesai' => 'required',
                'dokumen' => 'file|mimes:pdf|max:5240',
            ], [
                'nama_agenda.required' => '<strong style="color: red;">Judul Timeline wajib diisi.</strong>',
                'dokumen.file' => '<strong style="color: red;">File yang diunggah harus berupa PDF.</strong>',
                'dokumen.mimes' => '<strong style="color: red;">Format file harus PDF.</strong>',
                'dokumen.max' => '<strong style="color: red;">Maksimal ukuran file PDF adalah 5 MB.</strong>',
            ]);
            $data = Timeline::find($id);
        } else {
            $request->validate([
                'nama_agenda' => 'required',
                'tanggal_mulai' => 'required',
                'tanggal_selesai' => 'required',
                'dokumen' => 'file|mimes:pdf|max:5240',
            ], [
                'nama_agenda.required' => '<strong style="color: red;">Judul Timeline wajib diisi.</strong>',
                'dokumen.file' => '<strong style="color: red;">File yang diunggah harus berupa PDF.</strong>',
                'dokumen.mimes' => '<strong style="color: red;">Format file harus PDF.</strong>',
                'dokumen.max' => '<strong style="color: red;">Maksimal ukuran file PDF adalah 5 MB.</strong>',
            ]);
        }

        try {
            if ($request->hasFile('dokumen')) {
                $file = $request->file('dokumen');
                $name = time() . '_' . $file->getClientOriginalName();
                $path = storage_path() . '/app/public/dokumen/';
                if (!File::isDirectory($path)) {
                    File::makeDirectory($path, 0775, true, true);
                }
                if ($file->move($path, $name)) {
                    $dokumen = $name;
                }

                if (!empty($data->dokumen)) {
                    if (File::exists(public_path($data->dokumen))) {
                        File::delete(public_path($data->dokumen));
                    }
                }
                $dokumenName = '/dokumen/' . $dokumen;
            }

            if ($request->tanggal_mulai) {
                if (Timeline::where('tanggal_mulai', $request->tanggal_mulai)->where('is_verif', 2)->exists()) {
                    return response()->json(['error' => 'Agenda Tidak dapat diinput karena pada tanggal '.$request->tanggal_mulai.' sudah ada agenda lain'], Response::HTTP_UNPROCESSABLE_ENTITY);
                } else {
                    $data = [
                        'nama_agenda' => $request->input('nama_agenda'),
                        'tanggal_mulai' => $request->input('tanggal_mulai'),
                        'tanggal_selesai' => $request->input('tanggal_selesai'),
                        'catatan' => null,
                        'is_verif' => 0,
                        'updated_at' => now(),
                        'user_id' => Auth::user()->id,
                    ];

                    if (!empty($dokumenName)) {
                        $data['dokumen'] = $dokumenName;
                    }

                    if ($id) {
                        Timeline::where('id', $id)->update($data);
                    } else {
                        $data['created_at'] = now();
                        Timeline::create($data);
                    }

                    return response()->json(['status' => true], 200);
                }
            } else {
                return response()->json(['error' => 'tanggal_mulai is required.'], Response::HTTP_UNPROCESSABLE_ENTITY);
            }

        } catch (\Exception $e) {
            return response()->json(['status' => false, 'msg' => $e->getMessage()], 400);
        }
    }

    public function update(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'username' => ['required', Rule::unique('users', 'username')->ignore($request->id)]
        ]);

        try {
            $user = Timeline::find($request->id);

            $user->name = $request->name;
            $user->username = $request->username;

            if ($user->isDirty()) {
                $user->save();
            }

            if ($user->wasChanged()) {
                return response()->json(['status' => true], 200);
            }
        } catch (\Exception $e) {
            return response()->json(['status' => false, 'msg' => $e->getMessage()], 400);
        }
    }

    public function verifikasiTimeline(Request $request)
    {
        try {
            $data = Timeline::find($request->id);

            $data->is_verif = $request->is_verif;

            if( $request->catatan != null){
                $data->catatan = $request->catatan;
            }else{
                $data->catatan = "Agenda sudah tervalidasi";
            }

            if ($data->isDirty()) {
                $data->save();
            }

            if ($data->wasChanged()) {
                return response()->json(['status' => true], 200);
            }
        } catch (\Exception $e) {
            return response()->json(['status' => false, 'msg' => $e->getMessage()], 400);
        }
    }

    public function delete(Request $request)
    {
        try {
            $user = Timeline::find($request->id);

            $user->delete();

            if ($user->trashed()) {
                return response()->json(['status' => true], 200);
            }
        } catch (\Exception $e) {
            return response()->json(['status' => false, 'msg' => $e->getMessage()], 400);
        }
    }

    public function updateRole(Request $request)
    {
        try {
            $user_id = $request->id;
            $role_id = $request->role_id;

            $user = Timeline::with('roles')->find($user_id);

            $roles = Role::select('id')->where('is_active', 1)->get();

            $user->roles()->sync($role_id);

            return response()->json(['status' => true], 200);
        } catch (\Exception $e) {
            return response()->json(['status' => false, 'msg' => $e->getMessage()], 400);
        }
    }
}
