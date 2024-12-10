<?php

namespace App\Http\Controllers;


use App\Models\User;
use Illuminate\Http\Request;
use App\Models\BiayaInformasi;
use App\Models\JenisInformasi;
use App\Models\KategoriPemohon;
use App\Models\SumberInformasi;
use App\Models\KeberatanInformasi;
use App\Models\PermohonanInformasi;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\BuktiPenerimaanInformasi;


class KeberatanInformasiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();
        if ($user->role === 'petugas_ppid') {
            $data = KeberatanInformasi::where('status', 'Menunggu')->get();
        } elseif ($user->role === 'pejabat_ppid') {
            $data = KeberatanInformasi::where('status', 'Diproses')->get();
        }
        return view('pengelola.tampil-keberatan', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        abort(404);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        abort(404);
    }

    /**
     * Display the specified resource.
     */
    public function show($no_keberatan_informasi)
    {
        $data = KeberatanInformasi::where('no_keberatan_informasi', $no_keberatan_informasi)->firstOrFail();
        return view('detail.keberatan-informasi', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(KeberatanInformasi $keberatanInformasi)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $data = KeberatanInformasi::findOrFail($id);
        $user = Auth::user();

        if ($user->role === 'petugas_ppid') {
            // Logika khusus untuk petugas_ppid
            if ($request->has('action') && $request->input('action') === 'lanjutkan') {
                // Jika ada request 'action' dengan nilai 'lanjutkan', set status menjadi 'Diproses'
                $data->update([
                    'status' => 'Diproses'
                ]);
            }
        }
        return redirect(route('keberatan.index'))->with('success', 'Status updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(KeberatanInformasi $keberatanInformasi)
    {
        //
    }
}
