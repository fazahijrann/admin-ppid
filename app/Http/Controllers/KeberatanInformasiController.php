<?php

namespace App\Http\Controllers;

use App\Models\KeberatanInformasi;
use Illuminate\Http\Request;

class KeberatanInformasiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $data = KeberatanInformasi::with('pemohon')->get();
        // dd($data);
        return view('pengelola.tampil-keberatan', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(KeberatanInformasi $keberatanInformasi)
    {
        //
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
    public function update(Request $request, KeberatanInformasi $keberatanInformasi)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(KeberatanInformasi $keberatanInformasi)
    {
        //
    }
}
