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

    protected $totalPermohonan;
    protected $totalPengunjung;
    protected $totalKeberatan;
    protected $totalPemohon;
    protected $role;


    public function __construct()
    {
        $this->totalPermohonan = PermohonanInformasi::count();
        $this->totalPengunjung = Statistik::count();
        $this->totalKeberatan = KeberatanInformasi::count();
        $this->totalPemohon = Pemohon::count();
        $this->role = User::pluck('role');
    }

    public function index()
    {
        return view('pengelola.index', [
            'totalPermohonan' => $this->totalPermohonan,
            'totalPengunjung' => $this->totalPengunjung,
            'totalKeberatan' => $this->totalKeberatan,
            'totalPemohon' => $this->totalPemohon,
        ]);
    }
}
