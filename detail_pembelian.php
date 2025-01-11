<?php
$id = $_GET['id'];
$query = mysqli_query($koneksi, "SELECT * FROM penjualan LEFT JOIN pelanggan ON penjualan.PelangganID = pelanggan.PelangganID WHERE PenjualanID = '$id'");
$pembelian = mysqli_fetch_array($query);
?>

<div class="container-fluid px-4">
    <h1 class="mt-4">Detail Pembelian</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active"><a href="?page=pembelian">Pembelian</a> > Detail Pembelian</li>
    </ol>

    <form action="" method="post">
        <table class="table table-bordered">
            <tr>
                <td width="200">Nama Pelanggan</td>
                <td><?= $pembelian['NamaPelanggan']; ?></td>
            </tr>
            <?php $produk = mysqli_query($koneksi, "SELECT * FROM detailpenjualan LEFT JOIN produk ON detailpenjualan.ProdukID = produk.ProdukID WHERE PenjualanID = '$id'");
            while ($detail = mysqli_fetch_array($produk)) { ?>
                <tr>
                    <td><?= $detail['NamaProduk']; ?></td>
                    <td>Harga Satuan : <?= $detail['Harga']; ?><br> Jumlah : <?= $detail['JumlahProduk']; ?><br>Sub Total : <?= $detail['Subtotal']; ?></td>
                </tr>
            <?php } ?>
            <tr>
                <td>Total Harga</td>
                <td><?= $pembelian['TotalHarga']; ?></td>
            </tr>
        </table>
    </form>
</div>