@extends('layouts.app')

@section('title', 'Arsip Surat')

@section('content')
<div class="container">
    <h2>Arsip Surat</h2>
    <p>Berikut ini adalah surat-surat yang telah terbit dan diarsipkan. </p>
    <p>Klik "Lihat" pada kolom aksi untuk menampilkan surat.</p>

    <div class="form-group mb-3">
        <form action="{{ route('arsip.index') }}" method="GET" class="form-group search-container">
            <label for="search">Cari surat :</label>
            <input type="text" name="search" id="search" class="form-control search-input" placeholder="Cari surat...">
            <button type="submit" class="btn search-button">Cari!</button>
        </form>
    </div>
    <div class="table-responsive">
        <table class="table table-bordered">
            <thead class="thead-light">
                <tr>
                    <th>Nomor Surat</th>
                    <th>Kategori</th>
                    <th>Judul</th>
                    <th>Waktu Pengarsipan</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($arsips as $arsip)
                <tr>
                    <td>{{ $arsip->nomor_surat }}</td>
                    <td>{{ $arsip->kategori}}</td>
                    <td>{{ $arsip->judul }}</td>
                    <td>{{ $arsip->waktu_pengarsipan }}</td>
                    <td>
                        <button type="button" class="btn btn-danger btn-delete" data-toggle="modal" data-target="#confirmDelete{{ $arsip->id }}">
                            Hapus
                        </button>

                        <a href="{{ route('arsip.download', $arsip->id) }}" class="btn btn-primary btn-download">Unduh</a>
                        <a href="{{ route('arsip.show', $arsip->id) }}" class="btn btn-success btn-view">Lihat >></a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <a href="{{ route('arsip.create') }}" class="btn btn-secondary mt-3">Arsipkan Surat</a>
</div>

<!-- Modal -->
@foreach($arsips as $arsip)
<div class="modal fade" id="confirmDelete{{ $arsip->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Konfirmasi Hapus</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Apakah Anda yakin ingin menghapus arsip ini?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                <form action="{{ route('arsip.destroy', $arsip->id) }}" method="POST" class="delete-form">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Hapus</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endforeach

@endsection
