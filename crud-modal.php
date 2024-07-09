
<?php 


$title = 'Daftar Akun';

include 'layout/header.php'; 

if (!isset($_SESSION["login"])) {
    echo"<script>
            alert('Login Dulu!!');
            document.location.href='login.php';
        </script>";
    exit;
  }
  

$data_akun = select("SELECT * FROM akun");

$id_akun = $_SESSION['id_akun'];
$data_bylogin = select("SELECT * FROM akun WHERE id_akun = '$id_akun'");


// Tambah akun
if(isset($_POST['tambah'])){
    if (create_akun($_POST) > 0){
        echo "<script>
                alert('Data Akun Berhasil Ditambahkan');
                document.location.href = 'crud-modal.php';
                </script>";
    }else{
        echo "<script>
                alert('Data Akun Gagal Ditambahkan');
                document.location.href = 'crud-modal.php';
                </script>";
    }
}

// Ubah akun
if(isset($_POST['ubah'])){
    if (update_akun($_POST) > 0){
        echo "<script>
                alert('Data Akun Berhasil Diubah');
                document.location.href = 'crud-modal.php';
                </script>";
    }else{
        echo "<script>
                alert('Data Akun Gagal Diubah');
                document.location.href = 'crud-modal.php';
                </script>";
    }
}

// Hapus akun
if(isset($_POST['hapus'])){
    if (delete_akun($_POST) > 0){
        echo "<script>
                alert('Data Akun Berhasil Dihapus');
                document.location.href = 'crud-modal.php';
                </script>";
    }else{
        echo "<script>
                alert('Data Akun Gagal Dihapus');
                document.location.href = 'crud-modal.php';
                </script>";
    }
}
?>

<div class="content-wrapper">

<div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0"><i class="nav-icon fas fa-user"></i> Data Akun</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="home.php">Home</a></li>
              <li class="breadcrumb-item active">Akun</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>

    <section class="content">
        <div class="container-fluid">
        <div class="row">
                <div class="col-12">
                    <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Data Akun</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">

                    <?php if ($_SESSION['level'] == 1) : ?>
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalTambah"><i class="fas fa-plus-circle"></i> 
                    Tambah
                    </button>
                    <br><br>
                    <?php endif; ?>
                        
                    <table id="table" class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Username</th>
                                <th>Email</th>
                                <th>Password</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1; ?>
                                <?php if($_SESSION['level'] == 1) : ?>
                                    <?php foreach ($data_akun as $akun) : ?>
                                    <tr>
                                        <td><?= $no++; ?></td>
                                        <td><?= $akun['nama']; ?></td>
                                        <td><?= $akun['username']; ?></td>
                                        <td><?= $akun['email']; ?></td>
                                        <td>Password Ter-enkripsi</td>
                                        <td>
                                            <button type="button" class="btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#modalUbah<?= $akun['id_akun'] ?>"><i class="fas fa-edit"></i> Ubah</button>
                                            <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#modalHapus<?= $akun['id_akun'] ?>"><i class="fas fa-trash"></i> Hapus</button>
                                        </td>
                                    </tr>
                                    <?php endforeach; ?>
                                <?php else : ?>
                                    <?php foreach ($data_bylogin as $akun) : ?>
                                    <tr>
                                        <td><?= $no++; ?></td>
                                        <td><?= $akun['nama']; ?></td>
                                        <td><?= $akun['username']; ?></td>
                                        <td><?= $akun['email']; ?></td>
                                        <td>Password Ter-enkripsi</td>
                                        <td width="15%" class="text-center">
                                            <button type="button" class="btn btn-success mb-1" data-bs-toggle="modal" data-bs-target="#modalUbah<?= $akun['id_akun'] ?>">Ubah</button>
                                        </td>
                                    </tr>
                                    <?php endforeach; ?>
                                <?php endif; ?>
                        </tbody>
                    </table>

    <!-- Modal Tambah -->
    <div class="modal fade" id="modalTambah" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Akun</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="" method="post">
                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama</label>
                        <input type="text" class="form-control" name="nama" id="nama" required>
                    </div>
                    <div class="mb-3">
                        <label for="username" class="form-label">username </label>
                        <input type="text" class="form-control" name="username" id="username" required>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" name="email" id="email" required>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" name="password" id="password" required>
                    </div>
                    <div class="mb-3">
                    <label for="level">Level</label>
                    <select name="level" id="level" class="form-control" required>
                        <option value="">-- Pilih Level --</option>
                        <option value="1">Admin</option>
                        <option value="2">Operator</option>
                        <option value="3">Operator Barang</option>
                        <option value="4">Operator mahasiswa</option>
                    </select>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Kembali</button>
                <button type="submit" name="tambah" class="btn btn-primary">Tambah</button>
            </div>
                </form>
            </div>
        </div>
    </div>
    
    <?php foreach ($data_akun as $akun) : ?>
        <!-- Modal Ubah -->
        <div class="modal fade" id="modalUbah<?= $akun['id_akun'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                <div class="modal-header bg-success text-white">
                    <h5 class="modal-title" id="exampleModalLabel">Ubah Akun</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="" method="post">
                        <input type="hidden" name="id_akun" value="<?= $akun['id_akun']; ?>">

                        <div class="mb-3">
                            <label for="nama" class="form-label">Nama</label>
                            <input type="text" class="form-control" name="nama" id="nama" value=<?= $akun['nama'] ?> required>
                        </div>
                        <div class="mb-3">
                            <label for="username" class="form-label">username </label>
                            <input type="text" class="form-control" name="username" id="username" value=<?= $akun['username'] ?> required>
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" name="email" id="email" value=<?= $akun['email'] ?> required>
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password (Masukkan password baru/lama)</label>
                            <input type="password" class="form-control" name="password" id="password" required>
                        </div>

                        <?php if ($_SESSION['level'] == 1) : ?>
                            <div class="mb-3">
                            <label for="level">Level</label>
                                <select name="level" id="level" class="form-control" required>
                                    <option value="1" <?= $akun['level'] == '1' ? 'selected' : '' ?>>Admin</option>
                                    <option value="3" <?= $akun['level'] == '2' ? 'selected' : '' ?>>Operator Barang</option>
                                    <option value="4" <?= $akun['level'] == '3' ? 'selected' : '' ?>>Operator Mahasiswa</option>
                                </select>
                            </div>
                        <?php else : ?>
                            <input type="hidden" name="level" value="<?= $akun['level']; ?>">
                        <?php endif; ?>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Kembali</button>
                    <button type="submit" name="ubah" class="btn btn-primary">Ubah</button>
                </div>
                    </form>
                </div>
            </div>
        </div>
    <?php endforeach; ?>

    <?php foreach ($data_akun as $akun) : ?>
        <!-- Modal Hapus -->
        <div class="modal fade" id="modalHapus<?= $akun['id_akun'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                <div class="modal-header bg-danger text-white">
                    <h5 class="modal-title" id="exampleModalLabel">Hapus Akun</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>Yakin Ingin Menghapus Data Akun : <?= $akun['nama']; ?> .?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <a href="hapus-akun.php?id_akun=<?= $akun['id_akun'] ?>" class="btn btn-danger">Hapus</a>
                </div>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
                    </div>
                        <!-- /.card-body -->
                    </div>
                        <!-- /.card -->
                    </div>
                    <!-- /.col -->
                </div>
                    <!-- /.row -->
    </div>
    </section>
</div>
    
<?php include 'layout/footer.php'; ?>