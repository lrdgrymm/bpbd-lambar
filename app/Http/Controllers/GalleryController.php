<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use Illuminate\Http\Request;

class GalleryController extends Controller
{
    /**
     * Menampilkan halaman galeri foto.
     */
    public function fotoIndex()
    {
        $fotos = Gallery::where('tipe', 'foto')->latest()->paginate(12); // Ambil 12 foto per halaman
        return view('gallery.foto', compact('fotos'));
    }

    /**
     * Menampilkan halaman galeri video.
     */
    public function videoIndex()
    {
        $videos = Gallery::where('tipe', 'video')->latest()->paginate(12); // Ambil 12 video per halaman
        return view('gallery.video', compact('videos'));
    }
}