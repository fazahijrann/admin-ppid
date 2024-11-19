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
    // public function show($no_permohonan_informasi)
    // {
    //     $data = PermohonanInformasi::where('no_permohonan_informasi', $no_permohonan_informasi)->firstOrFail();
    //     // dd($data);
    //     return view('detail.permohonan-informasi', compact('data'));
    // }

    // public function show($no_permohonan_informasi)
    // {
    //     $data = PermohonanInformasi::where('no_permohonan_informasi', $no_permohonan_informasi)->firstOrFail();

    //     // Cek jika data sudah diproses (Diterima atau Ditolak)
    //     if ($data->tandaBuktiPenerimaan->status === 'Diterima' || $data->tandaBuktiPenerimaan->tandaKeputusan === 'Ditolak') {
    //         abort(404);
    //     }

    //     return view('detail.permohonan-informasi', compact('data'));
    // }

    public function show($no_permohonan_informasi)
    {
        $data = PermohonanInformasi::where('no_permohonan_informasi', $no_permohonan_informasi)->firstOrFail();

        // Pastikan relasi tandaBuktiPenerimaan dan tandaKeputusan ada sebelum dicek
        $penerimaan = $data->tandaBuktiPenerimaan;
        $user = Auth::user();

        if ($user->role === 'petugas_ppid') {
            if (
                $penerimaan && (
                    in_array($penerimaan->status, ['Diteruskan', 'Ajukan Ulang']) ||
                    ($penerimaan->tandaKeputusan && in_array($penerimaan->tandaKeputusan->status, ['Ditolak', 'Diterima']))
                )
            ) {
                abort(404);
            }
        } elseif ($user->role === 'pejabat_ppid') {
            if (
                $penerimaan && (
                    $penerimaan->status === 'Ajukan Ulang' ||
                    ($penerimaan->tandaKeputusan && in_array($penerimaan->tandaKeputusan->status, ['Ditolak', 'Diterima']))
                )
            ) {
                abort(404);
            }
        }



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
        $role = Auth::user()->role;

        // Set id_penerima ke id pengguna yang login jika role adalah petugas_ppid
        if ($role === 'petugas_ppid') {
            $data->id_penerima = Auth::id();
            $data->save();
        }

        // Ambil objek tandaBuktiPenerimaan dan simpan dalam variabel $penerimaan
        $penerimaan = $data->tandaBuktiPenerimaan;

        // Jika $penerimaan ada, ambil juga tandaKeputusan terkait dan simpan dalam variabel $keputusan
        if ($penerimaan) {
            $keputusan = $penerimaan->tandaKeputusan();

            if ($role === 'petugas_ppid') {
                // Logika khusus petugas_ppid
                if ($request->has('action') && $request->input('action') === 'lanjutkan') {
                    $penerimaan->update([
                        'tgl_penerimaan' => now(),
                        'status' => 'Diteruskan',
                    ]);

                    // Buat entri baru pada tandaKeputusan
                    $keputusan->create([
                        'tanda_buktipenerimaan_id' => $penerimaan->id,
                        'status' => 'Diproses',
                        'tgl_keputusan' => null,
                        'updated_at' => now(),
                    ]);
                } else {
                    $penerimaan->update([
                        'status' => 'Ajukan Ulang',
                        'tgl_penerimaan' => now(),
                    ]);
                }
            } elseif ($role === 'pejabat_ppid') {
                // Logika khusus pejabat_ppid: hanya mengubah data di tabel keputusan
                if ($request->has('action') && $request->input('action') === 'terima') {
                    $keputusan->update([
                        'status' => 'Diterima',
                        'tgl_keputusan' => now(),
                        'keterangan' => $request->input('keterangan'),
                        'updated_at' => now(),
                    ]);
                } else {
                    $keputusan->update([
                        'status' => 'Ditolak',
                        'tgl_keputusan' => now(),
                        'keterangan' => $request->input('keterangan'),
                        'updated_at' => now(),
                    ]);
                }
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

    // public function riwayatPermohonan()
    // {
    //     $data = PermohonanInformasi::with(['pemohon', 'tandaBuktiPenerimaan', 'tandaBuktiPenerimaan.tandaKeputusan'])->get();


    //     $text = match ($data->tandaBuktiPenerimaan->status) {
    //         'Menunggu' => 'text-pending',
    //         'Ajukan Ulang' => 'text-danger'
    //     };

    //     $text = match ($data->tandaBuktiPenerimaan->tandaKeputusan->status) {
    //         'Diterima' => 'text-primary',
    //         'Diproses' => 'text-pending',
    //         'Ditolak ' => 'text-danegr'
    //     };
    //     // dd($data);
    //     return view('riwayat.permohonan-informasi', compact('data', 'text'));
    // }

    public function riwayatPermohonan()
    {
        // Ambil data dengan relasi
        $data = PermohonanInformasi::with(['pemohon', 'tandaBuktiPenerimaan', 'tandaBuktiPenerimaan.tandaKeputusan'])
            ->whereHas('tandaBuktiPenerimaan', function ($query) {
                $query->where('status', 'Ajukan Ulang');
            })
            ->orWhereHas('tandaBuktiPenerimaan.tandaKeputusan', function ($query) {
                $query->whereIn('status', ['Ditolak', 'Diterima']);
            })
            ->get();

        // Proses setiap item dalam koleksi
        foreach ($data as $status) {
            // Tentukan kelas berdasarkan status tandaBuktiPenerimaan
            $status->statusPenerimaan = match ($status->tandaBuktiPenerimaan->status ?? '') {
                'Menunggu' => 'text-pending',
                'Ajukan Ulang' => 'text-danger',
                default => '',
            };

            // Tentukan kelas berdasarkan status tandaKeputusan (jika ada)
            $status->statusKeputusan = match ($status->tandaBuktiPenerimaan->tandaKeputusan->status ?? '') {
                'Diterima' => 'text-primary',
                'Diproses' => 'text-pending',
                'Ditolak' => 'text-danger',
                default => '',
            };
        }

        foreach ($data as $icon) {
            $icon->iconPenerimaan = match ($icon->tandaBuktiPenerimaan->status ?? '') {
                'Mengunggu' => 'clock',
                'Ajukan Ulang' => 'x',
                default => ''
            };

            $icon->iconKeputusan = match ($icon->tandaBuktiPenerimaan->tandaKeputusan->status ?? '') {
                'Diterima' => 'thumbs-up',
                'Diproses' => 'clock',
                'Ditolak' => 'x',
                default => ''
            };
        }

        // Kirim data ke view
        return view('riwayat.permohonan-informasi', compact('data'));
    }
}
