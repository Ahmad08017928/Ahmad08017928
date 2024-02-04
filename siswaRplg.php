<?php
session_start();

if (!isset($_SESSION["login"])) {
     echo "<script>
     alert('login dulu dong');
        document.location.href = 'index.php';
         </script>";
     exit;
 }

$title = 'Daftar Barang';

include 'layout/header.php';

$data_siswa = select("SELECT * FROM siswa ORDER BY nisn DESC");
  // var_dump($data_barang);
//   die();

?>
  <div class="card container">
    <div class="card-header">
         <h3 class="card-title">Tabel Data siswa rplg</h3>
        </div>
       <!-- /.card-header -->
       <div class="card-body">
         
         <!--membatasi hak untuk user-->
      <!--< //if ($_SESSION['hak'] == 'admin') : ?>-->
    <a href="tambah-siswa.php" class="btn btn-primary btn-sm mb-2"><i class="fas fa-plus"></i> Tambah</a>
    <!--akhir pembatasan-->
    <!--<//endif; ?>-->
      <table id="example2" class="table table-bordered table-hover">
          <thead>
               <tr>
                  <th>No</th>
                    <th>Nama</th>
                      <th>kelas</th>
                      <th>jurusan</th>
                      <th>telepon</th>
                        <th>opsi</th>
                            </tr>
                        </thead>
                        <tbody>
                          <?php $no=1;?>
                          <?php foreach ($data_siswa as $siswa ):?>
                          <tr>
                            <td><?= $no++;?></td>
                            <td><?= $siswa['nama'];?></td>
                            <td><?=$siswa['kelas'];?></td>
                            <td><?=$siswa['jurusan']?></td>
                            <td><?= $siswa['telepon']?></td>
             <td class="text-center" width="20%">
                <a href="detail-siswa.php?nisn=<?= $siswa['nisn']; ?>" class="btn btn-secondary btn-sm"><i class="fas fa-eye"></i> Detail</a>
               <br><br>
               <!--pembatasan hak untuk user-->
        <!--<//if ($_SESSION['hak'] == 'admin') : ?>-->
              <a href="ubah-siswa.php?nisn=<?= $siswa['nisn']; ?>" class="btn btn-success btn-sm"><i class="fas fa-edit"></i> Ubah</a>
               <br><br>
          <a href="hapus-siswa.php?nisn=<?= $siswa['nisn']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin Data Mahasiswa Akan Dihapus.?');"><i class="fas fa-trash-alt"></i> Hapus</a>
          <!--akhir pembatasan-->
             <!--<//php //endif; ?>-->
                 </td>
                   </tr>
         <?php endforeach; ?>
                    </td>
                     </tr>
                   </tbody>
        </table>
      </div>
     </div>
</div>

<?php include 'layout/footer.php'; ?>
