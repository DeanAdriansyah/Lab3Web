<?php
include "koneksi.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // -- Tambah Barang -- 
    if (isset($_POST['tambah'])) {
        $input = (object) $_POST;

        $nama = ucwords(strtolower($input->nama));
        $kategori = ucwords(strtolower($input->kategori));
        $harga_beli = $input->harga_beli;
        $harga_jual = $input->harga_jual;
        $stok = $input->stok;
        $file_gambar = $_FILES['gambar_barang'];
        $gambar = NULL;
        
        if ($file_gambar['error'] == 0) {
            $nama_gambar = str_replace(' ', '_', $file_gambar['name']);
            $path = dirname(__FILE__) . '/gambar/' . $nama_gambar;

            if (move_uploaded_file($file_gambar['tmp_name'], $path)) {
                $gambar = $nama_gambar;
            }
        }
        
        $query = "INSERT INTO data_barang (nama, kategori, harga_beli, harga_jual, stok, gambar) ";
        $query .= "VALUE ('$nama', '$kategori', '$harga_beli', '$harga_jual', '$stok', '$gambar') ";
        
        $result = mysqli_query($koneksi,$query);
        
        header('location:index.php');

        // -- Ubah Barang -- 
    } else if (isset($_POST['ubah'])) {
        $input = (object) $_POST;
        
        $nama = ucwords(strtolower($input->nama));
        $kategori = ucwords(strtolower($input->kategori));
        $harga_beli = $input->harga_beli;
        $harga_jual = $input->harga_jual;
        $stok = $input->stok;
        $file_gambar = $_FILES['gambar_barang'];
        $gambar = NULL;

        if ($file_gambar['error'] == 0) {
            $nama_gambar = str_replace(' ', '_', $file_gambar['name']);
            $path = dirname(__FILE__) . '/gambar/' . $nama_gambar;

            if (move_uploaded_file($file_gambar['tmp_name'], $path)) {
                $gambar = $nama_gambar;
            }
        }
        
        $query = "UPDATE data_barang SET nama = '$nama', kategori = '$kategori', harga_beli = '$harga_beli', harga_jual = '$harga_jual', stok = '$stok'";

        if (!empty($gambar)) {
            $query .= ", gambar = '$gambar' ";
        }
        $query .= "WHERE id_barang = $input->id_barang"; 
        $result = mysqli_query($koneksi, $query);
        
        header('location:index.php');
    }

    // -- Hapus barang --
} else if (isset($_GET['id_barang']) && $_GET['aksi'] == "hapus") {

    $id = $_GET['id_barang'];
    $query = "DELETE FROM data_barang WHERE id_barang = $id";

    $result = mysqli_query($koneksi, $query);

    header('location:index.php');
}