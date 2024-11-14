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
            $data = PermohonanInformasi::with(['pemohon', 'tandaBuktiPenerimaan', 'tandaBuktiPenerimaan.tandaKeputusan'])
                ->whereHas('tandaBuktiPenerimaan.tandaKeputusan', function ($query) {
                    $query->where('status', 'Diproses');
                })
                ->get();
        }
        // dd($data);

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
    public function show($no_permohonan_informasi)
    {
        $data = PermohonanInformasi::where('no_permohonan_informasi', $no_permohonan_informasi)->firstOrFail();
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

    public function update(Request $request, $id)
    {
        $data = PermohonanInformasi::findOrFail($id);

        $data->id_penerima = Auth::id();
        $data->save();

        // Periksa apakah relasi tandaBuktiPenerimaan ada
        if ($data->tandaBuktiPenerimaan) {
            // Jika tombol "Lanjutkan" diklik
            if ($request->has('action') && $request->input('action') === 'lanjutkan') {
                // Set status tandaBuktiPenerimaan ke null atau kosong
                $data->tandaBuktiPenerimaan()->update([
                    'tgl_penerimaan' => now(),
                    'status' => 'Diteruskan',
                ]);

                // Ambil objek TandaBuktiPenerimaan
                $keputusan = $data->tandaBuktiPenerimaan;

                // Buat data baru di tabel keputusan_informasi
                $keputusan->tandaKeputusan()->create([
                    'tanda_buktipenerimaan_id' => $data->id,
                    'status' => 'Diproses',                  // Set status keputusan ke 'diproses'
                    'tgl_keputusan' => now(),                // Set tanggal keputusan ke waktu saat ini
                    'keterangan' => $request->input('keterangan'),
                    'updated_at' => now(),
                ]);
            } else {
                // Jika tombol "kembalikan" diklik
                $data->tandaBuktiPenerimaan()->update([
                    'status' => 'Ajukan Ulang',
                    'tgl_penerimaan' => null,
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
