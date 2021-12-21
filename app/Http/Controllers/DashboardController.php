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
        $totalSuratKeluar = SuratKeluar::all()->count();
        $totalSuratMasuk = SuratMasuk::all()->count();
        $totalUser = User::all()->count();
        return view('dashboard.index', ['title' => 'E-Surat | Dashboard', 'totalSuratKeluar' => $totalSuratKeluar, 'totalSuratMasuk' => $totalSuratMasuk, 'totalUser' => $totalUser]);
    }
}
