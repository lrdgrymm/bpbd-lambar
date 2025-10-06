<?php

namespace App\Http\Controllers;

use App\Models\Dokumen;
use Illuminate\Http\Request;

class InformasiController extends Controller
{
    /**
     * Menampilkan halaman daftar dokumen.
     */
    public function dokumenIndex()
    {
        $dokumens = Dokumen::latest()->paginate(15); // Ambil 15 dokumen per halaman
        return view('informasi.dokumen', compact('dokumens'));
    }

    // Nanti kita bisa tambahkan fungsi untuk halaman Peringatan Dini di sini
    // public function peringatanDiniIndex() { ... }
}