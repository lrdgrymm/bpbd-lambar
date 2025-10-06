@extends('layouts.app')

@section('title', 'Galeri Video')

@section('content')
<section class="page-title-section" style="background-image: linear-gradient(rgba(0,0,0,0.6), rgba(0,0,0,0.6)), url('{{ asset('aset/slider-2.jpg') }}');">
    <div class="container"><h1>Galeri Video</h1></div>
</section>

<section class="page-content-section">
    <div class="container">
        <div class="gallery-grid">
            @forelse($videos as $video)
                <div class="video-item">
                    {{-- Ganti src dengan path dari database --}}
                    <iframe width="100%" height="100%" src="{{ $video->path }}" title="{{ $video->judul }}" frameborder="0" allowfullscreen></iframe>
                </div>
            @empty
                <p class="loading-text" style="grid-column: 1 / -1;">Belum ada video untuk ditampilkan.</p>
            @endforelse
        </div>
        {{-- Ini akan menampilkan tombol navigasi halaman 1, 2, 3, dst. --}}
        <div style="margin-top: 2rem;">
            {{ $videos->links() }}
        </div>
    </div>
</section>
@endsection