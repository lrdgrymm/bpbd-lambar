document.addEventListener('DOMContentLoaded', function () {
    // --- FUNGSI UNTUK DROPDOWN MENU ---
    // (Kode dropdown tidak berubah, tetap ada di sini)
    const dropdowns = document.querySelectorAll('.nav-item.dropdown');
    dropdowns.forEach(dropdown => {
        const toggle = dropdown.querySelector('.dropdown-toggle');
        toggle.addEventListener('click', function (event) {
            event.preventDefault();
            event.stopPropagation();
            const parentDropdown = this.closest('.dropdown');
            const menu = parentDropdown.querySelector('.dropdown-menu');
            const isAlreadyOpen = menu.classList.contains('show');
            closeAllDropdowns();
            if (!isAlreadyOpen) {
                menu.classList.add('show');
            }
        });
    });
    function closeAllDropdowns() {
        document.querySelectorAll('.dropdown-menu.show').forEach(menu => {
            menu.classList.remove('show');
        });
    }
    window.addEventListener('click', closeAllDropdowns);


    // --- PERBAIKAN TOTAL UNTUK HERO SLIDER ---
    const sliderWrapper = document.querySelector('.slider-wrapper');
    if (sliderWrapper) {
        let slides = document.querySelectorAll('.slide');
        const prevBtn = document.getElementById('prev-slide');
        const nextBtn = document.getElementById('next-slide');

        // 1. Trik: Duplikasi slide pertama dan terakhir
        const firstClone = slides[0].cloneNode(true);
        const lastClone = slides[slides.length - 1].cloneNode(true);
        firstClone.id = 'first-clone';
        lastClone.id = 'last-clone';
        sliderWrapper.append(firstClone);
        sliderWrapper.prepend(lastClone);

        // Update slides NodeList setelah diduplikasi
        slides = document.querySelectorAll('.slide');
        
        let currentIndex = 1; // Mulai dari slide pertama yang asli, bukan duplikat
        // Langsung posisikan di slide pertama tanpa animasi
        sliderWrapper.style.transform = `translateX(-${currentIndex * 100}%)`;

        // Fungsi untuk menggeser ke slide berikutnya
        function slideNext() {
            if (currentIndex >= slides.length - 1) return; // Mencegah klik beruntun
            currentIndex++;
            sliderWrapper.style.transition = 'transform 0.5s ease-in-out';
            sliderWrapper.style.transform = `translateX(-${currentIndex * 100}%)`;
        }
        
        // Fungsi untuk menggeser ke slide sebelumnya
        function slidePrev() {
            if (currentIndex <= 0) return; // Mencegah klik beruntun
            currentIndex--;
            sliderWrapper.style.transition = 'transform 0.5s ease-in-out';
            sliderWrapper.style.transform = `translateX(-${currentIndex * 100}%)`;
        }

        // 2. Trik: Lakukan 'teleportasi' setelah animasi selesai
        sliderWrapper.addEventListener('transitionend', () => {
            // Jika kita berada di duplikat slide pertama (di akhir)
            if (slides[currentIndex].id === 'first-clone') {
                sliderWrapper.style.transition = 'none'; // Matikan animasi
                currentIndex = 1; // Lompat ke slide pertama asli
                sliderWrapper.style.transform = `translateX(-${currentIndex * 100}%)`;
            }
            // Jika kita berada di duplikat slide terakhir (di awal)
            if (slides[currentIndex].id === 'last-clone') {
                sliderWrapper.style.transition = 'none'; // Matikan animasi
                currentIndex = slides.length - 2; // Lompat ke slide terakhir asli
                sliderWrapper.style.transform = `translateX(-${currentIndex * 100}%)`;
            }
        });
        
        // Event listener untuk tombol
        if (nextBtn && prevBtn) {
            nextBtn.addEventListener('click', slideNext);
            prevBtn.addEventListener('click', slidePrev);
        }

        // Auto slide
        setInterval(slideNext, 3000);
    }

     // --- FUNGSI UNTUK WIDGET GEMPA BUMI (MENGGUNAKAN API YANG BENAR) ---
    async function fetchGempaData() {
        const widget = document.getElementById('gempa-widget');
        if (!widget) return;
        
        // Ini adalah alamat API yang benar
        const apiUrl = 'https://data.bmkg.go.id/DataMKG/TEWS/gempabumi-terkini.json';
        
        try {
            const response = await fetch(apiUrl);
            if (!response.ok) throw new Error('Data gempa tidak dapat diakses');
            
            const data = await response.json();
            const gempa = data.Infogempa.gempa;
            
            widget.innerHTML = `
                <a href="https://www.bmkg.go.id/gempabumi/gempabumi-terkini.bmkg" target="_blank">
                    <img src="https://data.bmkg.go.id/DataMKG/TEWS/${gempa.Shakemap}" alt="Peta Gempa" class="gempa-map">
                </a>
                <div class="gempa-details">
                    <p><strong>Waktu:</strong> ${gempa.Tanggal}, ${gempa.Jam}</p>
                    <p><strong>Magnitudo:</strong> ${gempa.Magnitude} SR</p>
                    <p><strong>Kedalaman:</strong> ${gempa.Kedalaman}</p>
                    <p><strong>Lokasi:</strong> ${gempa.Wilayah}</p>
                </div>
            `;
        } catch (error) {
            widget.innerHTML = '<p class="loading-text">Gagal memuat data gempa. Silakan coba lagi nanti.</p>';
            console.error(error);
        }
    }

    // Panggil fungsi untuk mengambil data gempa
    fetchGempaData();
});

// === FUNGSI BARU UNTUK SIDEBAR ADMIN RESPONSIVE ===
const sidebar = document.querySelector('.admin-sidebar');
const sidebarToggle = document.getElementById('sidebar-toggle');
const adminContent = document.querySelector('.admin-content');

if (sidebarToggle) {
    sidebarToggle.addEventListener('click', function() {
        sidebar.classList.toggle('show');
    });

    // Opsional: Sembunyikan sidebar jika mengklik area konten
    adminContent.addEventListener('click', function() {
        if (sidebar.classList.contains('show')) {
            sidebar.classList.remove('show');
        }
    });
}