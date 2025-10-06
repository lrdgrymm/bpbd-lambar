@extends('layouts.admin')

@section('title', 'Manajemen Dokumen')

@section('content')
    <div style="display: flex; justify-content: space-between; align-items: center;">
        <h1>Daftar Dokumen</h1>
        <a href="{{ route('admin.dokumen.create') }}" class="news-button">Upload Dokumen Baru</a>
    </div>
    <hr style="margin: 1rem 0;">

    @if(session('success'))
        <div class="alert-success" style="background-color: #d4edda; color: #155724; padding: 1rem; border-radius: 5px; margin-bottom: 1rem;">
            {{ session('success') }}
        </div>
    @endif

    <table class="table" style="width: 100%;">
        <thead>
            <tr>
                <th>Nama Dokumen</th>
                <th>Kategori</th>
                <th>Tanggal Upload</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($dokumens as $dokumen)
                <tr>
                    <td>{{ $dokumen->nama_dokumen }}</td>
                    <td>{{ $dokumen->kategori }}</td>
                    <td>{{ $dokumen->created_at->format('d M Y') }}</td>
                    <td>
                        {{-- PERBAIKAN ADA DI BARIS INI --}}
                        <a href="{{ route('admin.dokumen.download', $dokumen) }}">Unduh</a>
                        
                        <a href="{{ route('admin.dokumen.edit', $dokumen) }}" style="margin-left: 10px;">Edit</a>
                        
                        <form action="{{ route('admin.dokumen.destroy', $dokumen) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus dokumen ini?');" style="display: inline; margin-left: 10px;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn-delete" style="color:red; border:none; background:none; cursor:pointer;">Hapus</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="4" style="text-align: center; padding: 1rem;">
                        Belum ada dokumen yang di-upload.
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>
    
    <div style="margin-top: 2rem;">
        {{ $dokumens->links() }}
    </div>
@endsection