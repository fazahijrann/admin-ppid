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

        $permMenunggu = PermohonanInformasi::whereHas('tandaBuktiPenerimaan', function ($query) {
            $query->where('status', 'Menunggu');
        })->count();

        $permUlang = PermohonanInformasi::whereHas('tandaBuktiPenerimaan', function ($query) {
            $query->where('status', 'Ajukan Ulang');
        })->count();

        $permDiteruskan = PermohonanInformasi::whereHas('tandaBuktiPenerimaan', function ($query) {
            $query->where('status', 'Diteruskan');
        })->count();

        $permDiproses = PermohonanInformasi::whereHas('tandaBuktiPenerimaan.tandaKeputusan', function ($query) {
            $query->where('status', 'Diproses');
        })->count();

        $permTolak = PermohonanInformasi::whereHas('tandaBuktiPenerimaan.tandaKeputusan', function ($query) {
            $query->where('status', 'Ditolak');
        })->count();

        $permTerima = PermohonanInformasi::whereHas('tandaBuktiPenerimaan.tandaKeputusan', function ($query) {
            $query->where('status', 'Diterima');
        })->count();

        $keberMenunggu = KeberatanInformasi::where('status', 'Menunggu')->count();
        $keberDiproses = KeberatanInformasi::where('status', 'Diproses')->count();
        $keberSelesai = KeberatanInformasi::where('status', 'Selesai')->count();

        $keberDiteruskan = $keberDiproses + $keberSelesai;

        $role = User::pluck('role');

        return view('pengelola.index', compact(
            'totalPermohonan',
            'totalPengunjung',
            'totalKeberatan',
            'totalPemohon',
            'permMenunggu',
            'permUlang',
            'permDiteruskan',
            'permDiproses',
            'permTolak',
            'permTerima',
            'keberMenunggu',
            'keberDiproses',
            'keberSelesai',
            'keberDiteruskan',
            'role'
        ));
    }
}
