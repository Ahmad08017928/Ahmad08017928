   <?php
   session_start();
   if (!isset($_SESSION["login"])) {
     echo "<script>
     alert('login dulu dong');
        document.location.href = 'index.php';
         </script>";
     exit;
 }
   
   include 'layout/header.php';
   
   if(isset($_POST['ubah'])){
    if(update_siswa($_POST)){
        echo "<script>
                  alert('Data siswa berhasil diupdate');
                  document.location.href='siswaRplg.php';
              </script>";
    } else {
        echo "<script>
                  alert('Data siswa tidak berhasil diupdate');
                  document.location.href='
                  siswaRplg.php';
              </script>";
    }
  }
    //mengambil primary siswa lewar url
   $id_siswa = (int)$_GET['nisn'];
    $siswa = select("SELECT * FROM siswa WHERE nisn = '$id_siswa'")[0];
    // var_dump($siswa);
//     die();
   ?>
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">
                        <ia class="fas fa-plus"></ia> Ubah data siswa
                    </h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="siswaRplg.php">Data Siswa</a></li>
                        <li class="breadcrumb-item active">Ubah data siswa</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
       <div class="row">
        <div class="col-12 mb-5">
          <form action="" method="post" enctype="multipart/form-data">
             <input type="hidden" value="<?php echo $siswa['nisn'];?>" name="nisn">
                <div class="form-group">
           <label for="nama" class="form-label">Nama Siswa</label>
          <input type="text" class="form-control" id="nama" name="nama" placeholder="eka" value="<?=$siswa['nama'];?>" required>
            </div>
             <div class="row">
              <div class="form-group col-6">
             <label for="jurusan" class="form-label">Program jurusan</label>
               <select name="jurusan" id="jurusan" class="form-control" required>
                <?php $jurusan=$siswa['jurusan'];?>
                <option value="pplg"<?=$jurusan == 'pplg' ? 'selected' : null?>>PPLG</option>
               <option value="dkv"<?=$jurusan == 'dkv' ? 'selected' : null?>>DKV</option>
               <option value="tkjt"<?=$jurusan == 'tkjt' ? 'selected' : null ?>>TKJT</option>
                 <option value="akl"<?=$jurusan == 'akl' ? 'selected' : null ?>>AKL</option>
                <option value="otkp"<?=$jurusan == 'otkp' ? 'selected' : null ?>>OTKP</option>
                  <option value="pm"<?=$jurusan == 'pm'? 'selected' : null ?>>Pemasaran</option>
                 </select>
                 </div>

           <div class="form-group col-6">
            <label for="jk" class="form-label">Jenis Kelamin</label>
             <select name="jk" id="jk" class="form-control" required>
              <?php $jk=$siswa['jk'];?>
      <option value="Laki-Laki"<?=$jk == 'Laki-Laki' ? 'selected' : null?>>Laki-Laki</option>
         <option value="Perempuan"<?=$jk == 'Perempuan' ? 'selected' : null?>>Perempuan</option>
             </select>
            </div>
         <div class="form-group">
     <label for="telepon" class="form-label">Telepon</label>
   <input type="number" class="form-control" id="telepon" name="telepon" placeholder="Telepon..." value="<?=$siswa['telepon'];?>" required>
   </div>
      <div class="form-group">
   <label for="Alamat" class="form-label">Alamat</label>
  <input type="text"class="form-control" id="Alamat" name="Alamat" placeholder="alamat" value="<?=$siswa['alamat'];?>" required>
          </div>

   <div class="form-group">
   <label for="email" class="form-label">Email</label>
  <input type="email" class="form-control" id="email" name="email" placeholder="email..." value="<?=$siswa['email'];?>" required>
                        </div>
                         
<div class="form-group col-6">
<label for="kelas" class="form-label">Kelas</label>
<select name="kelas" id="kelas" class="form-control" required>
<?php $kelas = $siswa['kelas'];?>
<option value="X"<?=$kelas == 'X' ? 'selected' : null ?>>X</option>
<option value="XI"<?=$kelas == 'XI' ? 'selected' : null ?>>XI</option>
<option value="XII"<?=$kelas == 'XII' ? 'selected' : null ?>>XII</option>
</select>
</div> 
</div>
</div>
<button type="submit" name="ubah" class="btn btn-primary" style="float: right;">Ubah</button>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <!-- /.content -->
</div>

    <?php include 'layout/footer.php';
    ?>