@extends('layouts.admin')

@section('title', 'Edit Dokumen')

@section('content')
    <h1>Edit Dokumen</h1>
    <hr style="margin: 1rem 0;">

    @if ($errors->any())
        <div class="alert-danger">
            <ul>@foreach ($errors->all() as $error) <li>{{ $error }}</li> @endforeach</ul>
        </div>
    @endif

    <form action="{{ route('admin.dokumen.update', $dokumen) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        
        <div class="form-group" style="margin-bottom: 1.5rem;">
            <label for="nama_dokumen">Nama Dokumen</label>
            <input type="text" id="nama_dokumen" name="nama_dokumen" value="{{ old('nama_dokumen', $dokumen->nama_dokumen) }}" required style="width: 100%; padding: 0.5rem;">
        </div>

        <div class="form-group" style="margin-bottom: 1.5rem;">
            <label for="kategori">Kategori</label>
            <input type="text" id="kategori" name="kategori" value="{{ old('kategori', $dokumen->kategori) }}" required style="width: 100%; padding: 0.5rem;">
        </div>

        <div class="form-group" style="margin-bottom: 1.5rem;">
            <label for="file">Ganti File (Opsional)</label>
            <input type="file" id="file" name="file">
            <p style="margin-top: 5px;"><small>File saat ini: {{ $dokumen->file_path }}</small></p>
        </div>
        
        <button type="submit" class="news-button" style="border:none; cursor:pointer;">Simpan Perubahan</button>
    </form>
@endsection