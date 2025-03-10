<?php
if (isset($_POST['simpan'])) {
    $NamaPelanggan = $_POST['NamaPelanggan'];
    $NomorTelepon = $_POST['NomorTelepon'];
    $Alamat = $_POST['Alamat'];

    $query = mysqli_query($koneksi, "INSERT INTO pelanggan (NamaPelanggan, Alamat, NomorTelepon) VALUES ('$NamaPelanggan', '$Alamat', '$NomorTelepon')");

    if ($query) {
        echo "<script>location='?page=pelanggan';</script>";
    } else {
        echo "<script>alert('Data gagal ditambahkan');</script>";
        echo "<script>location='?page=tambah_pelanggan';</script>";
    }
}
?>

<div class="container-fluid px-4">
    <h1 class="mt-4">Pelanggan</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active"><a href="?page=pelanggan">Pelanggan</a> > Tambah Pelanggan</li>
    </ol>

    <form action="" method="post">
        <table class="table">
            <tr>
                <td>Nama Pelanggan</td>
                <td><input type="text" name="NamaPelanggan" class="form-control" required></td>
            </tr>
            <tr>
                <td>Nomor Telepon</td>
                <td><input type="text" name="NomorTelepon" class="form-control" required></td>
            </tr>
            <tr>
                <td>Alamat</td>
                <td><textarea name="Alamat" id="alamat" class="form-control"></textarea></td>
            </tr>
            <tr>
                <td></td>
                <td><input type="submit" name="simpan" value="Simpan" class="btn btn-primary"></td>
            </tr>
        </table>
    </form>
</div>