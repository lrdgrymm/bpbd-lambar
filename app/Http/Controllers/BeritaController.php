<?php
namespace App\Http\Controllers;
use App\Models\Berita;

class BeritaController extends Controller
{
    // Method untuk menampilkan Halaman Arsip Berita
    public function index()
    {
        $semua_berita = Berita::latest('tanggal_publikasi')->paginate(9);
        return view('berita.index', compact('semua_berita'));
    }

    // Method untuk menampilkan Halaman Detail satu Berita
    public function show(Berita $berita)
    {
        // Jika berita ini punya link eksternal, langsung arahkan ke sana
        if ($berita->external_link) {
            return redirect()->away($berita->external_link);
        }

        // Jika tidak, tampilkan halaman detail di website kita
        $beritaLainnya = Berita::where('id', '!=', $berita->id)->latest('tanggal_publikasi')->take(3)->get();
        return view('berita.show', compact('berita', 'beritaLainnya'));
    }
}