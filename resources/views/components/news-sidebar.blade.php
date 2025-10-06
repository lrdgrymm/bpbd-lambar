<aside class="sidebar">
    <div class="sidebar-widget">
        <h3>Berita Lainnya</h3>
        <ul class="sidebar-news-list">
            @forelse($beritaTerbaru as $berita)
                <li>
                    <a href="{{ $berita->external_link ?: route('berita.show', $berita) }}" target="{{ $berita->external_link ? '_blank' : '_self' }}">
                        <div class="sidebar-news-item">
                            <img src="{{ asset('storage/berita/' . $berita->gambar) }}" alt="{{ $berita->judul }}">
                            <div class="sidebar-news-item-content">
                                <h4>{{ $berita->judul }}</h4>
                                <small>{{ \Carbon\Carbon::parse($berita->tanggal_publikasi)->format('d M Y') }}</small>
                            </div>
                        </div>
                    </a>
                </li>
            @empty
                <li><p>Tidak ada berita lain untuk ditampilkan.</p></li>
            @endforelse
        </ul>
    </div>
</aside>