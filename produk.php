<div class="container-fluid px-4">
    <h1 class="mt-4">Produk</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Produk</li>
    </ol>

    <a href="?page=tambah_pelanggan" class="btn btn-primary mb-4">Tambah Data</a>
    <table class="table table-bordered">
        <tr>
            <th>Nama Produk</th>
            <th>Harga</th>
            <th>Stok</th>
            <th>Aksi</th>
        </tr>
        <?php
        $query = mysqli_query($koneksi, "SELECT * FROM produk");
        while ($produk = mysqli_fetch_array($query)) {
        ?>
            <tr>
                <td><?= $produk['NamaProduk']; ?></td>
                <td><?= $produk['Harga']; ?></td>
                <td><?= $produk['Stok']; ?></td>
                <td>
                    <a href="?page=edit_produk&id=<?= $produk['ProdukID']; ?>" class="btn btn-warning">Edit</a>
                    <a href="?page=hapus_produk&id=<?= $produk['ProdukID']; ?>" class="btn btn-danger">Hapus</a>
                </td>
            </tr>
        <?php } ?>
    </table>
</div>