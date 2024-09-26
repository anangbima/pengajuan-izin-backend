# Pengajuan App 

## Deskripsi Singkat

Backend untuk aplikasi Pengajuan Izin 

## Instalasi

1. Clone Repository
2. Install dependensi
   
    composer install

3. Copy file .env.example
4. Konfigurasi .env: Sesuaikan konfigurasi database, aplikasi, dan lainnya di file .env.
5. jalankan Migrasi

    php artisan migrate
   
7. Jalankan seed
   
    php artisan db:seed
   
8. Jalankan server development

    php artisan serve
