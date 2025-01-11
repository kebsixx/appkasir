<div class="container-fluid px-4">
    <h1 class="mt-4">Pembelian</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Pembelian</li>
    </ol>

    <a href="?page=tambah_pembelian" class="btn btn-primary mb-4">Tambah Data</a>
    <table class="table table-bordered">
        <tr>
            <th>Tanggal Penjualan</th>
            <th>Pelanggan</th>
            <th>Total Harga</th>
            <th>Aksi</th>
        </tr>
        <?php
        $query = mysqli_query($koneksi, "SELECT * FROM penjualan LEFT JOIN pelanggan ON penjualan.PelangganID = pelanggan.PelangganID");
        while ($pembelian = mysqli_fetch_array($query)) {
        ?>
            <tr>
                <td><?= $pembelian['TanggalPenjualan']; ?></td>
                <td><?= $pembelian['NamaPelanggan']; ?></td>
                <td><?= $pembelian['TotalHarga']; ?></td>
                <td>
                    <a href="?page=detail_pembelian&id=<?= $pembelian['PenjualanID']; ?>" class="btn btn-info">Detail</a>
                    <a href="?page=hapus_pembelian&id=<?= $pembelian['PenjualanID']; ?>" class="btn btn-danger">Hapus</a>
                </td>
            </tr>
        <?php } ?>
    </table>
</div>