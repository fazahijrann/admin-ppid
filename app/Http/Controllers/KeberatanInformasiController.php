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
                // Jika ada request 'action' dengan nilai 'lanjutkan', update status di database
                $data->update([
                    'id_penerima' => Auth::id(),
                    'status' => 'Diproses',
                ]);
            }
        } elseif ($user->role === 'pejabat_ppid') {
            // Logika khusus untuk pejabat_ppid
            $tanggapan = $data->tanggapanKeberatan(); // Ensure this returns a valid relationship

            if ($request->has('action') && $request->input('action') === 'submit') {
                // Lakukan aksi untuk 'submit' pada pejabat_ppid
                // Misalnya, update status atau tindakan lain yang diperlukan
                $data->update([
                    'status' => 'Selesai', // Contoh status baru
                ]);

                // Validate that 'tanggapan' relationship is valid before creating
                if ($tanggapan) {

                    $keputusanAtasan = $request->input('keputusan_atasan');

                    // Jika 'lainnya' dicentang, gunakan nilai dari 'keputusan_atasan_lainnya'
                    if ($request->has('keputusan_atasan') && $request->input('keputusan_atasan') == 'lainnya') {
                        $keputusanAtasan = $request->input('keputusan_atasan_lainnya');  // Gunakan input 'lainnya'
                    }

                    $tanggapan->create([
                        'keberatan_informasi_id' => $data->id,
                        'keterangan' => $request->input('keterangan'),
                        'keputusan_atasan' => $keputusanAtasan, // Store the value directly as a string
                        'jangka_waktu' => $request->input('waktu'),
                        'tgl_tanggapan' => now(),
                    ]);
                }
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

    public function riwayatKeberatan()
    {
        // Ambil data dengan relasi
        $data = KeberatanInformasi::with(['pemohon', 'keberatanInformasi', 'tanggapanKeberatan', 'keputusanInformasi', 'penerimaKeberatan'])
            ->where('status', 'Selesai')
            ->get();
        // dd($data);
        // Kirim data ke view
        return view('riwayat.keberatan-informasi', compact('data'));
    }
}
