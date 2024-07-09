<?php include 'layout/header.php'; 

if (!isset($_SESSION["login"])) {
  echo"<script>
          alert('Login Dulu!!');
          document.location.href='login.php';
      </script>";
  exit;
}


    $title = 'Daftar Mahasiswa';
     
    $data_mahasiswa = select("SELECT * FROM mahasiswa ORDER BY id_mahasiswa DESC");
?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0"><i class="nav-icon fas fa-user-graduate"></i> Data Mahasiswa</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="home.php">Home</a></li>
              <li class="breadcrumb-item active">Mahasiswa</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <section class="content">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Tabel Data Mahasiswa</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <a href="tambah-mahasiswa.php" class="btn btn-primary mb-1"><i class="fas fa-plus"></i> Tambah Mahasiswa</a>
                <a href="donwload-excel-mahasiswa.php" class="btn btn-success mb-1">Download Excel</a>
                <a href="donwload-pdf-mahasiswa.php" class="btn btn-danger mb-1">Download Pdf</a>

                <br><br>

                <table id="serverside" class="table table-bordered table-hover">
                <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Prodi</th>
                <th>Jenis Kelamin</th>
                <th>Telepon</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
          
        </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
        <!-- /.row (main row) -->
        </div>
        </div>
        
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <div class="modal fade" id="modalFilter" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header bg-success">
        <h5 class="modal-title" id="exampleModalLabel"><i class="fas fa-seacrh"></i> Filter Data</h5>
        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
              <form action="" method="post">
                <div class="from-group">
                  <label for="tgl_awal">Tanggal Awal</label>
                  <input type="date" name="tgl_awal" id="tgl_awal" class="form-control">
                </div>

                <div class="from-group">
                  <label for="tgl_akhir">Tanggal Akhir</label>
                  <input type="date" name="tgl_akhir" id="tgl_akhir" class="form-control">
                </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
        <button type="submit" name="filter" class="btn btn-primary">Submit</button>
      </div>
      
      </form>
      </div>
    </div>
  </div>
</div>

  <?php include 'layout/footer.php'; ?>