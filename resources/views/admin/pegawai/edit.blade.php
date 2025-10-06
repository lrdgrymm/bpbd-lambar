@extends('layouts.admin')

@section('title', 'Edit Data Pegawai')

@section('content')
    <h1>Edit Data: {{ $pegawai->nama }}</h1>
    <hr style="margin: 1rem 0;">

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

    <form action="{{ route('admin.pegawai.update', $pegawai) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT') {{-- Method PUT untuk proses update --}}
        
        <div class="form-group">
            <label for="nama">Nama Lengkap</label>
            <input type="text" name="nama" value="{{ old('nama', $pegawai->nama) }}" required>
        </div>
        
        <div class="form-group">
            <label for="jabatan">Jabatan</label>
            <input type="text" name="jabatan" value="{{ old('jabatan', $pegawai->jabatan) }}" required>
        </div>
        
        <div class="form-group">
            <label for="nip">NIP (Wajib 18 Digit Angka)</label>
            <input type="text" name="nip" value="{{ old('nip', $pegawai->nip) }}" pattern="[0-9]{18}" maxlength="18" title="NIP harus terdiri dari 18 angka." required>
        </div>
        
        <div class="form-group">
            <label for="foto">Ganti Foto (Opsional)</label>
            <input type="file" name="foto">
            @if($pegawai->foto)
                <p style="margin-top: 10px;">Foto saat ini:</p>
                <img src="{{ asset('storage/pegawai/' . $pegawai->foto) }}" alt="Foto saat ini" width="80" style="border-radius: 50%;">
            @endif
        </div>
        
        <button type="submit" class="news-button">Update Data</button>
    </form>
@endsection