<?php
session_start();
if (!isset($_SESSION["login"])) {
    echo "<script>
        alert('Login dulu dong');
        document.location.href = 'index.php';
    </script>";
    exit;
}

$title = 'Data Akun';
include 'layout/header.php';

// Tampil seluruh data
$data_akun = select("SELECT * FROM login");

// Tampil data berdasarkan user login
$id_akun = $_SESSION['id'];
$data_bylogin = select("SELECT * FROM login WHERE id = $id_akun");

// Jika user menekan Save
if (isset($_POST['tambah'])) {
    if (create_akun($_POST) > 0) {
        echo "<script>
                  alert('Data akun berhasil ditambahkan');
                  document.location.href='akun.php';
              </script>";
    } else {
        echo "<script>
                  alert('Data akun tidak berhasil ditambahkan');
                  document.location.href='akun.php';
              </script>";
    }
}

// Ubah akun
if (isset($_POST['ubah'])) {
    if (update_akun($_POST) > 0) {
        echo "<script>
                  alert('Data akun berhasil diupdate');
                  document.location.href='akun.php';
              </script>";
    } else {
        echo "<script>
                  alert('Data akun tidak berhasil diupdate');
                  document.location.href='akun.php';
              </script>";
    }
}
?>

<div class="card container">
    <div class="card-header">
        <h3 class="card-title">Tabel Data Akun</h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <?php if ($_SESSION['hak'] == 'admin') : ?>
            <button type="button" class="btn btn-primary fad fa-layer-plus" data-bs-toggle="modal" data-bs-target="#modalTambah">Tambah Akun</button>
        <?php endif; ?>

        <table id="example2" class="table table-bordered table-hover">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Username</th>
                    <th>Password</th>
                    <th>Hak</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <!-- Tampil seluruh data -->
                <?php if ($_SESSION['hak'] == "admin") : ?>
                    <?php $no = 1; ?>
                    <?php foreach ($data_akun as $akun) : ?>
                        <tr>
                            <td><?= $no++; ?></td>
                            <td><?= $akun['username']; ?></td>
                            <td>Password ter-enkripsi</td>
                            <td><?= $akun['hak']; ?></td>
                            <td class="text-center">
                                <button type="button" class="btn btn-success mb-1" data-bs-toggle="modal" data-bs-target="#modalUbah<?= $akun['id']; ?>"><i class="fas fa-edit"></i> Ubah</button>
                                <button type="button" class="btn btn-danger mb-1" data-bs-toggle="modal" data-bs-target="#modalHapus<?= $akun['id']; ?>" data-username="<?= $akun['username']; ?>"><i class="fas fa-trash-alt"></i> Hapus</button>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else : ?>
                    <!-- Tampil data berdasarkan user login -->
                    <?php foreach ($data_bylogin as $akun) : ?>
                        <?php $no = 1; ?>
                        <tr>
                            <td><?= $no++; ?></td>
                            <td><?= $akun['username']; ?></td>
                            <td><?= $akun['hak']; ?></td>
                            <td>Password Ter-enkripsi</td>
                            <td>
                              hanya untuk admin
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>

<!-- Modal Tambah -->
<div class="modal fade" id="modalTambah" tabindex="-1" aria-labelledby="modalTambahLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title" id="modalTambahLabel">Tambah Akun</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="" method="post">
                    <div class="mb-3">
                        <label for="username">Username</label>
                        <input type="text" id="username" name="username" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="password">Password</label>
                        <input type="password" id="password" name="password" class="form-control" required maxlength="8">
                    </div>
                    <div class="mb-3">
                        <label for="hak">Hak</label>
                        <select name="hak" id="hak" class="form-control" required>
                            <option value="">---pilih status anda---</option>
                            <option value="user">User</option>
                            <option value="admin">Admin</option>
                        </select>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" name="tambah" class="btn btn-primary">Save</button>
            </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal Ubah -->
<?php foreach ($data_akun as $akun) : ?>
    <div class="modal fade" id="modalUbah<?= $akun['id']; ?>" tabindex="-1" aria-labelledby="modalTambahLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-success text-white">
                    <h5 class="modal-title" id="modalTambahLabel">Ubah akun</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="" method="post">
                        <input type="hidden" value="<?php echo $akun['id']; ?>" name="id">
                        <div class="mb-3">
                            <label for="username">Username</label>
                            <input type="text" id="username" name="username" class="form-control" value="<?= $akun['username']; ?>" required>
                        </div>
                        <div class="mb-3">
                            <label for="password">Password <small> (Masukan Password Baru/Lama) </small></label>
                            <input type="password" id="password" name="password" class="form-control" required maxlength="8">
                        </div>
                        <div class="mb-3">
                            <label for="hak">Hak</label>
                            <select name="hak" id="hak" class="form-control" required>
                                <?php $hak = $akun['hak']; ?>
                                <option value="user"<?= $hak == 'user' ? 'selected' : null ?>>User</option>
                                <option value="admin"<?= $hak == 'admin' ? 'selected' : null ?>>Admin</option>
                            </select>
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" name="ubah" class="btn btn-success">Ubah</button>
                </div>
                </form>
            </div>
        </div>
    </div>
<?php endforeach; ?>

<!-- Modal Hapus -->
<?php foreach ($data_akun as $akun) : ?>
    <div class="modal fade" id="modalHapus<?= $akun['id']; ?>" tabindex="-1" aria-labelledby="modalHapusLabel<?= $akun['id']; ?>" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-warning text-white">
                    <h5 class="modal-title" id="modalHapusLabel<?= $akun['id']; ?>">Hapus Akun</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="" method="post">
                        <input type="hidden" name="id" value="<?= $akun['id']; ?>">
                        <p>Yakin Ingin Menghapus Data Akun: <?= $akun['username']; ?>?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <a href="hapus-akun.php?id=<?= $akun['id']; ?>" class="btn btn-danger">Hapus</a>
                </div>
                </form>
            </div>
        </div>
    </div>
<?php endforeach; ?>
<?php include 'layout/footer.php'; ?>
