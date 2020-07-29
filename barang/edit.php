<?php
include '../konfigurasi/config.php';
include '../fragment/header.php';
include '../konfigurasi/function.php';
?>
    <header>
        <h1>Edit Barang</h1>
    </header>
        <?php include '../fragment/menu.php' ?>
    <main>
        <?php
            if (isset($_POST['submit'])) {
                $id = $_POST['id'];
                $nama_barang = $_POST['nama_barang'];
                $kategori = $_POST['kategori'];
                $harga = $_POST['harga'];
                $stok = $_POST['stok'];
                $supplier_id = $_POST['supplier_id'];
                if(empty($id)){
                    echo "id harus diisi";
                }elseif (empty($nama_barang)) {
                    echo "nama barang harus diisi";
                } elseif (empty($kategori)) {
                    echo "Kategori harus diisi";
                } elseif (empty($harga)) {
                    echo "Harga harus diisi";
                } elseif (empty($stok)) {
                    echo "Stok harus diisi";
                } else {
                    $con = connect_db();
                    $query = "UPDATE barang set nama_barang='$nama_barang', kategori='$kategori', harga='$harga', stok='$stok' WHERE id= '$id' ";
                    $result = execute_query($con, $query);
                    if (mysqli_affected_rows($con) != 0) {
                        header("location:../admin/detail.php?id=$supplier_id");
                    }
                }
            }else if (isset($_GET['id'])) {
                $con = connect_db();
                $id = $_GET['id'];
                $query = "SELECT barang.*, supplier.nama FROM barang inner join supplier on barang.supplier_id = supplier.id WHERE barang.id='$id'";
                $result = execute_query($con, $query);
                $data = mysqli_fetch_array($result);
            }else{
                header("location:../admin/detail.php?id=$supplier_id");
            }
        ?>
        <form 
            name="formtambah" 
            method="post" 
            id="formtambah">
            <div>
                <label for="id">ID:</label>
                <input type="text" size="50" disabled value="<?= $data['id'] ?>">
                <input type="hidden" name="id" id="id" size="50" required="required" value="<?= $data['id'] ?>">
            </div>
            <div>
                <label for="id">Supplier:</label>
                <input type="hidden" name="supplier_id" id="supplier_id" size="50" required="required" value="<?= $data['supplier_id'] ?>">
                <input type="text" size="50" disabled value="<?= $data['supplier_id'] .' - '. $data['nama'] ?>">
            </div>
            <div>
                <label for="nama_barang">Nama Barang:</label>
                <input type="text" name="nama_barang" id="nama_barang" size="50" required="required" value="<?= $data['nama_barang'] ?>">
            </div>
            <div>
                <label for="kategori">Kategori:</label> 
                <input type="text" name="kategori" id="kategori" required="required" size="30" value="<?= $data['kategori'] ?>">
            </div>
            <div>
                <label for="harga">Harga:</label> 
                <input type="number" name="harga" id="harga" required="required" size="30" value="<?= $data['harga'] ?>">
            </div>
            <div>
                <label for="stok">Stok:</label> 
                <input type="number" name="stok" id="stok" required="required" size="30" value="<?= $data['stok'] ?>">
            </div>
            <div>
                <input type="submit" value="Simpan" id="submit" name="submit">
            </div>
        </form>
    </main>
    <?php
    include '../fragment/footer.php';
    ?>