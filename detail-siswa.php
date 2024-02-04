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
$title ='Detail Siswa';

//mengambil id siswa lewar url
$id_siswa = (int)$_GET['nisn'];
//menampilkan
$siswa=select("SELECT * FROM siswa WHERE nisn='$id_siswa'")[0];
?>
<section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 mb-5">
                    <table class="table table-bordered table-striped mt-3">
    <tr>
      <td>Nama</td>
      <td>:<?=$siswa['nama'];?></td>
    </tr>
    <tr>
      <td>Jenis kelamin</td>
      <td>:<?=$siswa['jk'];?></td>
    </tr>
    <tr>
      <td>Jurusan</td>
      <td>:<?=$siswa['jurusan'];?></td>
    </tr>
    <tr>
      <td>Kelas</td>
      <td>:<?=$siswa['kelas'];?></td>
    </tr>
    <tr>
      <td>Telepon</td>
      <td>:<?=$siswa['telepon'];?></td>
    </tr>
    <tr>
      <td>Alamat</td>
      <td>:<?=$siswa['alamat'];?></td>
    </tr>
  </table>
     <a href="siswaRplg.php" class="btn btn-secondary btn-sm" style="float: right ;">Kembali</a>
</div>
</div>
</div>
</section>
<?php include 'layout/footer.php'; ?>
