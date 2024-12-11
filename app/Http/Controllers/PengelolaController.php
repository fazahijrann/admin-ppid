<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Pemohon;
use App\Models\Statistik;
use Illuminate\Http\Request;
use App\Models\KeberatanInformasi;
use Illuminate\Routing\Controller;
use App\Models\PermohonanInformasi;

class PengelolaController extends Controller
{
    public function index()
    {
        $totalPermohonan = PermohonanInformasi::count();
        $totalPengunjung = Statistik::count();
        $totalKeberatan = KeberatanInformasi::count();
        $totalPemohon = Pemohon::count();
        $role = User::pluck('role');

        return view('pengelola.index', compact(
            'totalPermohonan',
            'totalPengunjung',
            'totalKeberatan',
            'totalPemohon',
            'role'
        ));
    }
}
