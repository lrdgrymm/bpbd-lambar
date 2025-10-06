@extends('layouts.app')
@section('title', 'Sejarah & Visi Misi')
@section('content')

<section class="page-title-section" style="background-image: linear-gradient(rgba(0,0,0,0.6), rgba(0,0,0,0.6)), url('{{ asset('aset/bg-sejarah.jpg') }}');">
    <div class="container"><h1>Sejarah & Visi Misi</h1></div>
</section>
<section class="page-content-section">
    <div class="container page-content-grid">
        <article class="main-content">
            <h2>Sejarah Pembentukan</h2>
            <p>Badan Penanggulangan Bencana Daerah (BPBD) Kabupaten Lampung Barat dibentuk sebagai wujud komitmen pemerintah daerah dalam menyelenggarakan penanggulangan bencana secara serius, terencana, dan terpadu...</p>
            <h2>Visi</h2>
            <blockquote>"Terwujudnya Kabupaten Lampung Barat yang Tangguh dan Berketahanan dalam Menghadapi Bencana..."</blockquote>
            <h2>Misi</h2>
            <ol>
                <li>Meningkatkan kapasitas kelembagaan dan tata kelola penanggulangan bencana.</li>
                <li>Menyelenggarakan program edukasi dan mitigasi bencana secara berkelanjutan.</li>
                <li>Memperkuat sistem peringatan dini dalam menghadapi potensi bencana.</li>
            </ol>
        </article>
        <x-news-sidebar />
    </div>
</section>
@endsection