<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\PermohonanInformasi;
use App\Http\Controllers\Controller;
use App\Models\BiayaInformasi;
use App\Models\JenisInformasi;
use App\Models\KategoriPemohon;
use App\Models\SumberInformasi;
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
                    // Langkah 1: Buat data di tabel sumber_informasi
                    $sumberInformasi = SumberInformasi::create([
                        'jenis_sumber' => $request->input('jenis_sumber'),
                    ]);

                    // Langkah 2: Buat data di tabel biaya_informasi
                    $biayaInformasi = BiayaInformasi::create([
                        'nama' => $data->pemohon->nama, // Sesuaikan dengan data yang dikirim
                        'biaya' => $request->input('biaya_informasi'),
                    ]);

                    // Langkah 3: Buat data di tabel jenis_informasi
                    $jenisInformasi = JenisInformasi::create([
                        'jenis_informasi' => $request->input('jenis_informasi'),
                    ]);

                    // Langkah 4: Perbarui tabel keputusan_informasi dengan ID dari tabel terkait
                    $keputusan->update([
                        'status' => 'Diterima',
                        'tgl_keputusan' => now(),
                        'keterangan' => $request->input('keterangan'),
                        'sumber_informasi_id' => $sumberInformasi->id, // Ambil ID dari tabel sumber_informasi
                        'biaya_informasi_id' => $biayaInformasi->id,   // Ambil ID dari tabel biaya_informasi
                        'jenis_informasi_id' => $jenisInformasi->id,   // Ambil ID dari tabel jenis_informasi
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
        abort(404);
    }

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
                'Diterima' => 'text-success',
                'Diproses' => 'text-pending',
                'Ditolak' => 'text-danger',
                default => '',
            };
        }

        foreach ($data as $btn) {
            $btn->btnPenerimaan = match ($btn->tandaBuktiPenerimaan->status ?? '') {
                'Mengunggu' => 'btn-pending',
                'Ajukan Ulang' => 'btn-danger',
                default => ''
            };

            $btn->btnKeputusan = match ($btn->tandaBuktiPenerimaan->tandaKeputusan->status ?? '') {
                'Diterima' => 'btn-primary',
                'Diproses' => 'btn-pending',
                'Ditolak' => 'btn-danger',
                default => ''
            };
        }

        foreach ($data as $icon) {
            $icon->iconPenerimaan = match ($icon->tandaBuktiPenerimaan->status ?? '') {
                'Mengunggu' => 'clock',
                'Ajukan Ulang' => 'x',
                default => ''
            };

            $icon->iconKeputusan = match ($icon->tandaBuktiPenerimaan->tandaKeputusan->status ?? '') {
                'Diterima' => 'check',
                'Diproses' => 'clock',
                'Ditolak' => 'x',
                default => ''
            };
        }

        // Kirim data ke view
        return view('riwayat.permohonan-informasi', compact('data'));
    }
}
