<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\PermohonanInformasi;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class PermohonanInformasiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Auth::user();
        if ($data->role == 'petugas_ppid') {
            $data = PermohonanInformasi::with(['pemohon'])->where('status', 'Menunggu')->get();
            // dd($data);
        } elseif ($data->role == 'pejabat_ppid') {
            $data = PermohonanInformasi::with(['pemohon'])->where('status', 'Diproses')->get();
        }
        return view('pengelola.permohonan-informasi', compact('data'));
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
    public function show(PermohonanInformasi $permohonanInformasi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PermohonanInformasi $permohonanInformasi)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, PermohonanInformasi $permohonanInformasi)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PermohonanInformasi $permohonanInformasi)
    {
        //
    }
}
