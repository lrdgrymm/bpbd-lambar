<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Pegawai;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PegawaiController extends Controller
{
    public function index()
    {
        // Urut berdasarkan nama
        $pegawais = Pegawai::orderBy('nama', 'asc')->get();
        return view('admin.pegawai.index', compact('pegawais'));
    }

    public function create()
    {
        return view('admin.pegawai.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'jabatan' => 'required|string|max:255',
            'nip' => 'required|numeric|digits:18|unique:pegawais,nip',
            'foto' => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('foto')) {
        $path = $request->file('foto')->store('pegawai', 'public');
}

        Pegawai::create([
            'nama' => $request->nama,
            'jabatan' => $request->jabatan,
            'nip' => $request->nip,
            'foto' => $path, // simpan path relatif, ex: pegawai/namafile.jpg
        ]);

        return redirect()->route('admin.pegawai.index')
            ->with('success', 'Data pegawai berhasil ditambahkan.');
    }

    public function edit(Pegawai $pegawai)
    {
        return view('admin.pegawai.edit', compact('pegawai'));
    }

    public function update(Request $request, Pegawai $pegawai)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'jabatan' => 'required|string|max:255',
            'nip' => 'required|numeric|digits:18|unique:pegawais,nip,' . $pegawai->id,
            'foto' => 'nullable|image|max:2048',
        ]);

        $path = $pegawai->foto;

        if ($request->hasFile('foto')) {
            // Hapus foto lama
            if ($pegawai->foto && Storage::disk('public')->exists($pegawai->foto)) {
                Storage::disk('public')->delete($pegawai->foto);
            }

            $path = $request->file('foto')->store('pegawai', 'public');
        }

        $pegawai->update([
            'nama' => $request->nama,
            'jabatan' => $request->jabatan,
            'nip' => $request->nip,
            'foto' => $path,
        ]);

        return redirect()->route('admin.pegawai.index')
            ->with('success', 'Data pegawai berhasil diperbarui.');
    }

    
    public function destroy(Pegawai $pegawai)
    {
        if ($pegawai->foto && Storage::disk('public')->exists('pegawai/' . $pegawai->foto)) {
            Storage::disk('public')->delete('pegawai/' . $pegawai->foto);
        }

        $pegawai->delete();

        return redirect()->route('admin.pegawai.index')
            ->with('success', 'Data pegawai berhasil dihapus.');
    }
}
