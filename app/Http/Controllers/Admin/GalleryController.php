<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Gallery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class GalleryController extends Controller
{
    public function index()
    {
        $galleries = Gallery::latest()->paginate(12);
        return view('admin.gallery.index', compact('galleries'));
    }

    public function create()
    {
        return view('admin.gallery.create');
    }

    public function store(Request $request)
    {
        // 1. Validasi dasar
        $request->validate([
            'judul' => 'required|string|max:255',
            'tipe' => 'required|in:foto,video',
            'sumber_tipe' => 'required|in:upload,link',
            'keterangan' => 'nullable|string',
        ]);

        $path = null;
        // 2. Validasi & proses berdasarkan pilihan user
        if ($request->sumber_tipe == 'upload') {
            // Jika user memilih upload
            $rules = [
                'file_upload' => 'required|file|max:5120', // Maks 5MB
            ];
            // Tambahkan aturan format file berdasarkan tipe
            if ($request->tipe == 'foto') {
                $rules['file_upload'] .= '|mimes:jpeg,png,jpg,gif';
            } else {
                $rules['file_upload'] .= '|mimes:mp4,mov,avi,wmv';
            }
            $request->validate($rules);

            // Simpan file
            //$path = basename($request->file('file_upload')->store('gallery','public'));
            $path = $request->file('file_upload')->store('gallery','public');
            //$path = $request->file('gambar')->store('berita', 'public');
            //$data['gambar'] = $path;

        } else { // Jika user memilih link
            $request->validate([
                'link_url' => 'required|url',
            ]);
            $path = $request->link_url;
        }

        // 3. Simpan data ke database
        Gallery::create([
            'judul' => $request->judul,
            'tipe' => $request->tipe,
            'sumber_tipe' => $request->sumber_tipe,
            'path' => $path,
            'keterangan' => $request->keterangan,
        ]);

        return redirect()->route('admin.gallery.index')->with('success', 'Item galeri berhasil ditambahkan.');
    }

    public function destroy(Gallery $gallery)
    {
        if ($gallery->sumber_tipe == 'upload' && $gallery->path) {
            dd($gallery,$gallery->path);
            Storage::delete('public/gallery/' . $gallery->path);
        }
        $gallery->delete();
        return redirect()->route('admin.gallery.index')->with('success', 'Item galeri berhasil dihapus.');
    }
}