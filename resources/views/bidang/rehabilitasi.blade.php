@extends('layouts.app')

@section('title', 'Rehabilitasi & Rekonstruksi')

@section('content')

{{-- Judul Halaman --}}
<section class="page-title-section" style="background-image: linear-gradient(rgba(0,0,0,0.6), rgba(0,0,0,0.6)), url('{{ asset('aset/slider-2.jpg') }}');">
    <div class="container">
        <h1>Bidang Rehabilitasi & Rekonstruksi</h1>
    </div>
</section>

{{-- Konten Utama dan Sidebar --}}
<section class="page-content-section">
    <div class="container page-content-grid">
        
        <article class="main-content">
            <h2>Membangun Kembali Lebih Baik & Aman</h2>
            <p>Fase pasca-bencana adalah tahap krusial untuk memulihkan kehidupan masyarakat dan membangun kembali lingkungan yang terdampak. Bidang Rehabilitasi dan Rekonstruksi (RR) bertugas untuk merencanakan dan melaksanakan program pemulihan secara terukur dan berkelanjutan.</p>
            <hr style="margin: 2rem 0; border: 0; border-top: 1px solid var(--border-color);">
            <h2>Lingkup Tugas</h2>
            <h3>Rehabilitasi</h3>
            <p>Upaya pemulihan yang berfokus pada perbaikan layanan publik dan pengembalian kondisi sosial-ekonomi masyarakat, mencakup perbaikan sarana dasar, pemulihan psikologis, dan peningkatan fungsi pelayanan publik.</p>
            <h3>Rekonstruksi</h3>
            <p>Pembangunan kembali semua prasarana dan sarana secara permanen dengan menerapkan prinsip "Build Back Better and Safer", memastikan infrastruktur baru lebih tangguh terhadap bencana di masa depan.</p>
        </article>
        
       <x-news-sidebar />

    </div>
</section>

@endsection