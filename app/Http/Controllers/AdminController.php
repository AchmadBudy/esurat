<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Jabatan;

class AdminController extends Controller
{

    public function pengguna()
    {
        return view('dashboard.pengguna', ['title' => 'E-Surat | Daftar Pengguna', 'penggunas' => User::all(), 'jabatans' => Jabatan::all()]);
    }

    public function tambahPengguna(Request $request)
    {
        $validate = $request->validate([
            'email' => 'required|unique:users',
            'name' => 'required',
            'jabatan_id' => 'required',
            'is_admin' => 'boolean',
            'NIP' => 'required|unique:users',
            'no_telp' => 'required|unique:users',
        ]);

        $validate['password'] = bcrypt('password');


        User::create($validate);

        return back()->with('success', 'Berhasil menambahkan User. Password default adalah (password)');
    }

    public function resetPengguna(Request $request)
    {
        $validate = $request->validate([
            'id' => 'required',
        ]);

        $user = User::find($validate['id']);
        $user->update(['password' => bcrypt('password')]);

        return back()->with('success', 'Berhasil Mereset Password User. Password default adalah (password)');
    }

    public function hapusPengguna(Request $request)
    {
        $validate = $request->validate([
            'id' => 'required',
        ]);

        $user = User::find($validate['id']);
        $email = $user->email;
        $user->delete();

        return back()->with('success', 'Berhasil menghapus pengguna ' . $email);
    }

    public function jabatan()
    {
        return view('dashboard.jabatan', ['title' => 'E-Surat | Daftar Jabatan', 'jabatans' => Jabatan::all()]);
    }

    public function tambahJabatan(Request $request)
    {
        $validate = $request->validate([
            'nama_jabatan' => 'required|unique:jabatans'
        ]);

        Jabatan::create($validate);

        return back()->with('success', 'Berhasil menambahkan jabatan');
    }

    public function editJabatan(Request $request)
    {
        $validate = $request->validate([
            'nama_jabatan' => 'required|unique:jabatans'
        ]);

        $jabatan = Jabatan::find($request->input('id'));
        $jabatan->update($validate);
        return back()->with('success', 'Berhasil Mengubah jabatan');
    }

    public function hapusJabatan(Request $request)
    {
        $jabatan = Jabatan::find($request->input('id'));
        $jabatan->delete();
        return back()->with('success', 'Berhasil Menghapus jabatan');
    }
}
