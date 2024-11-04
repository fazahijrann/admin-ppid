<?php

namespace App\Http\Controllers;

use App\Models\Pemohon;
use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class PemohonController extends Controller
{
    /**
     * Display a listing of the resource.
     * 
     */
    public function index()
    {
        $data = Pemohon::get();
        return view('crud-akun.tampil-data', compact('data'));
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
    public function show(Pemohon $pemohon)
    {
        abort(404);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $user = Pemohon::findOrFail($id);
        return view('crud-akun.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $user = Pemohon::findOrFail($id);

        $request->validate([
            'no_pendaftaran' => 'nullable|string|max:255',
            'nama' => 'nullable|string|max:255',
            'nik' => 'nullable|string|max:255',
            'alamat' => 'nullable|string',
            'no_tlp' => 'nullable|string|max:15',
            'email' => 'nullable|email|unique:pemohon,email,' . $user->id,
            'pekerjaan' => 'nullable|string|max:255',
            'file_ktp' => 'nullable|file',
            'password' => 'nullable|min:6',
            'id_kategori' => 'nullable|integer',
            'nama_kuasa' => 'nullable|string|max:255',
            'alamat_kuasa' => 'nullable|string|max:255',
            'no_tlp_kuasa' => 'nullable|string|max:15',
            'sk_badanhukum' => 'nullable|string|max:255',
        ]);

        // Hanya perbarui kolom jika input tidak kosong
        if ($request->filled('nama')) {
            $user->nama = $request->nama;
        }
        $user->no_pendaftaran = $request->no_pendaftaran;
        $user->nik = $request->nik;
        $user->alamat = $request->alamat;
        $user->no_tlp = $request->no_tlp;
        $user->email = $request->email;
        $user->pekerjaan = $request->pekerjaan;

        if ($request->hasFile('file_ktp')) {
            $user->file_ktp = $request->file('file_ktp')->store('ktp_files');
        }
        if ($request->filled('password')) {
            $user->password = Hash::make($request->password);
        }

        // Hanya perbarui id_kategori jika diisi
        if ($request->filled('id_kategori')) {
            $user->id_kategori = $request->id_kategori;
        }

        $user->nama_kuasa = $request->nama_kuasa;
        $user->alamat_kuasa = $request->alamat_kuasa;
        $user->no_tlp_kuasa = $request->no_tlp_kuasa;
        $user->sk_badanhukum = $request->sk_badanhukum;

        $user->save();

        return redirect(route('pemohon.index'))->with('success', 'Pemohon berhasil diupdate.');
    }



    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $user = Pemohon::findOrFail($id);
        $user->delete();

        return redirect(route('pemohon.index'))->with('success', 'Pemohon berhasil dihapus.');
    }
}
