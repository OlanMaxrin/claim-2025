    @livewireScripts

    <!-- Optional: Alpine.js (jika diperlukan oleh Livewire) -->
    <script src="//unpkg.com/alpinejs" defer></script>
    <script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>
    <script>
        // Inisialisasi Animate On Scroll (AOS)
        AOS.init({
            duration: 800, // durasi animasi
            once: true, // animasi hanya terjadi sekali
        });

        // Skrip Carousel Produk yang Diperbaiki
        const carousel = document.getElementById('product-carousel');
        if (carousel) {
            const itemWidth = carousel.querySelector('.card').offsetWidth + 24; // lebar kartu + gap
            let scrollInterval;

            function startAutoScroll() {
                scrollInterval = setInterval(() => {
                    // Cek jika sudah di akhir carousel
                    if (carousel.scrollLeft + carousel.clientWidth >= carousel.scrollWidth - 10) {
                        // Kembali ke awal dengan mulus
                        carousel.scrollTo({
                            left: 0,
                            behavior: 'smooth'
                        });
                    } else {
                        // Geser ke item berikutnya
                        carousel.scrollBy({
                            left: itemWidth,
                            behavior: 'smooth'
                        });
                    }
                }, 3000); // ganti item setiap 3 detik
            }

            function stopAutoScroll() {
                clearInterval(scrollInterval);
            }

            // Mulai auto-scroll saat halaman dimuat
            startAutoScroll();

            // Opsional: Hentikan auto-scroll saat mouse berada di atas carousel
            carousel.addEventListener('mouseenter', stopAutoScroll);
            carousel.addEventListener('mouseleave', startAutoScroll);
        }
    </script>