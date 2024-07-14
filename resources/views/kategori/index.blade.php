@extends('layouts.app')

@section('title', 'Kategori Surat')

@section('content')
<div class="container">
    <h2>Kategori Surat</h2>
    <p>Berikut ini adalah kategori yang bisa digunakan untuk melabeli surat.</p>
    <p>Klik "Tambah" pada kolom aksi untuk menambahkan kategori baru.</p>

    <div class="form-group mb-3">
        <div class="form-group search-container">
            <a>Cari kategori :</a>
            <input type="text" class="form-control search-input" placeholder="Cari kategori...">
            <button class="btn search-button">Cari!</button>
        </div>
    </div>

    <div class="table-responsive">
        <table class="table table-bordered">
            <thead class="thead-light">
                <tr>
                    <th>ID Kategori</th>
                    <th>Nama Kategori</th>
                    <th>Keterangan</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($kategoriSurat as $kategori)
                    <tr>
                        <td>{{ $kategori->id_kategori }}</td>
                        <td>{{ $kategori->nama_kategori }}</td>
                        <td>{{ $kategori->keterangan }}</td>
                        <td>
                            <button class="btn-delete">Hapus</button>
                            <a href="{{ route('kategori.edit', $kategori->id) }}" class="btn-edit">Edit</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="mt-3">
        <a href="{{ route('kategori.create') }}" class="btn btn-success">[ + ] Tambah Kategori Baru</a>
    </div>
</div>
@endsection
