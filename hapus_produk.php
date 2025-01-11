<?php
$id = $_GET['id'];
$query = mysqli_query($koneksi, "DELETE FROM produk WHERE ProdukID = '$id'");
if ($query) {
    echo "<script>alert('Data Berhasil Dihapus');</script>";
    echo "<script>location='?page=produk';</script>";
} else {
    echo "<script>alert('Data Gagal Dihapus');</script>";
    echo "<script>location='?page=produk';</script>";
}
