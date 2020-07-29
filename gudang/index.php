<?php
include '../konfigurasi/config.php';
include '../fragment/header.php';
include '../konfigurasi/function.php';
?>
<?php include '../fragment/menu.php' ?>
<main>
    <h3>Gudang</h3>
    <!-- simkaryawan/index.php -->
    <form method="post">
        Cari Barang : 
        <input type="text" name="nama_barang" placeholder="Nama Barang">
        <input class="btn btn-success btn-sm" type="submit" name="submit" value="cari">
    </form>
    <?php
    if (isset($_POST['submit'])) {
        $nama_barang = $_POST['nama_barang'];
        $con = connect_db();
        $query = "SELECT barang.*, supplier.nama FROM barang
                inner join supplier on barang.supplier_id = supplier.id
                WHERE nama_barang LIKE '%$nama_barang%'";
        $result = execute_query($con, $query);
        ?>
        <h3>Hasil pencarian : </h3>
        <table class="table table-striped">
        <tr>
            <th>ID</th>
            <th>Kategori</th>
            <th>Nama Barang</th>
            <th>Harga</th>
            <th>Stok</th>
            <th>Supplier</th>
        </tr>
        <?php
            while ($data = mysqli_fetch_array($result)) {
        ?>
            <tr>
                <td><?= $data['id'] ?></td>
                <td><?= $data['kategori'] ?></td>
                <td><?= $data['nama_barang'] ?></td>
                <td><?= $data['harga'] ?></td>
                <td><?= $data['stok'] ?></td>
                <td><?= $data['nama'] ?></td>
            </tr>         
        <?php  
            }
        ?>
        </table>
    <?php  
        }else{
    ?>
    <table class="table table-striped">
        <tr>
            <th>ID</th>
            <th>Kategori</th>
            <th>Nama Barang</th>
            <th>Harga</th>
            <th>Stok</th>
            <th>Supplier</th>
        </tr>
        <?php
            $con = connect_db();
            $query = "SELECT barang.*, supplier.nama FROM barang
                    inner join supplier on barang.supplier_id = supplier.id";
            $result = execute_query($con, $query);
            while ($data = mysqli_fetch_array($result)) {
        ?>
            <tr>
                <td><?= $data['id'] ?></td>
                <td><?= $data['kategori'] ?></td>
                <td><?= $data['nama_barang'] ?></td>
                <td><?= $data['harga'] ?></td>
                <td><?= $data['stok'] ?></td>
                <td><?= $data['nama'] ?></td>
            </tr>         
        <?php  
            }
        ?>
        </table>
    <?php  
        }
    ?>
</main>
<?php include '../fragment/footer.php'; ?>