<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Arsip extends Model
{
    use HasFactory;

    protected $table = 'arsip';

    protected $fillable = [
        'nomor_surat',
        'id_kategori', // sesuaikan dengan nama foreign key yang digunakan di migrasi
        'judul',
        'file_path',
        'waktu_pengarsipan',
    ];

    public function kategori()
    {
        return $this->belongsTo(Kategori::class, 'id_kategori'); // Sesuaikan dengan nama model Kategori Anda
    }
}
