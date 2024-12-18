<?php

namespace Database\Factories;

use App\Models\PermohonanInformasi;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\TandaBuktiPenerimaan>
 */
class TandaBuktiPenerimaanFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $permohonanId = PermohonanInformasi::count() + 1; // ID dimulai dari 1 dan bertambah secara berurutan
        return [
            'permohonan_id' => $permohonanId,
            'waktu' => now(),
            'tgl_penerimaan' => null, // Default value for 'tgl_penerimaan'
            'status' => 'Menunggu', // Default value for 'status'
        ];
    }
}
