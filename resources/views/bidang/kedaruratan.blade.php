@extends('layouts.app')

@section('title', 'Kedaruratan & Logistik')

@section('content')

{{-- Judul Halaman --}}
<section class="page-title-section" style="background-image: linear-gradient(rgba(0,0,0,0.6), rgba(0,0,0,0.6)), url('{{ asset('aset/slider-1.jpg') }}');">
    <div class="container">
        <h1>Bidang Kedaruratan & Logistik</h1>
    </div>
</section>

{{-- Konten Utama dan Sidebar --}}
<section class="page-content-section">
    <div class="container page-content-grid">
        
        {{-- Kolom Kiri: Konten Utama --}}
        <article class="main-content">
            <h2>Ujung Tombak Respon Bencana</h2>
            <p>
                Bidang Kedaruratan dan Logistik adalah garda terdepan BPBD pada saat fase tanggap darurat berlangsung. Tugas kami adalah memastikan respons yang cepat, tepat, dan terkoordinasi untuk menyelamatkan jiwa, meringankan penderitaan korban, serta memenuhi kebutuhan dasar para penyintas bencana.
            </p>
            <p>
                Kecepatan dan akurasi menjadi prinsip utama kerja kami, didukung oleh manajemen logistik yang andal dan personel Tim Reaksi Cepat (TRC) yang selalu siaga 24/7.
            </p>

            <hr style="margin: 2rem 0; border: 0; border-top: 1px solid var(--border-color);">

            <h2>Lingkup Tugas</h2>
            
            <div style="margin-bottom: 1.5rem;">
                <h3 style="font-size: 1.3rem; font-weight: 600;">Kaji Cepat dan Penyelamatan</h3>
                <p>Melakukan pengkajian secara cepat dan tepat terhadap lokasi, kerusakan, kerugian, dan sumber daya. Serta melaksanakan operasi pencarian, pertolongan, dan evakuasi korban bencana.</p>
            </div>
            
            <div style="margin-bottom: 1.5rem;">
                <h3 style="font-size: 1.3rem; font-weight: 600;">Manajemen Logistik dan Peralatan</h3>
                <p>Mengelola penerimaan, penyimpanan, dan pendistribusian bantuan logistik serta peralatan penanggulangan bencana secara transparan dan akuntabel untuk memastikan bantuan sampai kepada yang membutuhkan.</p>
            </div>

             <div style="margin-bottom: 1.5rem;">
                <h3 style="font-size: 1.3rem; font-weight: 600;">Aktivasi Pos Komando (Posko)</h3>
                <p>Mendirikan dan mengoperasikan Pos Komando Lapangan sebagai pusat kendali operasi tanggap darurat untuk mengoordinasikan seluruh sumber daya yang terlibat.</p>
            </div>
        </article>
        
        {{-- Kolom Kanan: Sidebar Berita --}}
       <x-news-sidebar />

    </div>
</section>

@endsection