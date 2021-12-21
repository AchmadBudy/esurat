<?php

namespace App\Http\Controllers;

use App\Models\SuratKeluar;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class SuratKeluarController extends Controller
{
    public function suratKeluar()
    {
        return view('suratKeluar.index', ['title' => 'E-Surat | Surat Keluar', 'surats' => SuratKeluar::all()]);
    }

    public function tambahSuratKeluar()
    {
        return view('suratKeluar.tambah', ['title' => 'E-Surat | Tambah Surat Keluar']);
    }

    public function storeSuratKeluar(Request $request)
    {
        $validated = $request->validate([
            'kodeKlasifikasi' => 'required|unique:surat_keluars',
            'kodeArsip' => 'required|unique:surat_keluars',
            'perihal' => 'required',
            'nomorRegistrasi' => 'required|unique:surat_keluars',
            'nomorSurat' => 'required|unique:surat_keluars',
            'asalSurat' => 'required',
            'isiRingkas' => 'required',
            'fileSurat' => 'required|file|max:2024|mimes:jpg,jpeg,png,pdf,doc,docx',
            'tanggalSurat' => 'required',
        ]);

        $validated['user_id'] = Auth::user()->id;

        $validated['fileSurat'] = $request->file('fileSurat')->store('suratKeluar');



        SuratKeluar::create($validated);

        return back()->with('success', 'Data Surat Keluar Telah Ditambah!!');
    }

    public function hapusSuratKeluar(Request $request)
    {
        $validated = $request->validate([
            'id' => 'required',
        ]);
        $surat = SuratKeluar::find($validated['id']);

        Storage::delete($surat->fileSurat);
        $surat->delete();
        return back()->with('success', 'Data Surat Keluar Berhasil Dihapus!!');
    }

    public function editSuratKeluar($id)
    {
        $surat = SuratKeluar::find($id);

        return view('suratKeluar.ubah', ['title' => 'Ubah Surat Keluar', 'surat' => $surat]);
    }

    public function editedSuratKeluar(Request $request)
    {
        $validated = $request->validate([
            'kodeKlasifikasi' => 'required|unique:surat_keluars,kodeKlasifikasi,' . $request->input('id'),
            'kodeArsip' => 'required|unique:surat_keluars,kodeArsip,' . $request->input('id'),
            'perihal' => 'required',
            'nomorRegistrasi' => 'required|unique:surat_keluars,nomorRegistrasi,' . $request->input('id'),
            'nomorSurat' => 'required|unique:surat_keluars,nomorSurat,' . $request->input('id'),
            'asalSurat' => 'required',
            'isiRingkas' => 'required',
            'fileSurat' => 'file|max:2024|mimes:jpg,jpeg,png,pdf,doc,docx',
            'tanggalSurat' => 'required',
        ]);

        if ($request->file('fileSurat') != null) {
            Storage::delete($request->input('namaFile'));
            $validated['fileSurat'] = $request->file('fileSurat')->store('suratKeluar');
        }

        $surat = SuratKeluar::find($request->input('id'));
        $surat->update($validated);

        return redirect('/surat-keluar')->with('success', 'Data Surat Keluar Berhasil Diubah!!');
    }
}
