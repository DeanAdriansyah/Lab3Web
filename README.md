# PEMOGRAMAAN WEB
Dean Adriansyah Asy'ari (312110286)

Teknik Informatika - UNIVERSITAS PELITA BANGSA

---
# <p align="center">Praktikum 3: PHP dan Database MySQL</p>

### Tujuan
* Mampu memahami konsep dasar Database.
* Mampu memahami konsep dasar CRUD menggunakan PHP.
* Mampu membuat program CRUD sederhana menggunakan PHP.

### Instruksi Praktikum
* Persiapkan text editor misalnya VSCode.
* Buat folder baru dengan nama lab3_php_database pada docroot webserver (htdocs)
* Ikuti langkah-langkah praktikum yang akan dijelaskan berikutnya.


---
# <p align="center">Langkah-langkah Praktikum</p>
## Persiapan
Untuk memulai membuat aplikasi CRUD sederhana, yang perlu disiapkan adalah database server
menggunakan MySQL. Pastikan MySQL Server sudah dapat dijalankan melalui XAMPP.


## Menjalankan MySQL Server
Untuk menjalankan MySQL Server dari menu XAMPP Contol.

![menambahkan_gambar](README_img/xampp_control.png)


## Mengakses MySQL Client menggunakan PHP MyAdmin
Pastikan webserver Apache dan MySQL server sudah dijalankan. Kemudian buka melalui browser:
http://localhost/phpmyadmin/

## Membuat Database: Studi Kasus Data Barang
![menambahkan_gambar](README_img/tabel_database.png)

>Membuat Tabel

``` CREATE DATABASE latihan1; ```

>Membuat Database

```CREATE TABLE data_barang (
id_barang int(10) auto_increment Primary Key,
kategori varchar(30),
nama varchar(30),
gambar varchar(100),
harga_beli decimal(10,0),
harga_jual decimal(10,0),
stok int(4)
);
```

![menambahkan_gambar](README_img/tampilan_phpmyadmin.png)

>Menambahkan Data

![menambahkan_gambar](README_img/tampilan_data_barang.png)


## Membuat Program CRUD
Buat folder lab3_php_database pada root directory web server (d:\xampp\htdocs)

![menambahkan_gambar](README_img/new_folder.png)

Kemudian untuk mengakses direktory tersebut pada web server dengan mengakses URL:
http://localhost/lab3_php_database/


## Membuat file koneksi database
Buat file baru dengan nama *koneksi.php*

```<?php
$koneksi = mysqli_connect('localhost', 'root', '', 'latihan1');

if ($koneksi == false) {
    echo "Koneksi gagal";
    die();
} 

// var_dump($koneksi);
```

Buka melalui browser untuk menguji koneksi database (untuk menyampilkan pesan koneksi berhasil,
uncomment pada perintah echo “koneksi berhasil”;

## Membuat file index untuk menampilkan data (Read)
Buat file baru dengan nama *index.php*






