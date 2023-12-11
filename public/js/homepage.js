var swiper = new Swiper('.swiper-container', {
    slidesPerView: 1,
    spaceBetween: 10,
    pagination: {
        clickable: true,
    },
    effect: 'fade', // Menggunakan efek fade
    fadeEffect: {
        crossFade: true
    },
    autoplay: {
        delay: 3000, // Interval 2 detik
    },
});

// Inisialisasi Tippy.js
tippy('.zoom-on-hover', {
    placement: 'bottom', // Letak tooltip
    arrow: true, // Menampilkan panah tooltip
    animation: 'scale-subtle', // Efek animasi ketika muncul
    theme: 'light', // Tema tooltip
    interactive: true, // Membuat tooltip interaktif (bisa di-klik)
});

function goBack() {
    window.history.back();
}

document.addEventListener("DOMContentLoaded", function () {
    // Seleksi elemen-elemen HTML yang diperlukan
    var expandBar = document.getElementById("expandBar");
    var hiddenCards = document.getElementById("hiddenCards");
    var expandText = document.getElementById("expandText");

    // Tambahkan event listener untuk klik pada expand bar
    expandBar.addEventListener("click", function () {
        // Toggle kelas 'hidden' pada elemen sisanya
        hiddenCards.classList.toggle("hidden");

        // Ubah teks pada tombol expand
        if (hiddenCards.classList.contains("hidden")) {
            expandText.textContent = "Lihat Lebih Banyak";
        } else {
            expandText.textContent = "Tutup";
        }
    });
});