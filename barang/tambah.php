<?php
include '../konfigurasi/config.php';
include '../fragment/header.php';
include '../konfigurasi/function.php';
?>
    <header>
        <h1>Tambah Barang</h1>
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
                $query = "INSERT INTO barang (id, nama_barang, kategori, harga, stok, supplier_id) "
                        . "VALUES ('$id', '$nama_barang', '$kategori', '$harga', '$stok', '$supplier_id')";
                $result = execute_query($con, $query);
                if (mysqli_affected_rows($con) != 0) {
                    header("location:../admin/detail.php?id=$supplier_id");
                }
            }
        }else if (isset($_GET['id'])) {
            $supplier_id = $_GET['id'];
        }else{
            header("location:index.php");
        }
        ?>
        <form 
            name="formtambah" 
            method="post" 
            id="formtambah">
            <div>
                <input type="hidden" name="supplier_id" id="supplier_id" size="50" required="required" value="<?= $supplier_id; ?>">
                <label for="id">ID:</label>
                <input type="text" name="id" id="id" size="50" required="required">
            </div>
            <div>
                <label for="nama_barang">Nama Barang:</label>
                <input type="text" name="nama_barang" id="nama_barang" size="50" required="required">
            </div>
            <div>
                <label for="kategori">Kategori:</label> 
                <input type="text" name="kategori" id="kategori" required="required" size="30">
            </div>
            <div>
                <label for="harga">Harga:</label> 
                <input type="number" name="harga" id="harga" required="required" size="30">
            </div>
            <div>
                <label for="stok">Stok:</label> 
                <input type="number" name="stok" id="stok" required="required" size="30">
            </div>
            <div>
                <input type="submit" value="Simpan" id="submit" name="submit">
            </div>
        </form>
    </main>
    <?php
    include '../fragment/footer.php';
    ?>