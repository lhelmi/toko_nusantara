<?php
include '../konfigurasi/config.php';
include '../fragment/header.php';
include '../konfigurasi/function.php';
?>
    <header>
        <h1>Detail Supplier</h1>
    </header>
        <?php include '../fragment/menu.php' ?>
    <main>
        <h3></h3>
        <?php
        if (isset($_GET['id'])) {
            $con = connect_db();
            $id = $_GET['id'];
            $query = "SELECT * FROM supplier WHERE id='$id'";
            $result = execute_query($con, $query);
            $data = mysqli_fetch_array($result);
            ?>
        <table>
             <tr>
                <th>ID</th>
                <td><?= $data['id'] ?></td>
            </tr>
            <tr>
                <th>Nama</th>
                <td><?= $data['nama'] ?></td>
            </tr>
            <tr>
                <th>Alamat</th>
                <td><?= $data['alamat'] ?></td>
            </tr>
            <tr>
                <th>Kota</th>
                <td><?= $data['kota'] ?></td>
            </tr>
            <tr>
                <th>telepon</th>
                <td><?= $data['telepon'] ?></td>
            </tr>
        </table>

    <h3><a class="btn btn-success" role="button" href="../barang/tambah.php?id=<?= $data['id'] ?>" style="margin-bottom: 20px">tambah barang</a></h3>
    
    <table class="table table-striped">
        <tr>
            <th>ID</th>
            <th>Kategori</th>
            <th>Nama Barang</th>
            <th>Harga</th>
            <th>Stok</th>
            <th>Aksi</th>
        </tr>
        <?php
        $con = connect_db();
        $query = "SELECT * FROM barang where supplier_id = '$id'";
        $result = execute_query($con, $query);
        while ($barang = mysqli_fetch_array($result)) {
            ?>
            <tr>
                <td><?= $barang['id'] ?></td>
                <td><?= $barang['kategori'] ?></td>
                <td><?= $barang['nama_barang'] ?></td>
                <td><?= $barang['harga'] ?></td>
                <td><?= $barang['stok'] ?></td>
                <td>
                    <a class="btn btn-light" role="button" href="../barang/detail.php?id=<?= $barang['id'] ?>">
                        detail</a>
                    <a class="btn btn-warning" role="button" href="../barang/edit.php?id=<?= $barang['id'] ?>">
                        Edit</a>
                    <a  class="btn btn-danger" role="button" onclick="return confirm('akan menghapus data?')" 
                       href="../barang/hapus.php?id=<?= $barang['id'] ?>">
                        Hapus</a>
                </td>
            </tr>
            <?php
        }
        ?>
    </table>
        <?php
        }else{
            header("location:index.php");
        }
        ?>
    </main>
    <?php include '../fragment/footer.php'; ?>