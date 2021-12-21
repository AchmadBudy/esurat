<?php

namespace App\Http\Controllers;

use App\Models\SuratMasuk;
use Illuminate\Http\Request;
use Image;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class SuratMasukController extends Controller
{
    public function suratMasuk()
    {
        return view('suratMasuk.index', ['title' => 'E-Surat | Surat Masuk', 'surats' => SuratMasuk::all()]);
    }

    public function tambahSuratMasuk()
    {
        // dd(Request::segment(1));
        // dd(request()->segments()[0] == 'surat-masuk');
        // dd(url()->current() == url('surat-masuk/tambah'));
        return view('suratMasuk.tambah', ['title' => 'E-Surat | Tambah Surat Masuk']);
    }

    public function storeSuratMasuk(Request $request)
    {
        $validated = $request->validate([
            'kodeKlasifikasi' => 'required|unique:surat_masuks',
            'kodeArsip' => 'required|unique:surat_masuks',
            'perihal' => 'required',
            'nomorRegistrasi' => 'required|unique:surat_masuks',
            'nomorSurat' => 'required|unique:surat_masuks',
            'asalSurat' => 'required',
            'isiRingkas' => 'required',
            'fileSurat' => 'required|file|max:2024|mimes:jpg,jpeg,png,pdf,doc,docx',
            'tanggalSurat' => 'required',
        ]);

        $validated['user_id'] = Auth::user()->id;

        $validated['fileSurat'] = $request->file('fileSurat')->store('suratMasuk');



        SuratMasuk::create($validated);

        return back()->with('success', 'Data Surat Masuk Telah Ditambah!!');
    }

    public function hapusSuratMasuk(Request $request)
    {
        $validated = $request->validate([
            'id' => 'required',
        ]);
        $surat = SuratMasuk::find($validated['id']);

        Storage::delete($surat->fileSurat);
        $surat->delete();
        return back()->with('success', 'Data Surat Masuk Berhasil Dihapus!!');
    }

    public function editSuratMasuk($id)
    {
        $surat = SuratMasuk::find($id);

        return view('suratMasuk.ubah', ['title' => 'Ubah Surat Masuk', 'surat' => $surat]);
    }

    public function editedSuratMasuk(Request $request)
    {
        $validated = $request->validate([
            'kodeKlasifikasi' => 'required|unique:surat_masuks,kodeKlasifikasi,' . $request->input('id'),
            'kodeArsip' => 'required|unique:surat_masuks,kodeArsip,' . $request->input('id'),
            'perihal' => 'required',
            'nomorRegistrasi' => 'required|unique:surat_masuks,nomorRegistrasi,' . $request->input('id'),
            'nomorSurat' => 'required|unique:surat_masuks,nomorSurat,' . $request->input('id'),
            'asalSurat' => 'required',
            'isiRingkas' => 'required',
            'fileSurat' => 'file|max:2024|mimes:jpg,jpeg,png,pdf,doc,docx',
            'tanggalSurat' => 'required',
        ]);

        if ($request->file('fileSurat') != null) {
            Storage::delete($request->input('namaFile'));
            $validated['fileSurat'] = $request->file('fileSurat')->store('suratMasuk');
        }

        $surat = SuratMasuk::find($request->input('id'));
        $surat->update($validated);

        return redirect('/surat-masuk')->with('success', 'Data Surat Masuk Berhasil Diubah!!');
    }
}
