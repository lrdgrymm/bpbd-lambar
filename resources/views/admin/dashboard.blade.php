@extends('layouts.admin')

@section('title', 'Dashboard')

@section('content')
    <h1>Selamat Datang, {{ Auth::user()->name }}!</h1>
    <p style="color: #555;">Ini adalah pusat kontrol untuk website BPBD. Silakan pilih menu di samping untuk mulai mengelola konten.</p>

    <hr style="margin: 2rem 0; border: 0; border-top: 1px solid #ddd;">

    {{-- Kartu Statistik --}}
    <div class="stat-grid">
        <div class="stat-card">
            <div class="stat-card-icon">
                <i class="fas fa-newspaper"></i>
            </div>
            <div class="stat-card-info">
                <h4>{{ $jumlah_berita }}</h4>
                <p>Total Berita</p>
            </div>
        </div>
        <div class="stat-card">
            <div class="stat-card-icon">
                <i class="fas fa-file-alt"></i>
            </div>
            <div class="stat-card-info">
                <h4>{{ $jumlah_dokumen }}</h4>
                <p>Total Dokumen</p>
            </div>
        </div>
        <div class="stat-card">
            <div class="stat-card-icon">
                <i class="fas fa-users"></i>
            </div>
            <div class="stat-card-info">
                <h4>0</h4>
                <p>Total Pegawai</p>
            </div>
        </div>
    </div>

    {{-- Tombol Aksi Cepat --}}
    <div class="quick-actions">
        <h2>Aksi Cepat</h2>
        <a href="{{ route('admin.berita.create') }}" class="news-button" style="margin-right: 1rem;">Tambah Berita Baru</a>
        <a href="{{ route('admin.dokumen.create') }}" class="news-button">Upload Dokumen Baru</a>
    </div>

@endsection