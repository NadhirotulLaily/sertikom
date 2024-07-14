@extends('layouts.app')

@section('title', 'Kategori Surat')

@section('content')
<div class="container">
    <h2>Kategori Surat</h2>
    <p>Berikut ini adalah kategori yang bisa digunakan untuk melabeli surat.</p>
    <p>Klik "Tambah" pada kolom aksi untuk menambahkan kategori baru.</p>

    <div class="form-group mb-3">
        <form action="{{ route('kategori.index') }}" method="GET" class="form-group search-container">
            <label for="search">Cari kategori :</label>
            <input type="text" name="search" id="search" class="form-control search-input" placeholder="Cari kategori...">
            <button type="submit" class="btn search-button">Cari!</button>
        </form>
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
                @foreach($kategori as $kat)
                    <tr>
                        <td>{{ $kat->id_kategori }}</td>
                        <td>{{ $kat->nama_kategori }}</td>
                        <td>{{ $kat->keterangan }}</td>
                        <td>
                            <button class="btn-delete">Hapus</button>
                            <a href="{{ route('kategori.edit', ['id_kategori' => $kat->id_kategori]) }}" class="btn btn-primary">Edit</a>
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
