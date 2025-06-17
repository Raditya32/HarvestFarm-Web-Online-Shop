# 🌾 HarvestFarm - Laravel E-Commerce App

HarvestFarm adalah aplikasi e-commerce berbasis web yang dikembangkan menggunakan Laravel. Platform ini memungkinkan pengguna untuk menjual, membeli, dan mengelola produk pertanian secara efisien.

## 🚀 Fitur Unggulan

- ✨ Autentikasi & Registrasi Pengguna
- 🛒 Halaman Toko (Shop) untuk melihat dan membeli produk
- 📦 CRUD Produk (Create, Read, Update, Delete)
- 📁 Manajemen Gudang dan Stok
- 🧾 Riwayat Transaksi Pengguna
- 🖼️ Upload gambar produk
- 📊 Beranda 
- 🔒 Middleware otentikasi (auth & verified)

## 🧑‍💻 Teknologi yang Digunakan

- **Laravel 12**
- **Blade Template Engine**
- **Tailwind CSS**
- **Livewire**
- **CSS**
- **MySQL** / **SQLite**
- **Git & GitHub**

## 📂 Struktur Folder Penting

├── app/ # File logic aplikasi & model
├── config/ # Konfigurasi aplikasi
├── database/ # Seeder & migration
├── public/ # File publik (gambar, asset)
├── resources/ # View Blade & komponen
├── routes/ # Routing aplikasi (web.php)
├── storage/ # File cache, log, & upload (jangan di-push!)


## ⚙️ Instalasi Lokal

Berikut langkah-langkah untuk menjalankan proyek ini secara lokal:

# 1. Clone repositori ini
git clone https://github.com/Radit32/HarvestFarm-Web-Online-Shop.git
cd HarvestFarm

# 2. Install dependency
composer install
npm install && npm run dev

# 3. Salin file environment
cp .env.example .env

# 4. Generate APP_KEY
php artisan key:generate

# 5. Buat database & jalankan migration
php artisan migrate --seed

# 6. Jalankan server
php artisan serve




Dibuat oleh [Raditya Bagus Pradana] untuk tugas/proyek pengembangan aplikasi web e-commerce.
