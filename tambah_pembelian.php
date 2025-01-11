<?php
if (isset($_POST['simpan'])) {
    $PelangganID = $_POST['PelangganID'];
    $produk = $_POST['Produk'];
    $total = 0;
    $TanggalPembelian = date('Y-m-d');

    $query = mysqli_query($koneksi, "INSERT INTO penjualan (PelangganID, TanggalPenjualan, TotalHarga) VALUES ('$PelangganID', '$TanggalPembelian', '$total')");
    $idTerakhir = mysqli_fetch_array(mysqli_query($koneksi, "SELECT * FROM penjualan ORDER BY PenjualanID DESC"));
    $id = $idTerakhir['PenjualanID'];

    foreach ($produk as $key => $value) {
        $pr = mysqli_fetch_array(mysqli_query($koneksi, "SELECT * FROM produk WHERE ProdukID = '$key'"));
        $sub = $pr['Harga'] * $value;
        $total += $sub;
        $query = mysqli_query($koneksi, "INSERT INTO detailpenjualan (PenjualanID, ProdukID, JumlahProduk, SubTotal) VALUES ('$id', '$key', '$value', '$sub')");
    }

    $query = mysqli_query($koneksi, "UPDATE penjualan SET TotalHarga = '$total' WHERE PenjualanID = '$id'");

    if ($query) {
        echo "<script>alert('Data berhasil ditambahkan');</script>";
        echo "<script>location='?page=pembelian';</script>";
    } else {
        echo "<script>alert('Data gagal ditambahkan');</script>";
        echo "<script>location='?page=tambah_pembelian';</script>";
    }
}
?>

<div class="container-fluid px-4">
    <h1 class="mt-4">Pembelian</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active"><a href="?page=pembelian">Pembelian</a> > Tambah Pembelian</li>
    </ol>

    <form action="" method="post">
        <table class="table">
            <tr>
                <td>Pelanggan</td>
                <td>
                    <select name="PelangganID" class="form-control" required>
                        <option value="">Pilih Pelanggan</option>
                        <?php
                        $query = mysqli_query($koneksi, "SELECT * FROM pelanggan");
                        while ($pelanggan = mysqli_fetch_array($query)) {
                        ?>
                            <option value="<?= $pelanggan['PelangganID']; ?>"><?= $pelanggan['NamaPelanggan']; ?></option>
                        <?php } ?>
                    </select>
                </td>
            </tr>
            <?php
            $produk = mysqli_query($koneksi, "SELECT * FROM produk");
            while ($data = mysqli_fetch_array($produk)) {
            ?>
                <tr>
                    <td><?= $data['NamaProduk']; ?> : <?= $data['Stok']; ?></td>
                    <td><input type="number" name="Produk[<?= $data['ProdukID']; ?>]" class="form-control" max="<?= $data['Stok'] ?>" min="0"></td>
                </tr>
            <?php } ?>
            <tr>
                <td></td>
                <td><input type="submit" name="simpan" value="Simpan" class="btn btn-primary"></td>
            </tr>
        </table>
    </form>
</div>