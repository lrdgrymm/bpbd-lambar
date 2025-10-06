@extends('layouts.admin')
@section('title', 'Manajemen Galeri')

@section('content')
    <div style="display: flex; justify-content: space-between; align-items: center;">
        <h1>Manajemen Galeri</h1>
        <a href="{{ route('admin.gallery.create') }}" class="news-button">Tambah Item Baru</a>
    </div>
    <hr style="margin: 1rem 0;">

    @if(session('success'))
        <div class="alert-success">{{ session('success') }}</div>
    @endif

    <div class="gallery-grid-admin">
        @forelse ($galleries as $item)
            <div class="gallery-item-admin">
                @if($item->tipe == 'foto')
                    <img src="{{ $item->sumber_tipe == 'upload' ? asset('storage/' . $item->path) : $item->path }}" alt="{{ $item->judul }}">
                @else
                    <div class="video-placeholder">
                        <i class="fas fa-play-circle"></i>
                        <span>Video</span>
                    </div>
                @endif
                <div class="gallery-item-info">
                    <p>{{ Str::limit($item->judul, 25) }}</p>
                    <form action="{{ route('admin.gallery.destroy', $item) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn-delete">Hapus</button>
                    </form>
                </div>
            </div>
        @empty
            <p>Belum ada item galeri.</p>
        @endforelse
    </div>

    <div style="margin-top: 2rem;">
        {{ $galleries->links() }}
    </div>
@endsection