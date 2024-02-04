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
   
   if(isset($_POST['tambah'])){
    if(create_siswa($_POST) > 0){
        echo "<script>
                  alert('Data siswa berhasil ditambahkan');
                  document.location.href='siswaRplg.php';
              </script>";
    } else {
        echo "<script>
                  alert('Data siswa tidak berhasil ditambahkan');
                  document.location.href='siswaRplg.php';
              </script>";
    }
}
   ?>
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">
                        <ia class="fas fa-plus"></ia> Tambah Mahasiswa
                    </h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="mahasiswa.php">Data Mahasiswa</a></li>
                        <li class="breadcrumb-item active">Tambah Mahasiswa</li>
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
                    <form action="" method="post" enctype="multipart/form-data">                      <div class="form-group">
                            <label for="nisn" class="form-label">Nisn</label>
                            <input type="number" class="form-control" id="nisn" name="nisn" placeholder="928381872i" required maxlength="10">
                        </div>
                        <div class="form-group">
                            <label for="nama" class="form-label">Nama Siswa</label>
                            <input type="text" class="form-control" id="nama" name="nama" placeholder="eka" required>
                        </div>
                        
                        <div class="row">
                            <div class="form-group col-6">
                                <label for="jurusan" class="form-label">Program jurusan</label>
                                <select name="jurusan" id="jurusan" class="form-control" required>
                                    <option value="">-- pilih jurusan --</option>
                                    <option value="pplg">PPLG</option>
                                    <option value="dkv">DKV</option>
                                    <option value="tkjt">TKJT</option>
                                    <option value="akl">AKL</option>
                                    <option value="otkp">OTKP</option>
                                    <option value="pm">Pemasaran</option>
                                </select>
                            </div>

                            <div class="form-group col-6">
                                <label for="jk" class="form-label">Jenis Kelamin</label>
                                <select name="jk" id="jk" class="form-control" required>
                                    <option value="">-- pilih jenis kelamin --</option>
                                    <option value="Laki-Laki">Laki-Laki</option>
                                    <option value="Perempuan">Perempuan</option>
                                </select>
                            </div>

                        <div class="form-group">
                            <label for="telepon" class="form-label">Telepon</label>
                            <input type="number" class="form-control" id="telepon" name="telepon" placeholder="Telepon..." required>
                        </div>
                        <br>
                        <br>
                        <div class="form-group">
                                                      <label for="Alamat" class="form-label">Alamat</label>
                           <textarea class="form-control" id="Alamat" name="Alamat" placeholder="jalan suranaya rt 02..." required></textarea>
                            <!--<label for="alamat" class="form-label">Alamat</label>
                            <input type="text" name="alamat" id="alamat" class="form-control">-->
                        </div>

                        <div class="form-group">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" name="email" placeholder="email..." required>
                        </div>
                         
                            <div class="form-group col-6">
                                <label for="kelas" class="form-label">Kelas</label>
                                <select name="kelas" id="kelas" class="form-control" required>
                                    <option value="">-- pilih Kelas --</option>
                                    <option value="X">X</option>
                                    <option value="XI">XI</option>
                                    <option value="XII">XII</option>
                                </select>
                            </div> 
                            </div>
                            </div>

                        <button type="submit" name="tambah" class="btn btn-primary" style="float: right;">Tambah</button>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <!-- /.content -->
</div>

    <?php include 'layout/footer.php';
    ?>