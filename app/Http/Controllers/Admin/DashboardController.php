<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
// Nanti kita akan panggil Model lain di sini
use App\Models\Berita; 
use App\Models\Dokumen;

class DashboardController extends Controller
{
    /**
     * Menampilkan halaman utama dashboard admin.
     */
    public function index()
    {
        // Kita hitung jumlah data untuk ditampilkan di kartu statistik
        $jumlah_berita = Berita::count();
        $jumlah_dokumen = Dokumen::count();

        // Kirim data tersebut ke view
        return view('admin.dashboard', [
            'jumlah_berita' => $jumlah_berita,
            'jumlah_dokumen' => $jumlah_dokumen,
        ]);
    }
}