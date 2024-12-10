<?php

namespace Database\Seeders;

use App\Models\JenisInformasi;
use App\Models\SumberInformasi;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PermohonanInformasiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        // Seed untuk sumber_informasi
        $sumbers = SumberInformasi::$sumbers;
        $dataSumber = array_map(function ($sumber) {
            return [
                'jenis_sumber' => $sumber,
            ];
        }, $sumbers);

        DB::table('sumber_informasi')->insert($dataSumber);

        // Seed untuk jenis_informasi
        $jenisinf = JenisInformasi::$jenisinf;
        $dataJenis = array_map(function ($jenis) {
            return [
                'jenis_informasi' => $jenis
            ];
        }, $jenisinf);

        DB::table('jenis_informasi')->insert($dataJenis);
    }
}
