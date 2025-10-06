@extends('layouts.admin')

@section('title', 'Upload Dokumen Baru')

@section('content')
    <h1>Upload Dokumen Baru</h1>
    <hr style="margin: 1rem 0;">

    @if ($errors->any())
        <div class="alert-danger" style="background-color: #f8d7da; color: #721c24; padding: 1rem; border-radius: 5px; margin-bottom: 1rem;">
            <strong>Error!</strong> Terdapat masalah dengan input Anda.<br><br>
            <ul>@foreach ($errors->all() as $error) <li>{{ $error }}</li> @endforeach</ul>
        </div>
    @endif

    <form action="{{ route('admin.dokumen.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group" style="margin-bottom: 1.5rem;">
            <label for="nama_dokumen">Nama Dokumen</label>
            <input type="text" id="nama_dokumen" name="nama_dokumen" value="{{ old('nama_dokumen') }}" required style="width: 100%; padding: 0.5rem;">
        </div>

        <div class="form-group" style="margin-bottom: 1.5rem;">
            <label for="kategori">Kategori</label>
            <input type="text" id="kategori" name="kategori" value="{{ old('kategori') }}" placeholder="Contoh: Perencanaan, Laporan" required style="width: 100%; padding: 0.5rem;">
        </div>

        <div class="form-group" style="margin-bottom: 1.5rem;">
            <label for="file">Pilih File (PDF, DOCX, XLSX - Maks 5MB)</label>
            <input type="file" id="file" name="file" required>
        </div>
        
        <button type="submit" class="news-button" style="border:none; cursor:pointer;">Upload Dokumen</button>
    </form>
@endsection