<?php
$id = $_GET['id'];
$query = mysqli_query($koneksi, "DELETE FROM pelanggan WHERE PelangganID = '$id'");
if ($query) {
    echo "<script>location='?page=pelanggan';</script>";
} else {
    echo "<script>alert('Data Gagal Dihapus');</script>";
    echo "<script>location='?page=edit_pelanggan&id=$id';</script>";
}
