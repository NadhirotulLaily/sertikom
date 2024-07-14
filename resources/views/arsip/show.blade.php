@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="bg-white shadow-md rounded-lg overflow-hidden">
        <div class="p-4">
            <div class="info-box">
                <h2>Nomor: {{ $surat->nomor_surat }}</h2>
                <p class="text-sm text-gray-600 mb-2">Kategori: {{ $surat->kategori }}</p>
                <p class="text-sm text-gray-600 mb-2">Judul: {{ $surat->judul }}</p>
                <p class="text-sm text-gray-600 mb-2">Waktu Unggah: {{ $surat->waktu_pengarsipan }}</p>
            </div>
            <div class="iframe-container">
                <iframe src="{{ asset('storage/' . $surat->file_path) }}"></iframe>
            </div>
        </div>
        <div class="p-4 bg-gray-100 border-t border-gray-200 flex justify-end">
            <a href="{{ route('arsip.index') }}" class="btn btn-secondary"><< Kembali</a>
            <a href="{{ route('arsip.edit', $surat->id) }}" class="btn btn-edit ml-2">Edit/Ganti File</a>
            <a href="{{ route('arsip.download', $surat->id) }}" class="btn btn-download ml-2">Unduh</a>
        </div>
    </div>
</div>
@endsection
