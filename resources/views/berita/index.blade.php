@extends('layouts.app')
@section('title', 'Arsip Berita')
@section('content')
<section class="page-title-section" style="background-image: linear-gradient(rgba(0,0,0,0.6), rgba(0,0,0,0.6)), url('{{ asset('aset/slider-3.jpg') }}');">
    <div class="container"><h1>Arsip Berita</h1></div>
</section>
<section class="page-content-section">
    <div class="container">
        <div class="news-grid">
            @forelse($semua_berita as $berita)
                <div class="news-card">
                    {{-- Link ini sekarang "pintar" --}}
                    <a href="{{ $berita->external_link ?: route('berita.show', $berita) }}" target="{{ $berita->external_link ? '_blank' : '_self' }}">
                        <img src="{{ asset('storage/berita/' . $berita->gambar) }}" alt="{{ $berita->judul }}">
                        <div class="news-card-content">
                            <h3><b>{{ $berita->judul }}</b></h3>
                            <p>{{ $berita->ringkasan }}</p>
                            <span class="news-button">Baca Selengkapnya</span>
                        </div>
                    </a>
                </div>
            @empty
                <p>Belum ada berita untuk ditampilkan.</p>
            @endforelse
        </div>
        <div style="margin-top: 2rem;">{{ $semua_berita->links() }}</div>
    </div>
</section>
@endsection