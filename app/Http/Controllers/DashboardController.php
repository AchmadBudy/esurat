<?php

namespace App\Http\Controllers;

use App\Models\Jabatan;
use App\Models\SuratKeluar;
use App\Models\SuratMasuk;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Image;

class DashboardController extends Controller
{
    public function index()
    {
        $tahunanSuratKeluar = SuratKeluar::selectRaw('MONTH(tanggalSurat) as MONTH, COUNT(*) as COUNT')->whereYear('tanggalSurat', date('Y'))->groupBy('tanggalSurat')->get();
        $tahunanSuratKeluars = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0];
        foreach ($tahunanSuratKeluar as $i) {
            $tahunanSuratKeluars[$i->MONTH - 1] = $i->COUNT;
        }
        $tahunanSuratMasuk = SuratMasuk::selectRaw('MONTH(tanggalSurat) as MONTH, COUNT(*) as COUNT')->whereYear('tanggalSurat', date('Y'))->groupBy('tanggalSurat')->get();
        $tahunanSuratMasuks = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0];
        foreach ($tahunanSuratMasuk as $i) {
            $tahunanSuratMasuks[$i->MONTH - 1] = $i->COUNT;
        }

        $totalSuratKeluar = SuratKeluar::all()->count();
        $totalSuratMasuk = SuratMasuk::all()->count();
        $totalUser = User::all()->count();
        return view('dashboard.index', ['title' => 'E-Surat | Dashboard', 'totalSuratKeluar' => $totalSuratKeluar, 'totalSuratMasuk' => $totalSuratMasuk, 'totalUser' => $totalUser, 'suratKeluarTahunan' => $tahunanSuratKeluars, 'suratMasukTahunan' => $tahunanSuratMasuks]);
    }
}
