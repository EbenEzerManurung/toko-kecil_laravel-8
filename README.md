
# toko-kecil_laravel-8


Using HTML,CSS and Javascript
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
- akun admin: 
  'email' => 'admin@gmail.com', 
  'password'=> 'password'

- akun kasir:
  'email' => 'kasir@gmail.com',
  'password' => 'password'

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

## Screenshot 
## Login

![App Screenshot](https://github.com/EbenEzerManurung/toko-kecil_laravel-8/blob/main/screenshoot/ss_login.PNG?raw=true)



## Dashboard

![App Screenshot](https://github.com/EbenEzerManurung/toko-kecil_laravel-8/blob/main/screenshoot/ss_dashboard.PNG?raw=true)

## Edit profil akun

![App Screenshot](https://github.com/EbenEzerManurung/toko-kecil_laravel-8/blob/main/screenshoot/ss_edit%20profil.PNG?raw=true)

## Daftar member

![App Screenshot](https://github.com/EbenEzerManurung/toko-kecil_laravel-8/blob/main/screenshoot/ss_member.PNG?raw=true)

## Cetak member

![App Screenshot](https://github.com/EbenEzerManurung/toko-kecil_laravel-8/blob/main/screenshoot/ss_member_cetak.PNG?raw=true)

## Daftar kategori

![App Screenshot](https://github.com/EbenEzerManurung/toko-kecil_laravel-8/blob/main/screenshoot/ss_kategori.PNG?raw=true)

## Daftar supplier

![App Screenshot](https://github.com/EbenEzerManurung/toko-kecil_laravel-8/blob/main/screenshoot/ss_supplier.PNG?raw=true)

## Daftar produk

![App Screenshot](https://github.com/EbenEzerManurung/toko-kecil_laravel-8/blob/main/screenshoot/ss_produk.PNG?raw=true)

## Cetak produk

![App Screenshot](https://github.com/EbenEzerManurung/toko-kecil_laravel-8/blob/main/screenshoot/ss_cetak_produk.PNG?raw=true)

## Transaksi penjualan

![App Screenshot](https://github.com/EbenEzerManurung/toko-kecil_laravel-8/blob/main/screenshoot/ss_transaksi_penjualan.PNG?raw=true)

## Daftar penjualan

![App Screenshot](https://github.com/EbenEzerManurung/toko-kecil_laravel-8/blob/main/screenshoot/ss_penjualan.PNG?raw=true)

## Transaksi pembelian

![App Screenshot](https://github.com/EbenEzerManurung/toko-kecil_laravel-8/blob/main/screenshoot/ss_transaksi_pembelian.PNG?raw=true)


## Daftar pembelian

![App Screenshot](https://github.com/EbenEzerManurung/toko-kecil_laravel-8/blob/main/screenshoot/ss_pembelian.PNG?raw=true)














