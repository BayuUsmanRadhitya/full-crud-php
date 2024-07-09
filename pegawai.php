<?php include 'layout/header.php'; 

if (!isset($_SESSION["login"])) {
  echo"<script>
          alert('Login Dulu!!');
          document.location.href='login.php';
      </script>";
  exit;
}


    $title = 'Daftar Pegawai';

    $data_pegawai = select("SELECT * FROM pegawai ORDER BY id_pegawai DESC");
?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0"> <i class="nav-icon fas fa-users"></i> Data Pegawai</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="home.php">Home</a></li>
              <li class="breadcrumb-item active">Pegawai</li>
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
                <h3 class="card-title">Tabel Data Pegawai</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                
                <table class="table table-bordered table-hover">
                <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Jabatan</th>
                <th>Email</th>
                <th>Telepon</th>
                <th>Alamat</th>
            </tr>
        </thead>
        <tbody id="live_data">

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
  <script>
    $('document').ready(function(){
        setInterval(function(){
            getPegawai()
        }, 200)
    });

    function getPegawai() {
        $.ajax({
            url : "realtime-pegawai.php",
            type : "GET",
            success: function(response) {
                $('#live_data').html(response)
            }
        });
    }
  </script>
  <!-- /.content-wrapper -->
  <?php include 'layout/footer.php'; ?>