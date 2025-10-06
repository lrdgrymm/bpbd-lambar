@extends('layouts.admin')

@section('title', 'Manajemen Berita')

@section('content')
    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 2rem;">
        <div></div>
        <a href="{{ route('admin.berita.create') }}" class="btn btn-primary">
            <i class="fas fa-plus"></i> Tambah Berita Baru
        </a>
    </div>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="card">
        <table class="table">
            <thead>
                <tr>
                    <th style="width: 10%;">Gambar</th>
                    <th>Judul</th>
                    <th style="width: 20%;">Tanggal Publikasi</th>
                    <th style="width: 15%;">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($semua_berita as $berita)
                    <tr>
                        <td>
                            <img src="{{ asset('storage/berita/' . $berita->gambar) }}" alt="Thumbnail" style="width: 100px; border-radius: 5px;">
                        </td>
                        <td>{{ $berita->judul }}</td>
                        <td>{{ \Carbon\Carbon::parse($berita->tanggal_publikasi)->format('d M Y') }}</td>
                        <td>
                            <a href="{{ route('admin.berita.edit', $berita) }}" class="btn btn-warning">Edit</a>
                             <form action="{{ route('admin.berita.destroy', $berita) }}" method="POST" onsubmit="return confirm('Anda yakin ingin menghapus berita ini?');" style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr><td colspan="4" style="text-align: center;">Belum ada berita.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection