@extends('layouts.app')

@section('content')
<div>
    <h2>{{ $surat->nomor }}</h2>
    <p>Kategori: {{ $surat->kategori }}</p>
    <p>Judul: {{ $surat->judul }}</p>
    <p>Waktu Unggah: {{ $surat->waktu_unggah }}</p>
    <p>
        <iframe src="{{ asset('storage/' . $surat->file_path) }}" width="600" height="400"></iframe>
    </p>
    <a href="{{ route('arsip.index') }}"><< Kembali</a>
    <a href="{{ route('arsip.edit', $surat->id) }}">Edit/Ganti File</a>
    <form action="{{ route('arsip.update', $surat->id) }}" method="post" enctype="multipart/form-data">
        @csrf
        <input type="file" name="file">
        <button type="submit">Unduh</button>
    </form>
</div>
@endsection
