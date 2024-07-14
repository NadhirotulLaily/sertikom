@extends('layouts.app')

@section('title', 'Unggah Surat')

@section('content')
<div class="container">
    <h2>Arsip Surat >> Unggah</h2>
    <p>Unggah surat yang telah terbit pada form ini untuk diarsipkan.</p>
    <p><strong>Catatan:</strong> Gunakan file berformat PDF</p>
    
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="card">
        <div class="card-header">
            Form Unggah Surat
        </div>
        <div class="card-body">
            <form action="{{ route('arsip.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="nomor_surat">Nomor Surat</label>
                    <input type="text" id="nomor_surat" name="nomor_surat" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="kategori">Kategori</label>
                    <select id="kategori" name="kategori" class="form-control" required>
                        @foreach($kategori as $kat)
                            <option value="{{ $kat->id_kategori }}">{{ $kat->nama_kategori }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="judul">Judul</label>
                    <input type="text" id="judul" name="judul" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="file_surat">File Surat (PDF)</label>
                    <input type="file" id="file_surat" name="file_surat" class="form-control" required>
                </div>
                <div class="form-group">
                    <a href="{{ route('arsip.index') }}" class="btn btn-secondary"><< Kembali</a>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
