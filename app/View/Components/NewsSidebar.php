<?php
namespace App\View\Components;
use App\Models\Berita;
use Illuminate\View\Component;

class NewsSidebar extends Component
{
    public $beritaTerbaru;
    public function __construct()
    {
        // Ambil 3 berita terbaru untuk sidebar
        $this->beritaTerbaru = Berita::latest('tanggal_publikasi')->take(3)->get();
    }
    public function render()
    {
        return view('components.news-sidebar');
    }
}