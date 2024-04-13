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
use App\Model\Role;
use App\Model\Dokumen;

class DokumenController extends Controller
{
    public function index(Request $request)
    {
        $roles = Role::all();
        return view('contents.dokumen.list', [
            'title' => 'Dokumen',
            'roles' => $roles,
        ]);
    }

    public function data(Request $request)
    {
        $list = Dokumen::select(DB::raw('id, nama_dokumen, dokumen, is_active, created_at'));

        return DataTables::of($list)
            ->addIndexColumn()
            ->make(true);
    }

    public function store(Request $request)
    {
        $id = $request->input('id');
        if ($id) {
            $request->validate([
                'nama_dokumen' => 'required',
                'dokumen' => 'file|mimes:pdf|max:5240',
            ], [
                'nama_dokumen.required' => '<strong style="color: red;">Judul Dokumen wajib diisi.</strong>',
                'dokumen.file' => '<strong style="color: red;">File yang diunggah harus berupa PDF.</strong>',
                'dokumen.mimes' => '<strong style="color: red;">Format file harus PDF.</strong>',
                'dokumen.max' => '<strong style="color: red;">Maksimal ukuran file PDF adalah 5 MB.</strong>',
            ]);
            $data = Dokumen::find($id);
        } else {
            $request->validate([
                'nama_dokumen' => 'required',
                'dokumen' => 'file|mimes:pdf|max:5240',
            ], [
                'nama_dokumen.required' => '<strong style="color: red;">Judul Dokumen wajib diisi.</strong>',
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

            $data = [
                'nama_dokumen' => $request->input('nama_dokumen'),
                'updated_at' => date('Y-m-d H:i:s'),
            ];

            if (!empty($dokumenName)) {
                $data['dokumen'] = $dokumenName;
            }

            if ($id) {
                Dokumen::where('id', $id)->update($data);
            } else {
                $data['created_at'] = now();
                Dokumen::create($data);
            }

            return response()->json(['status' => true], 200);
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
            $user = Dokumen::find($request->id);

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

    public function switchStatus(Request $request)
    {
        try {
            $user = Dokumen::find($request->id);

            $user->is_active = $request->value;

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

    public function resetPassword(Request $request)
    {
        try {
            $user = Dokumen::find($request->id);

            $user->password = Hash::make('pengguna12345');

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

    public function changePassword(Request $request)
    {
        $request->validate([
            'password' => 'required|min:5',
            'confirmation_password' => 'required|same:password'
        ]);

        try {
            $user = Dokumen::find(Auth::id());

            $user->password = Hash::make($request->password);

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

    public function delete(Request $request)
    {
        try {
            $user = Dokumen::find($request->id);

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

            $user = Dokumen::with('roles')->find($user_id);

            $roles = Role::select('id')->where('is_active', 1)->get();

            $user->roles()->sync($role_id);

            return response()->json(['status' => true], 200);
        } catch (\Exception $e) {
            return response()->json(['status' => false, 'msg' => $e->getMessage()], 400);
        }
    }
}
