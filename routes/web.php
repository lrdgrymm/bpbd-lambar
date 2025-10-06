<?php

use Illuminate\Support\Facades\Route;
use App\Models\Berita;
use App\Models\Pegawai;

// Import semua Controller yang dibutuhkan
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\BeritaController as PublicBeritaController;
use App\Http\Controllers\GalleryController as PublicGalleryController;
use App\Http\Controllers\InformasiController;

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\BeritaController as AdminBeritaController;
use App\Http\Controllers\Admin\DokumenController;
use App\Http\Controllers\Admin\PegawaiController;
use App\Http\Controllers\Admin\GalleryController as AdminGalleryController;

/*
|--------------------------------------------------------------------------
| ROUTE HALAMAN PUBLIK
|--------------------------------------------------------------------------
*/

// Halaman Utama
Route::get('/', function () {
    $beritaTerkini = Berita::latest('tanggal_publikasi')->take(6)->get();
    return view('home', ['beritaTerkini' => $beritaTerkini]);
})->name('home');

Route::get('/berita', [PublicBeritaController::class, 'index'])->name('berita.index');
Route::get('/berita/{berita:slug}', [PublicBeritaController::class, 'show'])->name('berita.show');

// Halaman Profil
Route::get('/profil/sejarah', function () { return view('profil.sejarah'); });
Route::get('/profil/struktur', function () { return view('profil.struktur'); });
Route::get('/profil/pegawai', function () {
    $pegawais = Pegawai::orderBy('nama', 'asc')->get();
    return view('profil.pegawai', ['pegawais' => $pegawais]);
});

// Halaman Bidang
Route::get('/bidang/pencegahan', function () { return view('bidang.pencegahan'); });
Route::get('/bidang/kedaruratan', function () { return view('bidang.kedaruratan'); });
Route::get('/bidang/rehabilitasi', function () { return view('bidang.rehabilitasi'); });
Route::get('/bidang/sekretariat', function () { return view('bidang.sekretariat'); });

// Halaman Gallery
Route::get('/gallery/foto', [PublicGalleryController::class, 'fotoIndex'])->name('gallery.foto');
Route::get('/gallery/video', [PublicGalleryController::class, 'videoIndex'])->name('gallery.video');

// Halaman Informasi
Route::get('/informasi/peringatan-dini', function () { return view('informasi.peringatan-dini'); });
Route::get('/informasi/dokumen', [InformasiController::class, 'dokumenIndex'])->name('informasi.dokumen');

// Halaman Lainnya
Route::get('/kontak', function () { return view('kontak'); });
Route::get('/pelayanan-publik', function () { return view('pelayanan-publik'); });


/*
|--------------------------------------------------------------------------
| ROUTE AREA ADMIN & AUTENTIKASI
|--------------------------------------------------------------------------
*/
Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/admin', fn() => redirect()->route('dashboard'));

    // Route bawaan Breeze
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Grup untuk semua URL admin
    Route::prefix('admin')->name('admin.')->group(function() {
        Route::resource('berita', AdminBeritaController::class);
        Route::resource('dokumen', DokumenController::class);
        Route::resource('pegawai', PegawaiController::class);
        Route::resource('gallery', AdminGalleryController::class);
        Route::get('dokumen/{dokumen}/download', [DokumenController::class, 'download'])->name('dokumen.download');
    });
});

// File route bawaan Breeze
require __DIR__.'/auth.php';