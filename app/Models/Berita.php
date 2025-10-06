<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Berita extends Model
{
    use HasFactory;

    /**
     * TAMBAHKAN INI:
     * Daftar kolom yang boleh diisi dari form.
     */
    // app/Models/Berita.php

    protected $fillable = [
        'judul',
        'slug',
        'external_link',
        'ringkasan',
        'isi_berita',
        'gambar',
        'penulis',
        'tanggal_publikasi',
    ];
}