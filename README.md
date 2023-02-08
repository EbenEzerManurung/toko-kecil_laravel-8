<p align="center">
    

## Tentang Aplikasi

Toko kecil merupakan sebuah website yang digunakan untuk mengelola transaksi pada sebuah toko. Aplikasi ini dibuat menggunakan Laravel 8 dan minimal PHP 7.4 olehkarena itu jika pada saat proses instalasi terdapat error karena versi dari PHP yang tidak support.

### Beberapa Fitur yang tersedia:
- Manajemen Kategori Produk
- Manajemen Produk
  - Multiple Delete
  - Cetak Barcode
- Manajemen Member atau Anggota
  - Cetak Kartu Member
- Manajemen Supplier
- Transaksi Pengeluaran
- Transaksi Pembelian
- Transaksi Penjualan
- Laporan Pendapatan atau Laba & Rugi
  - Bulanan
  - Harian
  - Custom Tanggal
- Custom Tipe Nota
  - Nota Besar
  - Nota Kecil / Thermal Nota
- Manajemen User dan Profil
- Pengaturan Toko
  - Identitas
  - Upload Desain Kartu Member
  - Setting Diskon Member
- User (Administrator, Kasir)
- Grafik ChartJS pada Dashboard

## Instalasi
#### Via Git
```bash
git clone https://github.com/EbenEzerManurung/toko-kecil_laravel-8.git
```


### Setup Aplikasi
Jalankan perintah 
```bash
composer update
```
atau:
```bash
composer install
```
Copy file .env dari .env.example
```bash
cp .env.example .env
```
Konfigurasi file .env
```bash
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=db_toko
DB_USERNAME=root
DB_PASSWORD=
```
Generate key
```bash
php artisan key:generate
```
Migrate database
```bash
php artisan migrate
```
Seeder table User, Pengaturan
```bash
php artisan db:seed
```
Menjalankan aplikasi
```bash
php artisan serve
```

## License

[MIT license](https://opensource.org/licenses/MIT)
