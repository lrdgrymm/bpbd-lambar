@extends('layouts.admin')
@section('title', 'Manajemen Pegawai')
@section('content')
    <h1>Daftar Pegawai</h1>
    <a href="{{ route('admin.pegawai.create') }}" class="news-button">Tambah Pegawai Baru</a>

    @if(session('success'))
        <div class="alert-success">{{ session('success') }}</div>
    @endif

    <table class="table">
        <thead>
            <tr>
                <th>Foto</th><th>Nama</th><th>Jabatan</th><th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($pegawais as $pegawai)
                <tr>
                    <td><img src="{{ asset('storage/pegawai/' . $pegawai->foto) }}" alt="{{ $pegawai->nama }}" width="60"></td>
                    <td>{{ $pegawai->nama }}</td>
                    <td>{{ $pegawai->jabatan }}</td>
                    <td>
                        <a href="{{ route('admin.pegawai.edit', $pegawai) }}">Edit</a>
                        <form action="{{ route('admin.pegawai.destroy', $pegawai) }}" method="POST" onsubmit="return confirm('Yakin?');" style="display: inline;">
                            @csrf @method('DELETE')
                            <button type="submit" class="btn-delete">Hapus</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr><td colspan="4">Belum ada data pegawai.</td></tr>
            @endforelse
        </tbody>
    </table>
@endsection