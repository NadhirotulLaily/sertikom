@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Kategori Surat >> Edit</h2>
    <p>Tambahkan atau edit data kategori. Jika sudah selesai, jangan lupa untuk mengklik tombol "Simpan".</p>
    <form action="{{ route('kategori.update', $kategori->id_kategori) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="id_kategori">ID (Auto Increment)</label>
            <input type="text" class="form-control" id="id_kategori" value="{{ $kategori->id_kategori }}" disabled>
        </div>
        <div class="form-group">
            <label for="nama_kategori">Nama Kategori</label>
            <input type="text" class="form-control" id="nama_kategori" name="nama_kategori" value="{{ $kategori->nama_kategori }}" required>
        </div>
        <div class="form-group">
            <label for="keterangan">Keterangan</label>
            <textarea class="form-control" id="keterangan" name="keterangan" rows="3" required>{{ $kategori->keterangan }}</textarea>
        </div>
        <a href="{{ route('kategori.index') }}" class="btn btn-secondary">&lt;&lt; Kembali</a>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>
@endsection
