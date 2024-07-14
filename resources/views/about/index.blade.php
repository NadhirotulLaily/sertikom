@extends('layouts.app')

@section('title', 'About')

@section('content')
<div class="container">
    <h2>About</h2>
    <div class="profile-card p-4 border rounded shadow-sm">
        <div class="d-flex align-items-center">
            <div class="profile-img">
                <i class="fas fa-user fa-3x"></i>
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