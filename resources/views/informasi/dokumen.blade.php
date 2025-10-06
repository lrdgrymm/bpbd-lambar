@extends('layouts.app')

@section('title', 'Dokumen Publik')

@section('content')

<section class="page-title-section" style="background-image: linear-gradient(rgba(0,0,0,0.6), rgba(0,0,0,0.6)), url('{{ asset('aset/bg-sejarah.jpg') }}');">
    <div class="container">
        <h1>Pusat Dokumen</h1>
        <p style="opacity: 0.9;">Unduh dokumen publik, laporan, dan materi sosialisasi resmi dari BPBD Lampung Barat.</p>
    </div>
</section>

<section class="page-content-section">
    <div class="container">
        <article class="main-content" style="width: 100%;">
            <h2>Dokumen Publik</h2>
            <p>Berikut adalah dokumen-dokumen yang dapat diakses dan diunduh oleh publik.</p>
            
            <table class="table" style="width: 100%; border-collapse: collapse; margin-top: 1.5rem; font-size: 0.95rem;">
                <thead style="background-color: #f5f5f5;">
                    <tr>
                        <th style="padding: 0.75rem; border: 1px solid #ddd; text-align: left;">Nama Dokumen</th>
                        <th style="padding: 0.75rem; border: 1px solid #ddd; text-align: left;">Kategori</th>
                        <th style="padding: 0.75rem; border: 1px solid #ddd; text-align: center;">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($dokumens as $dokumen)
                        <tr>
                            <td style="padding: 0.75rem; border: 1px solid #ddd;">{{ $dokumen->nama_dokumen }}</td>
                            <td style="padding: 0.75rem; border: 1px solid #ddd;">{{ $dokumen->kategori }}</td>
                            <td style="padding: 0.75rem; border: 1px solid #ddd; text-align: center;">
                                {{-- Link ini akan mengarah langsung ke file untuk di-download --}}
                                <a href="{{ asset('storage/dokumen/' . $dokumen->file_path) }}" class="news-button" style="padding: 0.4rem 0.8rem; font-size: 0.8rem;" target="_blank">Unduh</a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="3" style="text-align: center; padding: 1.5rem;">
                                Belum ada dokumen untuk ditampilkan.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>

            {{-- Menampilkan navigasi halaman jika data lebih dari 15 --}}
            <div style="margin-top: 2rem;">
                {{ $dokumens->links() }}
            </div>
        </article>
    </div>
</section>

@endsection