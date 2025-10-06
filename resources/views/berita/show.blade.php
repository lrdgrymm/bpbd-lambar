@extends('layouts.app')
@section('title', $berita->judul)
@section('content')
<section class="page-content-section">
    <div class="container page-content-grid">
        <article class="main-content">
            <h1>{{ $berita->judul }}</h1>
            <p style="color: #666; margin-bottom: 1.5rem;"><small>Oleh: {{ $berita->penulis }} | {{ \Carbon\Carbon::parse($berita->tanggal_publikasi)->format('d F Y') }}</small></p>
            <img src="{{ asset('storage/berita/' . $berita->gambar) }}" alt="{{ $berita->judul }}" style="width:100%; border-radius: 8px; margin-bottom: 1.5rem;">
            <div class="article-body" style="font-size: 1.1rem; line-height: 1.8;">{!! nl2br(e($berita->isi_berita)) !!}</div>
        </article>
        <aside class="sidebar">
            <div class="sidebar-widget">
                <h3>Berita Lainnya</h3>
                <ul class="sidebar-news-list">
                    @forelse($beritaLainnya as $item)
                        <li><a href="{{ $item->external_link ?: route('berita.show', $item) }}" target="{{ $item->external_link ? '_blank' : '_self' }}"><div class="sidebar-news-item"><img src="{{ asset('storage/berita/' . $item->gambar) }}" alt="Thumbnail"><div><h4>{{ $item->judul }}</h4><small>{{ \Carbon\Carbon::parse($item->tanggal_publikasi)->format('d M Y') }}</small></div></div></a></li>
                    @empty
                        <li><p>Tidak ada berita lain.</p></li>
                    @endforelse
                </ul>
            </div>
        </aside>
    </div>
</section>
@endsection