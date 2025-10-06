<footer class="site-footer">
    <div class="container">
        <div class="footer-grid">
            
            {{-- Kolom 1: Tentang BPBD --}}
            <div class="footer-about">
                <h4>Tentang BPBD Lampung Barat</h4>
                <p>Lembaga pemerintah non-departemen yang melaksanakan tugas penanggulangan bencana di daerah secara terintegrasi, meliputi pra-bencana, saat tanggap darurat, dan pasca-bencana.</p>
            </div>

            {{-- Kolom 2: Tautan Terkait --}}
            <div class="footer-links">
                <h4>Tautan Terkait</h4>
                <ul>
                    <li><a href="https://www.bmkg.go.id" target="_blank" rel="noopener noreferrer">BMKG Indonesia</a></li>
                    <li><a href="https://www.bnpb.go.id" target="_blank" rel="noopener noreferrer">BNPB Indonesia</a></li>
                    <li><a href="https://lampungbaratkab.go.id" target="_blank" rel="noopener noreferrer">Pemkab Lampung Barat</a></li>
                    <li><a href="{{ url('/berita') }}">Berita Bencana</a></li>
                    <li><a href="{{ url('/informasi/dokumen') }}">Dokumen Publik</a></li>
                </ul>
            </div>

            {{-- Kolom 3: Hubungi Kami --}}
            <div class="footer-contact">
                <h4>Hubungi Kami</h4>
                <ul>
                    <li><i class="fas fa-map-marker-alt"></i> <span>Jl. Raden Intan No. 1, Liwa, Lampung Barat</span></li>
                    <li><i class="fas fa-phone-alt"></i> <span><strong>Pusdalops 24/7:</strong> (0728) 123-456</span></li>
                    <li><i class="fab fa-whatsapp"></i> <span>+62 812 3456 7890</span></li>
                    <li><i class="fas fa-envelope"></i> <span>kontak@bpbd.lambar.go.id</span></li>
                    <li><i class="fab fa-instagram"></i> <span>bpbd_lampungbarat</span></li>
                </ul>
            </div>

        </div>
    </div>
    <div class="footer-bottom">
        <p>Copyright © {{ date('Y') }} BPBD Kabupaten Lampung Barat. Seluruh Hak Cipta Dilindungi.</p>
        <p>Design By Narest Universitas Lampung</p>
    </div>
</footer>