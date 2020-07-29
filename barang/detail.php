<?php
include '../konfigurasi/config.php';
include '../fragment/header.php';
include '../konfigurasi/function.php';
?>
    <header>
        <h1>Detail Barang</h1>
    </header>
        <?php include '../fragment/menu.php' ?>
    <main>
        <h3></h3>
        <?php
        if (isset($_GET['id'])) {
            $con = connect_db();
            $id = $_GET['id'];
            $query = "SELECT barang.*, supplier.nama FROM barang inner join supplier on barang.supplier_id = supplier.id WHERE barang.id='$id'";
            $result = execute_query($con, $query);
            $data = mysqli_fetch_array($result);
            ?>
        <table>
             <tr>
                <th>ID</th>
                <td><?= $data['id'] ?></td>
            </tr>
            <tr>
                <th>Supplier</th>
                <td><?= $data['supplier_id'] ?> - <?= $data['nama'] ?></td>
            </tr>
            <tr>
                <th>Nama Barang</th>
                <td><?= $data['nama_barang'] ?></td>
            </tr>
            <tr>
                <th>Kategori</th>
                <td><?= $data['kategori'] ?></td>
            </tr>
            <tr>
                <th>Harga</th>
                <td><?= $data['harga'] ?></td>
            </tr>
            <tr>
                <th>Stok</th>
                <td><?= $data['stok'] ?></td>
            </tr>
        </table>
    <?php
        }else{
            header("location:index.php");
        }
        ?>
    </main>
    <?php include '../fragment/footer.php'; ?>