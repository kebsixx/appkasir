<div class="container-fluid px-4">
    <h1 class="mt-4">Pelanggan</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Pelanggan</li>
    </ol>

    <a href="?page=tambah_pelanggan" class="btn btn-primary mb-4">Tambah Data</a>
    <table class="table table-bordered">
        <tr>
            <th>Nama Pelanggan</th>
            <th>Alamat</th>
            <th>Nomor Telepon</th>
            <th>Aksi</th>
        </tr>
        <?php
        $query = mysqli_query($koneksi, "SELECT * FROM pelanggan");
        while ($pelanggan = mysqli_fetch_array($query)) {
        ?>
            <tr>
                <td><?= $pelanggan['NamaPelanggan']; ?></td>
                <td><?= $pelanggan['Alamat']; ?></td>
                <td><?= $pelanggan['NomorTelepon']; ?></td>
                <td>
                    <a href="?page=edit_pelanggan&id=<?= $pelanggan['PelangganID']; ?>" class="btn btn-warning">Edit</a>
                    <a href="?page=hapus_pelanggan&id=<?= $pelanggan['PelangganID']; ?>" class="btn btn-danger">Hapus</a>
                </td>
            </tr>
        <?php } ?>
    </table>
</div>