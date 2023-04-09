<?php
$koneksi = mysqli_connect('localhost', 'root', '', 'latihan1');

if ($koneksi == false) {
    echo "Koneksi gagal";
    die();
} 

// var_dump($koneksi);