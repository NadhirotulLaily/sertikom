<?php

namespace Database\Seeders;

use App\Models\Arsip;
use App\Models\Kategori;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ArsipSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Arsip::create([
            'nomor_surat' => '2022/PD3/TU/001',
            'id_kategori' => 1, // Menggunakan id_kategori dari Pengumuman
            'judul' => 'Nota Dinas WFH',
            'waktu_pengarsipan' => now(),
        ]);

        Arsip::create([
            'nomor_surat' => '2022/PD2/TU/022',
            'id_kategori' => 2, // Menggunakan id_kategori dari Undangan
            'judul' => 'Undangan Halal Bi Halal',
            'waktu_pengarsipan' => now(),
        ]);
    }
}
