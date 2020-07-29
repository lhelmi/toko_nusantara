<?php
include '../konfigurasi/config.php';
include '../fragment/header.php';
include '../konfigurasi/function.php';
?>
    <header>
        <h1>Kiriman Barang</h1>
    </header>
        <?php include '../fragment/menu.php' ?>
    <main>
        <?php
        if (isset($_POST['submit'])) {
            $barang_id = $_POST['barang_id'];
            $gerai_id = $_POST['gerai_id'];
            $stok = $_POST['stok'];
            if(empty($barang_id)){
                echo "Barang harus diisi";
            }elseif (empty($gerai_id)) {
                echo "Gerai barang harus diisi";
            } elseif (empty($stok)) {
                echo "Stok harus diisi";
            } else {
                $con = connect_db();
                $query = "SELECT * FROM barang where id = '$barang_id'";
                $result = execute_query($con, $query);
                $data = mysqli_fetch_array($result);
                if($data['stok'] < $stok){
                    echo "Stok kurang";
                }else{
                    $jumlah = $data['stok'] - $stok;
                    $query = "UPDATE barang set stok='$jumlah' WHERE id= '$barang_id' ";
                    $result = execute_query($con, $query);
                }
                // if (mysqli_affected_rows($con) != 0) {
                //     header("location:../admin/detail.php?id=$supplier_id");
                // }
            }
        }
        ?>
        <form 
            name="formtambah" 
            method="post" 
            id="formtambah">
            <div>
                <label for="nama_barang">Nama Barang:</label>
                <select name="barang_id" id="barang_id">
                <option value="">Pilih</option>
                    <?php
                         $con = connect_db();
                         $query = "SELECT * FROM barang";
                         $result = execute_query($con, $query);
                         while ($barang = mysqli_fetch_array($result)) {
                    ?>
                    <option value="<?= $barang['id'] ?>"><?= $barang['nama_barang'] ?></option>
                    <?php } ?>
                </select>
            </div>
            <div>
                <label for="kategori">Stok:</label> 
                <input type="number" name="stok" id="stok" required="required" size="30">
            </div>
            <div>
                <label for="gerai">Nama Gerai:</label> 
                <select name="gerai_id" id="gerai_id">
                <option value="">Pilih</option>
                    <?php
                         $con = connect_db();
                         $query = "SELECT * FROM gerai";
                         $result = execute_query($con, $query);
                         while ($gerai = mysqli_fetch_array($result)) {
                    ?>
                    <option value="<?= $gerai['id'] ?>"><?= $gerai['nama'] ?></option>
                    <?php } ?>
                </select>
            </div>
           <div>
                <input type="submit" value="Kirim" id="submit" name="submit">
            </div>
        </form>
    </main>
    <?php
    include '../fragment/footer.php';
    ?>