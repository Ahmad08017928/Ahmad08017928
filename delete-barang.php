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
  include 'config/app.php';
  
  //menerima id barang yang di pilih pengguna
  $id_barang=(int)$_GET['id_barang'];
  if (delete_barang($id_barang)) {
    print "<script> alert('Data barang berhasil di hapus')
    document.location.href='data_barang.php'
    </script>";
  } else {
    print "<script> alert('Data barang gagal di hapus')
    document.location.href='data_barang.php'
    </script>";
  }
 ?>