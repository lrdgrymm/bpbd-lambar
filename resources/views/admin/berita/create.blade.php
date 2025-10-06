@extends('layouts.admin')
@section('title', 'Tambah Berita Baru')

@section('content')
    <div class="main-content">
        <h2>Formulir Berita Baru</h2>
        <hr>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('admin.berita.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="judul">Judul Berita</label>
                <input type="text" id="judul" name="judul" class="form-control" value="{{ old('judul') }}" required>
            </div>
            <div class="form-group">
                <label for="isi_berita">Isi Berita Lengkap</label>
                <textarea id="isi_berita" name="isi_berita" class="form-control" rows="10" required>{{ old('isi_berita') }}</textarea>
            </div>
            <div class="form-group">
                <label for="gambar">Gambar Utama (Maks 2MB)</label>
                <input type="file" id="gambar" name="gambar" class="form-control-file" required>
            </div>
            <div class="form-group">
                <label for="penulis">Penulis</label>
                <input type="text" id="penulis" name="penulis" class="form-control" value="{{ old('penulis', Auth::user()->name) }}" required>
            </div>
            <div class="form-group">
                <label for="tanggal_publikasi">Tanggal Publikasi</label>
                <input type="date" id="tanggal_publikasi" name="tanggal_publikasi" class="form-control" value="{{ old('tanggal_publikasi', date('Y-m-d')) }}" required>
            </div>
            <div class="form-group">
                <label for="external_link">Link Sumber Eksternal (Opsional)</label>
                <input type="url" id="external_link" name="external_link" class="form-control" value="{{ old('external_link') }}" placeholder="https://contoh.com/berita">
            </div>

            <button type="submit" class="btn btn-primary">Simpan Berita</button>
        </form>
    </div>
@endsection