<?php
include '../konfigurasi/config.php';
include '../fragment/header.php';
include '../konfigurasi/function.php';
?>
<?php include '../fragment/menu.php' ?>
<main>
    <h3>Daftar Gerai</h3>
    <table class="table table-striped">
        <tr>
            <th>ID</th>
            <th>Nama</th>
            <th>Alamat</th>
            <th>Kota</th>
            <th>Telepon</th>
        </tr>
        <?php
        $con = connect_db();
        $query = "SELECT * FROM gerai";
        $result = execute_query($con, $query);
        while ($data = mysqli_fetch_array($result)) {
            ?>
            <tr>
                <td><?= $data['id'] ?></td>
                <td><?= $data['nama'] ?></td>
                <td><?= $data['alamat'] ?></td>
                <td><?= $data['kota'] ?></td>
                <td><?= $data['telepon'] ?></td>
            </tr>
            <?php
        }
        ?>
    </table>
    <h3>Daftar Stok Barang</h3>
    <table class="table table-striped">
        <tr>
            <th>ID</th>
            <th>Kategori</th>
            <th>Nama Barang</th>
            <th>Harga</th>
            <th>Stok</th>
        </tr>
        <?php
        $con = connect_db();
        $query = "SELECT * FROM barang";
        $result = execute_query($con, $query);
        while ($barang = mysqli_fetch_array($result)) {
            ?>
            <tr>
                <td><?= $barang['id'] ?></td>
                <td><?= $barang['kategori'] ?></td>
                <td><?= $barang['nama_barang'] ?></td>
                <td><?= $barang['harga'] ?></td>
                <td><?= $barang['stok'] ?></td>
            </tr>
            <?php
        }
        ?>
    </table>
</main>
<?php include '../fragment/footer.php'; ?>