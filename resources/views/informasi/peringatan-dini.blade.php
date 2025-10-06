@extends('layouts.app')

@section('title', 'Peringatan Dini')

@section('content')

<section class="page-title-section" style="background-image: linear-gradient(rgba(0,0,0,0.6), rgba(0,0,0,0.6)), url('{{ asset('aset/slider-3.jpg') }}');">
    <div class="container">
        <h1>Peringatan Dini Bencana</h1>
        <p style="opacity: 0.9;">Informasi peringatan dini cuaca dan potensi bencana lainnya di wilayah Lampung Barat.</p>
    </div>
</section>

<section class="page-content-section">
    <div class="container">
        <article class="main-content" style="width: 100%;">
            <h2>Sistem Peringatan Dini</h2>
            <p>Sistem Peringatan Dini (EWS) adalah serangkaian sistem komunikasi untuk memberitahukan akan timbulnya kejadian alam. Informasi ini disebarluaskan secara cepat dan akurat agar dapat diambil tindakan antisipasi untuk mengurangi risiko.</p>
            <hr style="margin: 2rem 0; border: 0; border-top: 1px solid var(--border-color);">
            
            <div class="alert-box" style="border: 2px solid var(--accent-color); border-radius: 8px; padding: 1.5rem; background-color: #fff3f3;">
                <h3 style="color: var(--accent-color); margin-bottom: 1rem;"><i class="fas fa-exclamation-triangle"></i> Peringatan Dini Aktif</h3>
                <p><strong>Jenis Peringatan:</strong> Potensi Hujan Lebat dan Angin Kencang</p>
                <p><strong>Wilayah Terdampak:</strong> Sebagian besar wilayah Kabupaten Lampung Barat.</p>
                <p><strong>Waktu Berlaku:</strong> 30 Juli 2025 - 01 Agustus 2025</p>
                <p><strong>Himbauan:</strong> Masyarakat diimbau untuk waspada terhadap potensi banjir, tanah longsor, dan pohon tumbang.</p>
            </div>
        </article>
    </div>
</section>

@endsection