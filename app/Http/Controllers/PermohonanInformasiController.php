<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\PermohonanInformasi;
use App\Http\Controllers\Controller;
use App\Models\KategoriPemohon;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class PermohonanInformasiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Auth::user();
        if ($data->role === 'petugas_ppid') {
            $data = PermohonanInformasi::with('pemohon')
                ->whereHas('tandaBuktiPenerimaan', function ($query) {
                    $query->where('status', 'Menunggu');
                })
                ->get();
            // dd($data);
        } elseif ($data->role === 'pejabat_ppid') {
            $data = PermohonanInformasi::with('pemohon')
                ->whereHas('tandaBuktiPenerimaan', function ($query) {
                    $query->where('status', 'Diproses');
                })
                ->get();
        }

        // $data = PermohonanInformasi::get();
        return view('pengelola.tampil-permohonan', compact('data'));
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
    public function show($id)
    {
        $data = PermohonanInformasi::findOrFail($id);
        // dd($data);
        return view('detail.permohonan-informasi', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    // public function edit($id)
    // {
    //     $data = PermohonanInformasi::findOrFail($id);
    //     // dd($data);
    //     return view('detail.permohonan-informasi', compact('data'));
    // }

    /**
     * Update the specified resource in storage.
     */
    // public function update(Request $request, $id)
    // {
    //     $data = PermohonanInformasi::findOrFail($id);

    //     // Periksa apakah relasi tandaBuktiPenerimaan ada
    //     if ($data->tandaBuktiPenerimaan) {
    //         // Periksa apakah tombol "Lanjutkan" diklik
    //         if ($request->has('action') && $request->input('action') === 'lanjutkan') {
    //             $data->tandaBuktiPenerimaan->status = null;  // Set status tandaBuktiPenerimaan ke null
    //             // Periksa apakah relasi keputusanInformasi ada
    //             if ($data->keputusanInformasi) {
    //                 $data->keputusanInformasi->status = 'diproses';  // Set status keputusanInformasi ke 'diproses'
    //                 $data->keputusanInformasi->save();  // Simpan perubahan di keputusanInformasi
    //             }
    //         } else {
    //             $data->tandaBuktiPenerimaan->status = 'ditolak';  // Set status tandaBuktiPenerimaan ke 'ditolak'
    //         }

    //         // Simpan keterangan di tandaBuktiPenerimaan jika ada
    //         $data->tandaBuktiPenerimaan->keterangan = $request->input('keterangan');
    //         $data->tandaBuktiPenerimaan->save();  // Simpan perubahan di tandaBuktiPenerimaan
    //     }

    //     return redirect(route('permohonan.index'))->with('success', 'Status updated successfully');
    // }

    public function update(Request $request, $id)
    {
        $data = PermohonanInformasi::findOrFail($id);

        // Periksa apakah relasi tandaBuktiPenerimaan ada
        if ($data->tandaBuktiPenerimaan) {
            // Jika tombol "Lanjutkan" diklik
            if ($request->has('action') && $request->input('action') === 'lanjutkan') {
                // Set status tandaBuktiPenerimaan ke null atau kosong
                $data->id_penerima = Auth::id();
                $data->tandaBuktiPenerimaan()->update([
                    'tgl_penerimaan' => now(),
                    'status' => null,
                ]);

                // Buat data baru di tabel keputusan_informasi
                $data->tandaBuktiPenerimaan()->tandaKeputusan()->create([
                    'tanda_buktipenerimaan_id' => $data->tandaBuktiPenerimaan->id,
                    'status' => 'diproses',                  // Set status keputusan ke 'diproses'
                    'tgl_keputusan' => now(),                // Set tanggal keputusan ke waktu saat ini
                    'keterangan' => $request->input('keterangan'),
                ]);
            } else {
                // Jika tombol "kembalikan" diklik
                $data->tandaBuktiPenerimaan()->update([
                    'status' => 'Ajukan Ulang',
                ]);
                // $data->tandaBuktiPenerimaan->status = 'Ajukan Ulang';  
                // $data->tandaBuktiPenerimaan->save();
            }
        }

        return redirect(route('permohonan.index'))->with('success', 'Status updated successfully');
    }



    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PermohonanInformasi $permohonanInformasi)
    {
        //
    }
}
