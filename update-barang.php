   <?php
   session_start();
   if (!isset($_SESSION["login"])) {
     echo "<script>
     alert('login dulu dong');
        document.location.href = 'index.php';
         </script>";
     exit;
 }
 
 // hak akses
if ($_SESSION["hak"] != "admin") {
    echo "<script>
            alert('Perhatian anda tidak punya hak akses');
            document.location.href = 'akun.php';
          </script>";
    exit;
}
   include 'layout/header.php';
   
    $id_barang = (int)$_GET['id_barang'];
    $barang = select("SELECT * FROM data_barang WHERE id_barang = '$id_barang'")[0];
      // var_dump($barang);
//       die();
   
   if(isset($_POST['ubah'])){
    if(update_barang($_POST) > 0){
        echo "<script>
                  alert('Data barang berhasil diupdate');
                  document.location.href='data_barang.php';
              </script>";
    } else {
        echo "<script>
                  alert('Data barang tidak berhasil diupdate');
                  document.location.href='data_barang.php';
              </script>";
    }
}
   ?>
    <div class="container mt-5">
   <h1>Update Barang</h1>
   <hr>
   <form action="" method="post">
     <input type="hidden" value="<?php echo $barang['id_barang'];?>" name="id_barang">
     <div>
  <label for="namabarang" class="form-label">Nama Barang</label>
  <input type="text" class="form-control" id="namabarang" name="nama" placeholder="Laptop" value="<?php echo $barang['nama'];?>"required>
   </div>
    <div class="mb-3">
  <label for="jumlahbarang" class="form-label">jumlah Barang</label>
  <input type="number" class="form-control" id="jumlahbarang" name="jumlah" placeholder="30" value="<?php echo $barang['jumlah'];?>" required>
   </div>
    <div class="mb-3">
  <label for="hargabarang" class="form-label">Harga barang</label>
  <input type="number" class="form-control" id="hargabarang" name="harga" placeholder="5000" value="<?php echo $barang['harga'];?>"required>
   </div>
   <input type="submit" name="ubah" class="btn btn-primary" style="float: right;" value="Ubah">
   </form>
</div>
    <?php include 'layout/footer.php';
    ?>