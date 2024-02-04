<?php
   session_start();
   if (!isset($_SESSION["login"])) {
     echo "<script>
     alert('login dulu dong');
        document.location.href = 'index.php';
         </script>";
     exit;
 }
 
  include 'config/app.php';
  
  //menerima id barang yang di pilih pengguna
  $id_siswa=(int)$_GET['nisn'];
  if (delete_siswa($id_siswa)) {
    print "<script> alert('Data siswa berhasil di hapus')
    document.location.href='siswaRplg.php'
    </script>";
  } else {
    print "<script> alert('Data siswa gagal di hapus')
    document.location.href='siswaRplg.php'
    </script>";
  }
 ?>