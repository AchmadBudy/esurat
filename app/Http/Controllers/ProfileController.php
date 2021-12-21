<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function index()
    {
        return view('dashboard.profile', ['title' => 'E-Surat | Profile']);
    }

    public function editProfile()
    {
        return view('dashboard.editProfile', ['title' => 'E-Surat | Edit Profile']);
    }

    public function processProfile(Request $request)
    {
        if (Auth::user()->email == $request->input('email')) {
            $validated = $request->validate([
                'name' => 'required',
                'NIP' => 'required|integer',
                'no_telp' => 'required|integer',
                'email' => 'required|email',
                'gambar' => 'image|file|max:2000',
            ]);
        } else {
            $validated = $request->validate([
                'name' => 'required',
                'NIP' => 'required|integer',
                'no_telp' => 'required|integer',
                'email' => 'required|unique:users|max:255|email',
                'gambar' => 'required|image|file|max:2000',
            ]);
        }


        if (null != $request->file('gambar')) {
            $image = $request->file('gambar');
            $input['imagename'] = time() . '.' . $image->getClientOriginalExtension();
            if ($request->input('gambarLama') != 'default.jpg') {
                unlink(public_path('/images-profile') . '/' . $request->file('gambar'));
            }
            $destinationPath = public_path('/images-profile');
            $img = Image::make($image->getRealPath());
            $img->resize(100, 100, function ($constraint) {
                $constraint->aspectRatio();
            })->save($destinationPath . '/' . $input['imagename']);

            $validated['gambar'] = $input['imagename'];
        }
        $user = User::find(Auth::user()->id);
        $user->update($validated);

        return back()->with('success', 'Kamu telah berhasil ubah profile kamu!');
    }

    public function ubahPassword(Request $request)
    {
        $validation = $request->validate([
            'password' => 'required',
            'password-baru' => 'required'
        ]);

        if (!Hash::check($request->password, Auth::user()->password)) {
            return back()->withErrors([
                'password' => ['Password Salah!']
            ]);
        }


        $user = User::find(Auth::user()->id);
        $user->update(['password' => bcrypt($validation['password-baru'])]);

        return back()->with('success', 'Kamu telah berhasil ubah password profile kamu!');
    }
}
