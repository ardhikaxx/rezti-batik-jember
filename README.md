# Rezti Batik Jember

Aplikasi e-commerce untuk penjualan produk batik dan layanan edukasi membatik.

## Fitur Utama

### Untuk Pembeli
- Registrasi dan login
- Melihat daftar produk
- Menambahkan produk ke keranjang
- Mengelola alamat pengiriman
- Melakukan pemesanan
- Melihat riwayat pesanan
- Memberikan rating pada produk
- Memesan layanan edukasi membatik

### Untuk Admin
- Mengelola data produk (tambah, ubah, hapus)
- Mengelola data pesanan
- Mengelola data pembeli
- Mengelola data admin
- Mengelola layanan edukasi

## Teknologi yang Digunakan

- **Framework:** Laravel 10
- **Bahasa Pemrograman:** PHP 8.1
- **Database:** MySQL (atau database lain yang didukung oleh Laravel)
- **Frontend:** Blade, CSS, JavaScript

## Panduan Instalasi

1.  **Clone repositori ini:**
    ```bash
    git clone https://github.com/username/rezti-batik-jember.git
    ```

2.  **Masuk ke direktori proyek:**
    ```bash
    cd rezti-batik-jember
    ```

3.  **Install dependensi Composer:**
    ```bash
    composer install
    ```

4.  **Salin file `.env.example` menjadi `.env`:**
    ```bash
    cp .env.example .env
    ```

5.  **Generate application key:**
    ```bash
    php artisan key:generate
    ```

6.  **Konfigurasi database Anda di file `.env`:**
    ```
    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=rezti_batik
    DB_USERNAME=root
    DB_PASSWORD=
    ```

7.  **Jalankan migrasi database:**
    ```bash
    php artisan migrate
    ```

8.  **(Opsional) Jalankan seeder untuk mengisi data awal:**
    ```bash
    php artisan db:seed
    ```

9.  **Jalankan server pengembangan:**
    ```bash
    php artisan serve
    ```

10. **Akses aplikasi di:** `http://127.0.0.1:8000`

## Struktur Database

Berikut adalah beberapa tabel utama dalam database:

-   `admins`: Menyimpan data admin.
-   `pembelis`: Menyimpan data pembeli.
-   `products`: Menyimpan data produk batik.
-   `carts`: Menyimpan data keranjang belanja pembeli.
-   `shipping_addresses`: Menyimpan data alamat pengiriman pembeli.
-   `orders`: Menyimpan data pesanan.
-   `order_items`: Menyimpan detail item dalam setiap pesanan.
-   `education_services`: Menyimpan data pemesanan layanan edukasi.
-   `ratings`: Menyimpan data rating produk dari pembeli.
