@extends('layouts.app')

@section('title', 'Galeri Foto')

@section('content')
<section class="page-title-section" style="background-image: linear-gradient(rgba(0,0,0,0.6), rgba(0,0,0,0.6)), url('{{ asset('aset/slider-1.jpg') }}');">
    <div class="container"><h1>Galeri Foto</h1></div>
</section>

<section class="page-content-section">
    <div class="container">
        <div class="gallery-grid">
            @forelse($fotos as $foto)
                {{-- Link ini sekarang "pintar" --}}
                <a href="{{ $foto->sumber_tipe == 'upload' ? asset('storage/gallery/' . $foto->path) : $foto->path }}"
                   class="gallery-item"
                   data-fancybox="gallery"
                   data-caption="{{ $foto->judul }}">
                    <img src="{{ $foto->sumber_tipe == 'upload' ? asset('storage/gallery/' . $foto->path) : $foto->path }}" alt="{{ $foto->judul }}">
                    <div class="gallery-overlay"><span>{{ $foto->judul }}</span></div>
                </a>
            @empty
                <p class="loading-text" style="grid-column: 1 / -1;">Belum ada foto untuk ditampilkan.</p>
            @endforelse
        </div>
        {{-- Ini akan menampilkan tombol navigasi halaman 1, 2, 3, dst. --}}
        <div style="margin-top: 2rem;">
            {{ $fotos->links() }}
        </div>
    </div>
</section>
@endsection

@push('scripts')
<script>
  // Inisialisasi lightbox
  Fancybox.bind("[data-fancybox]", {});
</script>
@endpush