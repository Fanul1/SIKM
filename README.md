# Sistem Informasi Kegiatan Mahasiswa (SIKM)
 Sistem Informasi Kegiatan Mahasiswa (SIKM) adalah aplikasi berbasis web yang dibuat untuk mengintegrasi Unit Kegiatan Mahasiswa(UKM) yang ada di USK.
 
### Anggota Kelompok
    1. T. Indris Andina (2108107010065)
    2. Fanul Nastia (2108107010029)
    3. M. Arkan Haris (2208107010022)
    4. Mila Lestari (2208107010002)

## Tahapan Menjalankan Program
 Clone terlebih dahulu repository ini 
 
    git clone https://github.com/Fanul1/SIKM.git
 
 lalu masuk ke dalam foldernya dengan perintah berikut
 
    cd SIKM
    
Install semua dependency yang dibutuhkan untuk menjalankan program

    composer install && npm install
    
Atur konfigurasi databasenya di dalam file .env, sebelum itu jalankan dibawah ini

    cp .env.example .env

## Menjalankan Website SIKM
 Akun Admin
 
    email = admin@gmail.com
    password = admin
 
 Jalankan perintah berikut untuk mengakses keynya
 
    php artisan key:generate
  
 Lalu perintah berikut untuk migrasi database sekaligus membuat akun admin
 
    php artisan migrate:fresh --seed
 
 Jalankan perintah berikut untuk menjalankan server vite
 
    npm run dev
 
 Terakhir jalankan websitenya
 
    php artisan serve
       
 Buka pada browser https//localhost:8000 untuk membuka website
