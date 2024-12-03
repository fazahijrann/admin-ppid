<?php

namespace App\Http\Controllers;

use Dompdf\Dompdf;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\KeberatanInformasi;
use App\Models\PermohonanInformasi;
use Illuminate\Support\Facades\Auth;


class PdfController extends Controller
{
    public function permohonan($no_permohonan_informasi)
    {
        $user = Auth::user();
        if ($user->role === 'petugas_ppid') {
            abort(404);
        } else {
            $data = PermohonanInformasi::where('no_permohonan_informasi', $no_permohonan_informasi)->firstOrFail();

            $pdf = PDF::loadview('pdf.permohonan-informasi', compact('data'))->setPaper('f4', 'potrait');
        }
        // return view('pdf.permohonan-informasi', compact('data'));
        return $pdf->stream('Permohonan Informasi-' . $data->no_permohonan_informasi . '.pdf');
    }

    public function keberatan($no_keberatan_informasi)
    {
        $user = Auth::user();
        if ($user->role === 'petugas_ppid') {
            abort(404);
        } else {
            $data = KeberatanInformasi::with('keputusanInformasi')
                ->where('no_keberatan_informasi', $no_keberatan_informasi)
                ->firstOrFail();


            $pdf = PDF::loadview('pdf.keberatan-informasi', compact('data'))->setPaper('f4', 'potrait');

            return $pdf->stream('Keberatan Informasi-' . $data->no_keberatan_informasi . '.pdf');
        }


        // dd($data);
        // return view('pdf.keberatan-informasi', compact('data'));
    }
}
