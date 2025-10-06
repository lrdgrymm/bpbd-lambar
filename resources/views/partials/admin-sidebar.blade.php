<aside class="admin-sidebar">
    {{-- BAGIAN HEADER SIDEBAR BARU DENGAN LOGO DI ATAS --}}
    <div class="sidebar-header">
        <a href="{{ url('/') }}" target="_blank" title="Lihat Website Publik">
            <img src="{{ asset('aset/logo.png') }}" alt="Logo BPBD">
        </a>
        <h3>Admin Panel</h3>
    </div>

    {{-- Daftar Menu (Tidak Berubah) --}}
    <ul>
        <li>
            <a href="{{ route('dashboard') }}" class="{{ request()->routeIs('dashboard') ? 'active' : '' }}">
                <i class="fas fa-tachometer-alt fa-fw"></i> <span>Dashboard</span>
            </a>
        </li>
        <li>
            <a href="{{ route('admin.berita.index') }}" class="{{ request()->routeIs('admin.berita.*') ? 'active' : '' }}">
                <i class="fas fa-newspaper fa-fw"></i> <span>Manajemen Berita</span>
            </a>
        </li>
        <li>
            <a href="{{ route('admin.dokumen.index') }}" class="{{ request()->routeIs('admin.dokumen.*') ? 'active' : '' }}">
                <i class="fas fa-file-alt fa-fw"></i> <span>Manajemen Dokumen</span>
            </a>
        </li>
        <li>
            <a href="{{ route('admin.pegawai.index') }}" class="{{ request()->routeIs('admin.pegawai.*') ? 'active' : '' }}">
                <i class="fas fa-users fa-fw"></i> <span>Manajemen Pegawai</span>
            </a>
        </li>
        <li>
            <a href="{{ route('admin.gallery.index') }}" class="{{ request()->routeIs('admin.gallery.*') ? 'active' : '' }}">
                <i class="fas fa-images fa-fw"></i> <span>Manajemen Galeri</span>
            </a>
        </li>
    </ul>
</aside>