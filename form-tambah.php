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
   
   if(isset($_POST['tambah'])){
    if(create_barang($_POST) > 0){
        echo "<script>
                  alert('Data barang berhasil ditambahkan');
                  document.location.href='data_barang.php';
              </script>";
    } else {
        echo "<script>
                  alert('Data barang tidak berhasil ditambahkan');
                  document.location.href='data_barang.php';
              </script>";
    }
}
   ?>
    <div class="container mt-5">
   <h1>Tambah Barang</h1>
   <hr>
   <form action="" method="post">
    <div class="mb-3">
  <label for="namabarang" class="form-label">Nama Barang</label>
  <input type="text" class="form-control" id="namabarang" name="nama" placeholder="Laptop" required>
   </div>
    <div class="mb-3">
  <label for="jumlahbarang" class="form-label">Jumlah Barang</label>
  <input type="number" class="form-control" id="jumlahbarang" name="jumlah" placeholder="30"required>
   </div>
    <div class="mb-3">
  <label for="hargabarang" class="form-label">Harga barang</label>
  <input type="number" class="form-control" id="hargabarang" name="harga" placeholder="5000"required>
   </div>
   <input type="submit" name="tambah" class="btn btn-primary" style="float: right;" value="tambah">
   </form>
</div>
    <?php include 'layout/footer.php';
    ?>