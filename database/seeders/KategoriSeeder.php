<?php

namespace Database\Seeders;

use App\Models\Kategori;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class KategoriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Kategori::create([
            'id_kategori' => 1,
            'nama_kategori' => 'Pengumuman',
            'keterangan' => 'Surat-surat yang terkait dengan pengumuman',
        ]);

        Kategori::create([
            'id_kategori' => 2,
            'nama_kategori' => 'Undangan',
            'keterangan' => 'Undangan rapat, Koordinasi, dlsb',
        ]);
    }
}
