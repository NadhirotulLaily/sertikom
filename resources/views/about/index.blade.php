@extends('layouts.app')

@section('title', 'About')

@section('content')
<div class="container">
    <h2 class="text-center">About</h2>
    <div class="profile-card p-4 border rounded shadow-sm" style="width: 700px; margin: auto; border: 2px solid #000;">
        <div class="d-flex align-items-center">
            <div class="profile-img" style="width: 150px; height: 150px; overflow: hidden; border: 2px solid #000; margin-right: 20px;">
                <img src="{{ asset('assets/img/photo.jpg') }}" alt="Profile Photo" style="width: 100%; height: auto;">
            </div>
            <div>
                <p class="mb-2">Aplikasi ini dibuat oleh:</p>
                <p class="mb-1"><strong>Nama:</strong> {{ $data['nama'] }}</p>
                <p class="mb-1"><strong>Prodi:</strong> {{ $data['prodi'] }}</p>
                <p class="mb-1"><strong>NIM:</strong> {{ $data['nim'] }}</p>
                <p class="mb-0"><strong>Tanggal:</strong> {{ $data['tanggal'] }}</p>
            </div>
        </div>
    </div>
</div>
@endsection
