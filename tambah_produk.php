<?php
if (isset($_POST['simpan'])) {
    $NamaProduk = $_POST['NamaProduk'];
    $Harga = $_POST['Harga'];
    $Stok = $_POST['Stok'];

    $query = mysqli_query($koneksi, "INSERT INTO produk (NamaProduk, Harga, Stok) VALUES ('$NamaProduk', '$Harga', '$Stok')");

    if ($query) {
        header("location: produk.php");
    } else {
        echo "<script>alert('Data gagal ditambahkan');</script>";
        echo "<script>location='?page=tambah_produk';</script>";
    }
}
?>

<div class="container-fluid px-4">
    <h1 class="mt-4">Produk</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active"><a href="?page=produk">Produk</a> > Tambah Produk</li>
    </ol>

    <form action="" method="post">
        <table class="table">
            <tr>
                <td>Nama Produk</td>
                <td><input type="text" name="NamaProduk" class="form-control" required></td>
            </tr>
            <tr>
                <td>Harga</td>
                <td><input type="text" name="Harga" class="form-control" required></td>
            </tr>
            <tr>
                <td>Stok</td>
                <td><input type="text" name="Stok" class="form-control" required></td>
            </tr>
            <tr>
                <td></td>
                <td><input type="submit" name="simpan" value="Simpan" class="btn btn-primary"></td>
            </tr>
        </table>
    </form>
</div>