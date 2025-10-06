@extends('layouts.app')

@section('title', 'Pencegahan & Kesiapsiagaan')

@section('content')

{{-- Judul Halaman --}}
<section class="page-title-section" style="background-image: linear-gradient(rgba(0,0,0,0.6), rgba(0,0,0,0.6)), url('{{ asset('aset/slider-3.jpg') }}');">
    <div class="container">
        <h1>Bidang Pencegahan & Kesiapsiagaan</h1>
    </div>
</section>

{{-- Konten Utama dan Sidebar --}}
<section class="page-content-section">
    <div class="container page-content-grid">
        
        {{-- Kolom Kiri: Konten Utama --}}
        <article class="main-content">
            <h2>Fokus Utama Bidang</h2>
            <p>
                Bidang Pencegahan dan Kesiapsiagaan memiliki peran strategis sebagai garda terdepan dalam siklus penanggulangan bencana. Fokus utama kami adalah membangun budaya sadar bencana dan mengurangi tingkat risiko di masyarakat **sebelum** bencana terjadi. Kami percaya bahwa investasi terbaik dalam penanggulangan bencana adalah pada tahap pencegahan.
            </p>
            <p>
                Melalui serangkaian program yang terencana dan berkelanjutan, kami berupaya menciptakan komunitas yang tangguh, mandiri, dan siap menghadapi segala potensi ancaman bencana di Kabupaten Lampung Barat.
            </p>

            <hr style="margin: 2rem 0; border: 0; border-top: 1px solid var(--border-color);">

            <h2>Program Unggulan</h2>
            
            <div style="margin-bottom: 1.5rem;">
                <h3 style="font-size: 1.3rem; font-weight: 600;">Sosialisasi dan Edukasi Masyarakat</h3>
                <p>Menyebarluaskan informasi mengenai potensi risiko, cara-cara mitigasi, dan langkah penyelamatan diri kepada sekolah, komunitas, aparatur desa, dan masyarakat umum melalui berbagai media.</p>
            </div>
            
            <div style="margin-bottom: 1.5rem;">
                <h3 style="font-size: 1.3rem; font-weight: 600;">Pembentukan Desa Tangguh Bencana (DESTANA)</h3>
                <p>Sebuah program untuk membangun desa yang memiliki kemampuan mandiri untuk beradaptasi dan menghadapi potensi ancaman bencana, serta memulihkan diri dengan segera dari dampak bencana.</p>
            </div>
        </article>
        
        <x-news-sidebar />

    </div>
</section>

@endsection