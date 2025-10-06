@extends('layouts.app')

@section('title', 'Sekretariat')

@section('content')

<section class="page-title-section" style="background-image: linear-gradient(rgba(0,0,0,0.6), rgba(0,0,0,0.6)), url('{{ asset('aset/bg-sejarah.jpg') }}');">
    <div class="container">
        <h1>Sekretariat</h1>
    </div>
</section>

<section class="page-content-section">
    <div class="container page-content-grid">
        
        <article class="main-content">
            <h2>Motor Penggerak Organisasi</h2>
            <p>Sekretariat merupakan unit kerja yang berfungsi sebagai pusat administrasi dan pendukung utama bagi seluruh bidang di lingkungan BPBD Kabupaten Lampung Barat. Peran kami adalah memastikan kelancaran operasional organisasi dan tata kelola administrasi yang baik.</p>
            <hr style="margin: 2rem 0; border: 0; border-top: 1px solid var(--border-color);">
            <h2>Lingkup Tugas</h2>
            <h3>Perencanaan, Evaluasi, dan Pelaporan</h3>
            <p>Menyusun rencana program dan anggaran, melakukan evaluasi kinerja, serta menyusun laporan kegiatan dan keuangan secara berkala.</p>
            <h3>Administrasi Umum dan Kepegawaian</h3>
            <p>Melaksanakan urusan ketatausahaan, surat-menyurat, kearsipan, serta pengelolaan administrasi kepegawaian.</p>
            <h3>Pengelolaan Keuangan dan Aset</h3>
            <p>Melaksanakan seluruh proses administrasi keuangan dan bertanggung jawab atas inventarisasi serta pengelolaan aset milik BPBD.</p>
        </article>
        
        <x-news-sidebar />

    </div>
</section>

@endsection