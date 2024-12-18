<?php

namespace Database\Factories;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\PermohonanInformasi>
 */
class PermohonanInformasiFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $currentMonth = now()->month;
        $currentYear = now()->year;

        // Ambil nomor urut terakhir
        $lastNumber = DB::table('permohonan_informasi')
            ->whereMonth('tgl_permohonan', $currentMonth)
            ->whereYear('tgl_permohonan', $currentYear)
            ->max(DB::raw('CAST(SUBSTRING(no_permohonan_informasi, -4) AS UNSIGNED)'));

        $newNumber = $lastNumber ? $lastNumber + 1 : 1;

        // Format nomor permohonan
        $noPermohonanInformasi = sprintf('ppid-informasi-%02d-%s-%04d', $currentMonth, $currentYear, $newNumber);

        return [
            'no_permohonan_informasi' => $noPermohonanInformasi,
            'id_pemohon' => rand(1, 3), // Ubah sesuai dengan data pemohon yang ada
            'rincian_informasi' => $this->faker->sentence(8),
            'tujuan_informasi' => $this->faker->sentence(5),
            'id_kategori_memperoleh' => rand(1, 5), // Sesuaikan dengan kategori
            'id_kategori_salinan' => rand(1, 3), // Sesuaikan dengan kategori
            'tgl_permohonan' => now(),
            'id_penerima' => null, // Tetap null sesuai permintaan Anda
            'pernyataan' => 1, // Semua data pernyataan = 1
        ];
    }
}
