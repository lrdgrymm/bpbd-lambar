@extends('layouts.admin')
@section('title', 'Tambah Pegawai Baru')
@section('content')
    <h1>Tambah Pegawai Baru</h1>

    @if ($errors->any())
        <div class="alert-danger">
            <strong>Error!</strong> Terdapat masalah dengan input Anda.<br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.pegawai.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="nama">Nama Lengkap</label>
            <input type="text" name="nama" value="{{ old('nama') }}" required>
        </div>
        <div class="form-group">
            <label for="jabatan">Jabatan</label>
            <input type="text" name="jabatan" value="{{ old('jabatan') }}" required>
        </div>
        <div class="form-group">
            <label for="nip">NIP (Wajib 18 Digit Angka)</label>
            {{-- Input ini hanya menerima angka dan dibatasi 18 karakter --}}
            <input type="text" name="nip" value="{{ old('nip') }}" pattern="[0-9]{18}" maxlength="18" title="NIP harus terdiri dari 18 angka." required>
        </div>
        <div class="form-group">
            <label for="foto">Foto</label>
            <input type="file" name="foto">
        </div>
        <button type="submit" class="news-button">Simpan Pegawai</button>
    </form>
@endsection