<?php
$id = $_GET['id'];

if (isset($_POST['simpan'])) {
    $NamaPelanggan = $_POST['NamaPelanggan'];
    $NomorTelepon = $_POST['NomorTelepon'];
    $Alamat = $_POST['Alamat'];

    $query = mysqli_query($koneksi, "UPDATE pelanggan SET NamaPelanggan = '$NamaPelanggan', NomorTelepon = '$NomorTelepon', Alamat = '$Alamat' WHERE PelangganID = '$id'");

    if ($query) {
        echo "<script>alert('Data Berhasil Diubah');</script>";
        echo "<script>location='?page=pelanggan';</script>";
    } else {
        echo "<script>alert('Data Gagal Diubah');</script>";
        echo "<script>location='?page=edit_pelanggan&id=$id';</script>";
    }
}

$query = mysqli_query($koneksi, "SELECT * FROM pelanggan WHERE PelangganID = '$id'");
$pelanggan = mysqli_fetch_array($query);
?>

<div class="container-fluid px-4">
    <h1 class="mt-4">Pelanggan</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active"><a href="?page=pelanggan">Pelanggan</a> > Edit Pelanggan</li>
    </ol>

    <form action="" method="post">
        <table class="table">
            <tr>
                <td>Nama Pelanggan</td>
                <td><input type="text" name="NamaPelanggan" class="form-control" required value="<?= $pelanggan['NamaPelanggan']; ?>"></td>
            </tr>
            <tr>
                <td>Nomor Telepon</td>
                <td><input type="text" name="NomorTelepon" class="form-control" required value="<?= $pelanggan['NomorTelepon']; ?>"></td>
            </tr>
            <tr>
                <td>Alamat</td>
                <td><textarea name="Alamat" class="form-control" required><?= $pelanggan['Alamat']; ?></textarea></td>
            </tr>
            <tr>
                <td></td>
                <td><input type="submit" name="simpan" value="Simpan" class="btn btn-primary"></td>
            </tr>
        </table>
    </form>
</div>