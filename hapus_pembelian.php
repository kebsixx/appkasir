<?php
$id = $_GET['id'];
$query = mysqli_query($koneksi, "DELETE FROM penjualan WHERE PenjualanID = '$id'");
if ($query) {
    echo "<script>alert('Data berhasil dihapus');</script>";
    echo "<script>location='?page=pembelian';</script>";
} else {
    echo "<script>alert('Data gagal dihapus');</script>";
    echo "<script>location='?page=pembelian';</script>";
}
