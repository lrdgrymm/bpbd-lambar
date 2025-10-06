@extends('layouts.app')

@section('title', 'Pelayanan Publik')

@section('content')

{{-- Judul Halaman --}}
<section class="page-title-section" style="background-image: linear-gradient(rgba(0,0,0,0.6), rgba(0,0,0,0.6)), url('{{ asset('aset/slider-1.jpg') }}');">
    <div class="container">
        <h1>Pelayanan Publik</h1>
        <p style="opacity: 0.9;">Komitmen kami dalam memberikan pelayanan terbaik bagi masyarakat Kabupaten Lampung Barat.</p>
    </div>
</section>

{{-- Konten Halaman --}}
<section class="page-content-section">
    <div class="container page-content-grid">
        
        {{-- Kolom Kiri: Konten Utama --}}
        <article class="main-content">
            <h2>Standar Pelayanan BPBD</h2>
            <p>
                Sebagai lembaga publik, BPBD Kabupaten Lampung Barat berkomitmen untuk memberikan pelayanan yang transparan, akuntabel, dan mudah diakses. Halaman ini berisi informasi mengenai jenis-jenis pelayanan yang kami sediakan untuk masyarakat dalam upaya bersama mewujudkan ketangguhan terhadap bencana.
            </p>

            <hr style="margin: 2rem 0; border: 0; border-top: 1px solid var(--border-color);">

            <h2>Jenis Pelayanan</h2>
            
            <div style="margin-bottom: 2rem; padding-left: 1.5rem; border-left: 3px solid var(--primary-color);">
                <h3 style="font-size: 1.3rem; font-weight: 600;">Laporan Kejadian Bencana (24/7)</h3>
                <p>Masyarakat dapat melaporkan kejadian bencana kapan saja melalui Pusat Pengendalian Operasi (Pusdalops) kami di nomor darurat. Tim Reaksi Cepat (TRC) akan siaga 24 jam untuk merespons dan melakukan kaji cepat awal terhadap laporan Anda.</p>
            </div>
            
            <div style="margin-bottom: 2rem; padding-left: 1.5rem; border-left: 3px solid var(--primary-color);">
                <h3 style="font-size: 1.3rem; font-weight: 600;">Permohonan Data dan Informasi Kebencanaan</h3>
                <p>Menyediakan data dan informasi terkait kebencanaan (seperti data kejadian, peta risiko, dll.) untuk keperluan penelitian, pendidikan, atau kebutuhan lainnya sesuai dengan peraturan perundang-undangan tentang keterbukaan informasi publik.</p>
            </div>
            
            <div style="margin-bottom: 2rem; padding-left: 1.5rem; border-left: 3px solid var(--primary-color);">
                <h3 style="font-size: 1.3rem; font-weight: 600;">Permohonan Sosialisasi dan Edukasi Bencana</h3>
                <p>Sekolah, institusi, atau komunitas dapat mengajukan permohonan resmi untuk penyelenggaraan kegiatan sosialisasi, pelatihan, atau simulasi kesiapsiagaan bencana di lingkungannya. Tim kami akan membantu menyusun materi dan memfasilitasi kegiatan.</p>
            </div>

            <div style="margin-bottom: 2rem; padding-left: 1.5rem; border-left: 3px solid var(--primary-color);">
                <h3 style="font-size: 1.3rem; font-weight: 600;">Konsultasi Rencana Kontingensi</h3>
                <p>Memberikan layanan konsultasi bagi instansi atau organisasi yang ingin menyusun rencana kontingensi atau Standar Operasional Prosedur (SOP) kebencanaan internal.</p>
            </div>
        </article>
        
        <x-news-sidebar />
    </div>
</section>

@endsection