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
  $id_akun=(int)$_GET['id'];
  if (delete_akun($id_akun)) {
    print "<script> alert('Data akun berhasil di hapus')
    document.location.href='akun.php'
    </script>";
  } else {
    print "<script> alert('Data akun gagal di hapus')
    document.location.href='akun.php'
    </script>";
  }
 ?>