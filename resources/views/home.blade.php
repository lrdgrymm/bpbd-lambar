@extends('layouts.app')
@section('title', 'Beranda')
@section('content')

<section class="hero-slider">
    <div class="slider-wrapper">
        <div class="slide active" style="background-image: linear-gradient(rgba(0,0,0,0.5), rgba(0,0,0,0.5)), url('{{ asset('aset/slider-1.jpg') }}');">
            <div class="container"><h1>Tanggap, Tangkas, Tangguh</h1><p>BPBD Lampung Barat hadir untuk membangun resiliensi...</p></div>
        </div>
        <div class="slide" style="background-image: linear-gradient(rgba(0,0,0,0.5), rgba(0,0,0,0.5)), url('{{ asset('aset/slider-2.jpg') }}');">
            <div class="container"><h1>Edukasi & Mitigasi</h1><p>Mengenali ancaman adalah langkah pertama...</p></div>
        </div>
        <div class="slide" style="background-image: linear-gradient(rgba(0,0,0,0.5), rgba(0,0,0,0.5)), url('{{ asset('aset/slider-3.jpg') }}');">
            <div class="container"><h1>Kesiapsiagaan Komunitas</h1><p>Gotong royong dan kesiapan komunitas...</p></div>
        </div>
    </div>
    <button class="slider-nav prev" id="prev-slide">&#10094;</button>
    <button class="slider-nav next" id="next-slide">&#10095;</button>
</section>

<section class="monitoring-section">
    <div class="container">
        <h2 class="section-title">Monitoring Bencana</h2>
        <div class="monitoring-grid">
            <div class="monitoring-box">
                <h3>Gempa Bumi Terkini</h3>
                <div class="box-content" id="gempa-widget"><p class="loading-text">Memuat data gempa...</p></div>
            </div>
            <div class="monitoring-box">
                <h3>Prakiraan Cuaca</h3>
                <div class="box-content tableau-container"><tableau-viz id='tableau-viz' src='https://visklim.bmkg.go.id/views/PDIE/PDCurahHujanTinggi' toolbar='bottom' device='desktop'></tableau-viz></div>
            </div>
            <div class="monitoring-box">
                <h3>Prediksi Daerah Banjir</h3>
                <div class="box-content iframe-container"><iframe src="https://visklim.bmkg.go.id/views/DashboardBulanan__Dasarian/PrakiraanDasarian?:embed=y&:showVizHome=no&:host_url=https%3A%2F%2Fvisklim.bmkg.go.id%2F&:embed_code_version=3&:tabs=no&:toolbar=no" frameborder="0"></iframe></div>
            </div>
        </div>
    </div>
</section>

<section class="news-section">
    <div class="container">
        <h2 class="section-title">Berita Terkini</h2>
        <div class="news-grid">

            {{-- GANTI KONTEN STATIS DENGAN KODE DINAMIS INI --}}
            @forelse($beritaTerkini as $berita)
                <div class="news-card">
                    <a href="{{ $berita->external_link ?: route('berita.show', $berita) }}" 
                        target="{{ $berita->external_link ? '_blank' : '_self' }}">
                        <img src="{{ asset('storage/berita/' . $berita->gambar) }}" alt="{{ $berita->judul }}">
                        <div class="news-card-content">
                            <h3><b>{{ $berita->judul }}</b></h3>
                            <p>{{ $berita->ringkasan }}</p>
                            <span class="news-button">Cek Berita</span>
                        </div>
                    </a>
                </div>
            @empty
                {{-- Ini akan tampil jika tidak ada berita sama sekali di database --}}
                <p style="text-align: center; grid-column: 1 / -1;">Belum ada berita untuk ditampilkan.</p>
            @endforelse
            
        </div>
        <div class="see-all-container">
            <a href="{{ url('/berita') }}" class="see-all-link">Lihat Semua Berita &rarr;</a>
        </div>
    </div>
</section>
@endsection