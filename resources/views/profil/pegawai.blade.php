@extends('layouts.app')

@section('title', 'Data Pegawai')

@section('content')

{{-- Judul Halaman --}}
<section class="page-title-section" style="background-image: linear-gradient(rgba(0,0,0,0.6), rgba(0,0,0,0.6)), url('{{ asset('aset/slider-3.jpg') }}');">
    <div class="container">
        <h1>Data Pegawai</h1>
        <p style="opacity: 0.9;">Daftar Aparatur Sipil Negara (ASN) dan Tenaga Kontrak di Lingkungan BPBD Kabupaten Lampung Barat.</p>
    </div>
</section>

{{-- Konten Halaman --}}
<section class="page-content-section">
    <div class="container page-content-grid">
        
        {{-- Kolom Kiri: Konten Utama --}}
        <article class="main-content">
            <h2>Daftar Pegawai</h2>
            <p>Berikut adalah daftar pegawai yang bertugas di Badan Penanggulangan Bencana Daerah (BPBD) Kabupaten Lampung Barat.</p>
            
            <table class="pegawai-table">
                <thead>
                    <tr>
                        <th style="width: 5%;">No</th>
                        <th style="width: 15%;">Foto</th>
                        <th>NIP</th>
                        <th>Nama Lengkap</th>
                        <th>Jabatan</th>
                    </tr>
                </thead>
                <tbody>
                    {{-- GANTI KONTEN STATIS DENGAN KODE DINAMIS INI --}}
                    @forelse ($pegawais as $pegawai)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>
                                @if($pegawai->foto)
                                    <img src="{{ asset('storage/' . $pegawai->foto) }}" alt="{{ $pegawai->nama }}" width="120">
                                @else
                                    {{-- Tampilkan placeholder jika tidak ada foto --}}
                                    <img src="https://via.placeholder.com/60" alt="Tidak ada foto" class="pegawai-foto">
                                @endif
                            </td>
                            <td>{{ $pegawai->nip }}</td>
                            <td>{{ $pegawai->nama }}</td>
                            <td>{{ $pegawai->jabatan }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" style="text-align: center; padding: 1rem;">
                                Belum ada data pegawai untuk ditampilkan.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </article>
        
        <x-news-sidebar />

    </div>
</section>

@endsection