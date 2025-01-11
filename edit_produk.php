<?php
$id = $_GET['id'];

if (isset($_POST['simpan'])) {
    $NamaProduk = $_POST['NamaProduk'];
    $Harga = $_POST['Harga'];
    $Stok = $_POST['Stok'];

    $query = mysqli_query($koneksi, "UPDATE produk SET NamaProduk = '$NamaProduk', Harga = '$Harga', Stok = '$Stok' WHERE ProdukID = '$id'");

    if ($query) {
        echo "<script>alert('Data Berhasil Diubah');</script>";
        echo "<script>location='?page=produk';</script>";
    } else {
        echo "<script>alert('Data Gagal Diubah');</script>";
        echo "<script>location='?page=edit_produk&id=$id';</script>";
    }
}

$query = mysqli_query($koneksi, "SELECT * FROM produk WHERE ProdukID = '$id'");
$produk = mysqli_fetch_array($query);
?>

<div class="container-fluid px-4">
    <h1 class="mt-4">Produk</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active"><a href="?page=produk">Produk</a> > Edit Produk</li>
    </ol>

    <form action="" method="post">
        <table class="table">
            <tr>
                <td>Nama Produk</td>
                <td><input type="text" name="NamaProduk" class="form-control" required value="<?= $produk['NamaProduk']; ?>"></td>
            </tr>
            <tr>
                <td>Harga</td>
                <td><input type="text" name="Harga" class="form-control" required value="<?= $produk['Harga']; ?>"></td>
            </tr>
            <tr>
                <td>Stok</td>
                <td><input type="text" name="Stok" class="form-control" required value="<?= $produk['Stok']; ?>"></td>
            </tr>
            <tr>
                <td></td>
                <td><input type="submit" name="simpan" value="Simpan" class="btn btn-primary"></td>
            </tr>
        </table>
    </form>
</div>