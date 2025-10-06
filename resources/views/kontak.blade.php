@extends('layouts.app')

@section('title', 'Kontak Kami')

@section('content')

{{-- Judul Halaman --}}
<section class="page-title-section" style="background-image: linear-gradient(rgba(0,0,0,0.6), rgba(0,0,0,0.6)), url('{{ asset('aset/slider-2.jpg') }}');">
    <div class="container">
        <h1>Hubungi Kami</h1>
        <p style="opacity: 0.9;">Kami siap menerima laporan, pertanyaan, dan masukan dari Anda.</p>
    </div>
</section>

{{-- Konten Halaman --}}
<section class="page-content-section">
    <div class="container">
        <div class="contact-grid" style="display: grid; grid-template-columns: 1fr 1fr; gap: 3rem; align-items: flex-start;">
            
            {{-- Kolom Kiri: Info Kontak & Peta --}}
            <div class="contact-info">
                <h2 style="font-size: 1.8rem; color: var(--primary-color); margin-bottom: 1.5rem;">Informasi Kontak</h2>
                <div class="footer-contact" style="color: var(--text-dark); font-size: 1rem;">
                    <ul style="list-style: none; padding: 0;">
                        <li style="display: flex; align-items: flex-start; gap: 1rem; margin-bottom: 1.5rem;">
                            <i class="fas fa-map-marker-alt fa-fw" style="color: var(--primary-color); margin-top: 5px;"></i>
                            <span>Jl. Raden Intan No. 1, Liwa,<br>Lampung Barat, Lampung</span>
                        </li>
                        <li style="display: flex; align-items: flex-start; gap: 1rem; margin-bottom: 1.5rem;">
                            <i class="fas fa-phone-alt fa-fw" style="color: var(--primary-color); margin-top: 5px;"></i>
                            <span><strong>Pusdalops 24/7:</strong> (0728) 123-456</span>
                        </li>
                        <li style="display: flex; align-items: flex-start; gap: 1rem; margin-bottom: 1.5rem;">
                            <i class="fas fa-envelope fa-fw" style="color: var(--primary-color); margin-top: 5px;"></i>
                            <span>kontak@bpbd.lambar.go.id</span>
                        </li>
                        <li style="display: flex; align-items: flex-start; gap: 1rem; margin-bottom: 1.5rem;">
                            <i class="fab fa-instagram fa-fw" style="color: var(--primary-color); margin-top: 5px;"></i>
                            <span>bpbd_lampungbarat</span>
                        </li>
                    </ul>
                </div>
                <div class="map-wrapper" style="margin-top: 2rem; border-radius: 8px; overflow:hidden;">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3976.99349887556!2d104.0532293153365!3d-4.940733496603588!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e4a649d3c5f6f3d%3A0x7d2b5b3a37d8e6c7!2sKantor%20Bupati%20Lampung%20Barat!5e0!3m2!1sen!2sid!4v1672582888001!5m2!1sen!2sid" width="100%" height="350" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                </div>
            </div>

            {{-- Kolom Kanan: Formulir Kontak --}}
            <div class="contact-form main-content">
                <h2>Kirim Pesan Langsung</h2>
                <form action="#" method="POST">
                    <div class="form-group" style="margin-bottom: 1.5rem;">
                        <label for="name" style="display: block; font-weight: 600; margin-bottom: 0.5rem;">Nama Lengkap</label>
                        <input type="text" id="name" name="name" required style="width: 100%; padding: 0.75rem; border: 1px solid var(--border-color); border-radius: 5px; font-family: 'Poppins', sans-serif; font-size: 1rem;">
                    </div>
                    <div class="form-group" style="margin-bottom: 1.5rem;">
                        <label for="email" style="display: block; font-weight: 600; margin-bottom: 0.5rem;">Alamat Email</label>
                        <input type="email" id="email" name="email" required style="width: 100%; padding: 0.75rem; border: 1px solid var(--border-color); border-radius: 5px;">
                    </div>
                    <div class="form-group" style="margin-bottom: 1.5rem;">
                        <label for="message" style="display: block; font-weight: 600; margin-bottom: 0.5rem;">Pesan Anda</label>
                        <textarea id="message" name="message" rows="6" required style="width: 100%; padding: 0.75rem; border: 1px solid var(--border-color); border-radius: 5px; font-family: 'Poppins', sans-serif; font-size: 1rem;"></textarea>
                    </div>
                    <button type="submit" class="news-button" style="border: none; cursor: pointer;">Kirim Pesan</button>
                </form>
            </div>
        </div>
    </div>
</section>

@endsection