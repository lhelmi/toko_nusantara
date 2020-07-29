<?php
include '../konfigurasi/config.php';
include '../fragment/header.php';
include '../konfigurasi/function.php';
?>
    <header>
        <h1>Edit Supplier</h1>
    </header>
        <?php include '../fragment/menu.php' ?>
    <main>
        <?php
            if (isset($_POST['submit'])) {
                $id = $_POST['id'];
                $nama = $_POST['nama'];
                $kota = $_POST['kota'];
                $alamat = $_POST['alamat'];
                $telepon = $_POST['telepon'];
                if(empty($id)){
                    echo "id harus diisi";
                }elseif (empty($nama)) {
                    echo "nama harus diisi";
                } elseif (empty($kota)) {
                    echo "kota harus diisi";
                } elseif (empty($telepon)) {
                    echo "telepon harus diisi";
                } elseif (empty($alamat)) {
                    echo "alamat harus diisi";
                } else {
                    $con = connect_db();
                    $query = "UPDATE supplier set nama='$nama', alamat='$alamat', kota='$kota', telepon='$telepon' WHERE id= '$id' ";
                    $result = execute_query($con, $query);
                    if (mysqli_affected_rows($con) != 0) {
                        header("location:index.php");
                    }
                }
            }else if (isset($_GET['id'])) {
                $con = connect_db();
                $id = $_GET['id'];
                $query = "SELECT * FROM supplier WHERE id='$id'";
                $result = execute_query($con, $query);
                $data = mysqli_fetch_array($result);
            }else{
                header("location:index.php");
            }
        ?>
        <form 
            name="formtambah" 
            method="post" 
            id="formtambah">
            <div>
                <label for="id">ID:</label>
                <input type="text" size="50" required="required" disabled value="<?= $data['id']; ?>">
                <input type="hidden"  name="id" id="id"  required="required" value="<?= $data['id']; ?>">
            </div>
            <div>
                <label for="nama">Nama:</label>
                <input type="text" name="nama" id="nama" size="50" required="required" value="<?= $data['nama']; ?>">
            </div>
            <div>
                <label for="alamat">Alamat:</label> 
                <textarea name="alamat" id="alamat" cols="30" rows="10"><?= $data['alamat'];  ?></textarea>
            </div>
            <div>
                <label for="kota">Kota:</label> 
                <input type="text" name="kota" id="kota" required="required" size="30" value="<?= $data['kota'];  ?>">
            </div>
            <div>
                <label for="telepon">telepon:</label> 
                <input type="text" name="telepon" id="telepon" required="required" size="30" value="<?= $data['telepon'];  ?>">
            </div>
            <div>
                <input type="submit" value="Simpan" id="submit" name="submit">
            </div>
        </form>
    </main>
    <?php
    include '../fragment/footer.php';
    ?>