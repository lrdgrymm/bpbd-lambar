@extends('layouts.app')
@section('title', 'Struktur Organisasi & Tupoksi')
@section('content')

<section class="page-title-section" style="background-image: linear-gradient(rgba(0,0,0,0.6), rgba(0,0,0,0.6)), url('{{ asset('aset/slider-2.jpg') }}');">
    <div class="container"><h1>Struktur Organisasi & Tupoksi</h1></div>
</section>
<section class="page-content-section">
    <div class="container page-content-grid">
        <article class="main-content">
            <h2>Struktur Organisasi</h2>
            <p>Berikut adalah bagan struktur organisasi BPBD Kabupaten Lampung Barat:</p>
            <img src="{{ asset('aset/struktur-organisasi.png') }}" alt="Bagan Struktur Organisasi" style="width: 100%; border: 1px solid #ddd; padding: 1rem; margin-top: 1rem;">
            <h2 style="margin-top: 2rem;">Tugas Pokok dan Fungsi</h2>
            <p>Penjelasan detail mengenai tugas pokok dan fungsi dari setiap jabatan dan bidang yang ada di dalam struktur organisasi...</p>
        </article>
        <x-news-sidebar />
    </div>
</section>
@endsection