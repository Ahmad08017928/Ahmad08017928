<?php
 session_start();
// membatasi halaman sebelum login
 if (!isset($_SESSION["login"])) {
     echo "<script>
        document.location.href = 'index.php';
         </script>";
     exit;
 }

// hak akses
if ($_SESSION["hak"] != "admin") {
    echo "<script>
            alert('Perhatian anda tidak mempunyai hak akses ke data barang');
            document.location.href = 'akun.php';
          </script>";
    exit;
}



$title = 'Daftar Barang';

include 'layout/header.php';

$data_barang = select("SELECT * FROM data_barang ORDER BY id_barang DESC");
  // var_dump($data_barang);
//   die();

?>
  <div class="card container">
    <div class="card-header">
         <h3 class="card-title">Tabel Data Barang</h3>
        </div>
       <!-- /.card-header -->
       <div class="card-body">
    <a href="form-tambah.php" class="btn btn-primary btn-sm mb-2 fad fa-layer-plus"><i class="fas fa-plus"></i> Tambah</a>
      <table id="example2" class="table table-bordered table-hover">
          <thead>
               <tr>
                  <th>No</th>
                    <th>Nama</th>
                      <th>Jumlah</th>
                      <th>Harga</th>
                       <th>Tanggal</th>
                        <th>Aksi</th>
                            </tr>
                        </thead>

                 <tbody>
               <?php $no = 1; ?>
               <?php foreach ($data_barang as $barang) : 
                // var_dump($barang);
//                 die();
               ?>
               
          <tr>
          <td><?= $no++; ?></td>
           <td><?= $barang['nama']; ?></td>
            <td><?= $barang['jumlah']; ?></td>
           <td>Rp. <?= number_format($barang['harga'], 0, ',', '.'); ?></td>
      <td><?= date('d/m/Y | H:i:s', strtotime($barang['tanggal'])); ?></td>
        <td width="15%" class="text-center">
          <?php 
          $id_barang = $barang['id_barang'];
          ?>
           <a href="update-barang.php?id_barang=<?= $id_barang; ?>" class="btn btn-success"><i class="fas fa-edit"></i> Ubah</a>
           <br><br>
           <a href="delete-barang.php?id_barang=<?= $id_barang; ?>" class="btn btn-danger" onclick="return confirm('Yakin Data Barang Akan Dihapus.?');"><i class="fas fa-trash-alt"></i> Hapus</a>

          </td>
          </tr>
         <?php endforeach; ?>
        </tbody>
        </table>
      </div>
     </div>
</div>

<?php include 'layout/footer.php'; ?>
