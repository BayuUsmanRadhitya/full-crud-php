<?php include 'layout/header.php'; 

if (!isset($_SESSION["login"])) {
  echo"<script>
          alert('Login Dulu!!');
          document.location.href='login.php';
      </script>";
  exit;
}


    $title = 'Daftar Barang';

   if (isset($_POST['filter'])) {
      $tgl_awal = strip_tags($_POST['tgl_awal'] . " 00:00:00");
      $tgl_akhir = strip_tags($_POST['tgl_akhir'] . " 23:59:59");

      $data_barang = select("SELECT * FROM barang WHERE tanggal BETWEEN '$tgl_awal' AND '$tgl_akhir' ORDER BY id_barang DESC");
   }else {
    $data_barang = select("SELECT * FROM barang ORDER BY id_barang DESC");

   }

?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0"><i class="nav-icon fas fa-box"></i> Data Barang</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="home.php">Home</a></li>
              <li class="breadcrumb-item active">Barang</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    
    <section class="content">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Tabel Data Barang</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <a href="tambah-barang.php" class="btn btn-primary mb-1"><i class="fas fa-plus"></i> Tambah Barang</a>

                <button type="button" class="btn btn-success mb-1" data-toggle="modal" data-target="#modalFilter">
                      Filter Data
                </button>

                <br><br>
                
                <table id="table" class="table table-bordered table-hover">
                <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Jumlah</th>
                <th>Harga</th>
                <th>Barcode</th>
                <th>Tanggal</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
          <?php $no = 1; ?>
          <?php foreach ($data_barang as $barang) : ?>  
          <tr>
            <td><?= $no++; ?></td>
            <td><?= $barang ['nama'];?></td>
            <td><?= $barang ['jumlah'];?></td>
            <td>Rp. <?= number_format($barang ['harga'],0,',','.')?></td>
            <td class="text-center">
                    <img alt="barcode" src="barcode.php?codetype=Code128&size=15&text=<?= $barang['barcode']; ?>& print=true"/>
            </td>
            <td><?= date("d/m/y | H:i:s", strtotime($barang['tanggal']));?></td>
            <td width="15%" class="text-center">
                <a href="ubah-barang.php?id_barang=<?=$barang['id_barang']; ?>" class="btn btn-success" ><i class="fas fa-edit"></i>Edit</a>
                <a href="hapus-barang.php?id_barang=<?=$barang['id_barang']; ?>" class="btn btn-danger" ><i class="fas fa-trash"></i>Hapus</a>
            </td>
            </tr>
            <?php endforeach; ?>
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