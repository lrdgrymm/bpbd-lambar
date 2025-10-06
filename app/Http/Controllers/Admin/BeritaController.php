<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Berita;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class BeritaController extends Controller
{
    // Menampilkan daftar berita di PANEL ADMIN
    public function index()
    {
        $semua_berita = Berita::latest('tanggal_publikasi')->paginate(10);
        return view('admin.berita.index', compact('semua_berita'));
    }

    // Menampilkan form tambah berita
    public function create()
    {
        return view('admin.berita.create');
    }

    // Menyimpan berita baru
    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'isi_berita' => 'required|string',
            'gambar' => 'required|image|max:2048',
            'penulis' => 'required|string',
            'tanggal_publikasi' => 'required|date',
            'external_link' => 'nullable|url',
        ]);

        $path = $request->file('gambar')->store('berita', 'public');
        $data['gambar'] = $path;

        Berita::create([
            'judul' => $request->judul,
            'slug' => Str::slug($request->judul),
            'external_link' => $request->external_link,
            'ringkasan' => Str::limit(strip_tags($request->isi_berita), 150),
            'isi_berita' => $request->isi_berita,
            'gambar' => basename($path),
            'penulis' => $request->penulis,
            'tanggal_publikasi' => $request->tanggal_publikasi,
        ]);

        return redirect()->route('admin.berita.index')->with('success', 'Berita berhasil ditambahkan.');
    }

    // Menampilkan form edit berita
    public function edit(Berita $berita)
    {
        return view('admin.berita.edit', compact('berita'));
    }

    // Memperbarui berita di database
    public function update(Request $request, Berita $berita)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'isi_berita' => 'required|string',
            'gambar' => 'nullable|image|max:2048',
            'penulis' => 'required|string',
            'tanggal_publikasi' => 'required|date',
            'external_link' => 'nullable|url',
        ]);

        $data = [
            'judul' => $request->judul,
            'slug' => Str::slug($request->judul),
            'external_link' => $request->external_link,
            'ringkasan' => Str::limit(strip_tags($request->isi_berita), 150),
            'isi_berita' => $request->isi_berita,
            'penulis' => $request->penulis,
            'tanggal_publikasi' => $request->tanggal_publikasi,
        ];

        // Jika ada gambar baru, hapus lama lalu simpan yang baru
        if ($request->hasFile('gambar')) {
            if ($berita->gambar && Storage::exists('public/berita/' . $berita->gambar)) {
                Storage::delete('public/berita/' . $berita->gambar);
            }
            $path = $request->file('gambar')->store('berita', 'public');
            $data['gambar'] = basename($path);
        }

        $berita->update($data);

        return redirect()->route('admin.berita.index')->with('success', 'Berita berhasil diperbarui.');
    }

    public function destroy(Berita $berita)
    {
        //if ($berita->gambar || Storage::exists('public/berita/' .$berita->gambar)) {
            //Storage::disk('public')->delete('berita/' .$berita->gambar);
            dd($berita,$berita->gambar);
            Storage::delete('public/berita/' .$berita->gambar);
    //}

        $berita->delete();

        return redirect()->route('admin.berita.index')
            ->with('success', 'Berita berhasil dihapus.');
    }

   // public function destroy(Gallery $gallery) {
    //    if ($gallery->sumber_tipe == 'upload' && $gallery->path) {
       //     Storage::delete('public/gallery/' . $gallery->path);
       // }
       // $gallery->delete();
        //return redirect()->route('admin.gallery.index')->with('success', 'Item galeri berhasil dihapus.');
    //}
}
