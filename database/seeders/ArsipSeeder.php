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
        // $pengumuman = Kategori::where('nama_kategori', 'Pengumuman')->first();
        // $undangan = Kategori::where('nama_kategori', 'Undangan')->first();

        // Arsip::create([
        //     'nomor_surat' => '2022/PD3/TU/001',
        //     'id_kategori' => $pengumuman->id,
        //     'judul' => 'Nota Dinas WFH',
        //     'waktu_pengarsipan' => now(),
        // ]);

        // Arsip::create([
        //     'nomor_surat' => '2022/PD2/TU/022',
        //     'id_kategori' => $undangan->id,
        //     'judul' => 'Undangan Halal Bi Halal',
        //     'waktu_pengarsipan' => now(),
        // ]);

                Arsip::create([
                'nomor_surat' => '2022/PD3/TU/001',
                'kategori' => 'pengumuman',
                'judul' => 'Nota Dinas WFH',
                'waktu_pengarsipan' => now(),
            ]);
    
            Arsip::create([
                'nomor_surat' => '2022/PD2/TU/022',
                'kategori' => 'undangan',
                'judul' => 'Undangan Halal Bi Halal',
                'waktu_pengarsipan' => now(),
            ]);
    }
}
