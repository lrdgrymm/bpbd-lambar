<header class="site-header">
    <div class="container header-content">
        <a href="{{ url('/') }}" class="logo-container">
            <img src="{{ asset('aset/logo.png') }}" alt="Logo BPBD">
        </a>

        {{-- Menu Navigasi Utama (Tampil untuk semua) --}}
        <nav class="main-nav">
            <ul>
                <li class="nav-item"><a href="{{ url('/') }}" class="{{ request()->is('/') ? 'active' : '' }}">Home</a></li>
                <li class="nav-item dropdown">
                    <a class="dropdown-toggle {{ request()->is('profil/*') ? 'active' : '' }}">Profile <i class="fas fa-chevron-down"></i></a>
                    <ul class="dropdown-menu">
                        <li><a href="{{ url('profil/sejarah') }}">Sejarah & Visi Misi</a></li>
                        <li><a href="{{ url('profil/struktur') }}">Struktur Organisasi</a></li>
                        <li><a href="{{ url('profil/pegawai') }}">Data Pegawai</a></li>
                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a class="dropdown-toggle {{ request()->is('bidang/*') ? 'active' : '' }}">Bidang <i class="fas fa-chevron-down"></i></a>
                    <ul class="dropdown-menu">
                        <li><a href="{{ url('/bidang/pencegahan') }}">Pencegahan & Kesiapsiagaan</a></li>
                        <li><a href="{{ url('/bidang/kedaruratan') }}">Kedaruratan & Logistik</a></li>
                        <li><a href="{{ url('/bidang/rehabilitasi') }}">Rehabilitasi & Rekonstruksi</a></li>
                        <li><a href="{{ url('/bidang/sekretariat') }}">Sekretariat</a></li>
                    </ul>
                </li>
                <li class="nav-item"><a href="{{ url('/berita') }}" class="{{ request()->is('berita') ? 'active' : '' }}">Berita</a></li>
                <li class="nav-item dropdown">
                    <a class="dropdown-toggle {{ request()->is('gallery/*') ? 'active' : '' }}">
                        Gallery <i class="fas fa-chevron-down"></i>
                    </a>
                    <ul class="dropdown-menu">
                        <li><a href="{{ url('/gallery/foto') }}">Foto</a></li>
                        <li><a href="{{ url('/gallery/video') }}">Video</a></li>
                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a class="dropdown-toggle {{ request()->is('informasi/*') ? 'active' : '' }}">
                        Informasi <i class="fas fa-chevron-down"></i>
                    </a>
                    <ul class="dropdown-menu">
                        <li><a href="{{ url('/informasi/peringatan-dini') }}">Peringatan Dini</a></li>
                        <li><a href="{{ url('/informasi/dokumen') }}">Dokumen</a></li>
                    </ul>
                </li>
                <li class="nav-item"><a href="{{ url('/pelayanan-publik') }}" class="{{ request()->is('pelayanan-publik') ? 'active' : '' }}">Pelayanan Publik</a></li>
                <li class="nav-item"><a href="{{ url('/kontak') }}" class="{{ request()->is('kontak') ? 'active' : '' }}">Kontak Kami</a></li>
            </ul>
        </nav>

        {{-- Menu User (Hanya Tampil Jika Login) atau Kosong (Jika Guest) --}}
        <div class="user-actions">
            @auth
                <div class="nav-item dropdown">
                    <a class="dropdown-toggle">
                        {{ Auth::user()->name }} <i class="fas fa-chevron-down"></i>
                    </a>
                    <ul class="dropdown-menu">
                        <li><a href="{{ route('dashboard') }}">Dashboard</a></li>
                        <li><a href="{{ route('profile.edit') }}">Edit Profile</a></li>
                        <li>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <a href="{{ route('logout') }}" 
                                   onclick="event.preventDefault(); this.closest('form').submit();">
                                    Log Out
                                </a>
                            </form>
                        </li>
                    </ul>
                </div>
            @endauth
        </div>
    </div>
</header>