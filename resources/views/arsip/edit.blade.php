@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="bg-white shadow-md rounded-lg overflow-hidden">
        <div class="p-4">
            <h2 class="text-xl font-semibold mb-4">Edit Informasi Surat</h2>
            <form action="{{ route('arsip.update', $surat->id) }}" method="POST" enctype="multipart/form-data" class="space-y-4">
                @csrf
                @method('PUT')

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div class="mb-4">
                        <label for="nomor_surat" class="label-text">Nomor Surat</label>
                        <input type="text" name="nomor_surat" id="nomor_surat" value="{{ $surat->nomor_surat }}" class="form-input">
                    </div>

                    <div class="mb-4">
                        <label for="kategori" class="label-text">Kategori</label>
                        <input type="text" name="kategori" id="kategori" value="{{ $surat->kategori }}" class="form-input">
                    </div>

                    <div class="mb-4">
                        <label for="judul" class="label-text">Judul</label>
                        <input type="text" name="judul" id="judul" value="{{ $surat->judul }}" class="form-input">
                    </div>

                    <div class="mb-4">
                        <label for="file_path" class="label-text">Ganti File</label>
                        <input type="file" name="file_path" id="file_path" class="form-input">
                        @if ($surat->file_path)
                            <p class="text-sm text-gray-600 mt-2">File saat ini: <a href="{{ asset('storage/' . $surat->file_path) }}" class="text-blue-500 hover:underline">{{ $surat->file_path }}</a></p>
                        @else
                            <p class="text-sm text-gray-600 mt-2">Tidak ada file terlampir.</p>
                        @endif
                    </div>
                </div>

                <div class="flex justify-end">
                    <a href="{{ route('arsip.index') }}" class="btn btn-secondary"><< Kembali</a>
                    <button type="submit" class="form-button">Simpan Perubahan</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
