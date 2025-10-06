<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Dokumen;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage; // Penting untuk mengelola file

class DokumenController extends Controller
{
    /**
     * Menampilkan daftar semua dokumen.
     */
    public function index()
    {
        $dokumens = Dokumen::latest()->paginate(10);
        return view('admin.dokumen.index', compact('dokumens'));
    }

    /**
     * Menampilkan form untuk menambah dokumen baru.
     */
    public function create()
    {
        return view('admin.dokumen.create');
    }

    /**
     * Menyimpan dokumen baru ke database.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_dokumen' => 'required|string|max:255',
            'kategori' => 'required|string|max:100',
            'file' => 'required|file|mimes:pdf,doc,docx,xls,xlsx|max:5120', // Maks 5MB
        ]);

        // Upload file ke storage/app/public/dokumen
        $path = $request->file('file')->store('public/dokumen');

        Dokumen::create([
            'nama_dokumen' => $request->nama_dokumen,
            'kategori' => $request->kategori,
            'file_path' => basename($path), // Kita hanya simpan nama filenya
        ]);

        return redirect()->route('admin.dokumen.index')->with('success', 'Dokumen berhasil di-upload.');
    }

    /**
     * Menampilkan form untuk mengedit dokumen. (Fitur Tambahan)
     */
    public function edit(Dokumen $dokumen)
    {
        return view('admin.dokumen.edit', compact('dokumen'));
    }

    /**
     * Memperbarui data dokumen di database. (Fitur Tambahan)
     */
    public function update(Request $request, Dokumen $dokumen)
    {
        $request->validate([
            'nama_dokumen' => 'required|string|max:255',
            'kategori' => 'required|string|max:100',
            'file' => 'nullable|file|mimes:pdf,doc,docx,xls,xlsx|max:5120', // File tidak wajib saat update
        ]);

        $filePath = $dokumen->file_path;
        if ($request->hasFile('file')) {
            // Hapus file lama jika ada
            Storage::delete('public/dokumen/' . $dokumen->file_path);
            // Upload file baru
            $newPath = $request->file('file')->store('public/dokumen');
            $filePath = basename($newPath);
        }
        
        $dokumen->update([
            'nama_dokumen' => $request->nama_dokumen,
            'kategori' => $request->kategori,
            'file_path' => $filePath,
        ]);

        return redirect()->route('admin.dokumen.index')->with('success', 'Dokumen berhasil diperbarui.');
    }

    /**
     * Menghapus dokumen dari database.
     */
    public function destroy(Dokumen $dokumen)
    {
        // Hapus file dari storage
        Storage::delete('public/dokumen/' . $dokumen->file_path);
        
        // Hapus data dari database
        $dokumen->delete();
        
        return redirect()->route('admin.dokumen.index')->with('success', 'Dokumen berhasil dihapus.');
    }

    public function download(Dokumen $dokumen)
    {
        $filePath = 'public/dokumen/' . $dokumen->file_path;

        if (Storage::exists($filePath)) {
            return Storage::download($filePath, $dokumen->nama_dokumen);
        }

        return redirect()->back()->with('error', 'File tidak ditemukan.');
    }
}