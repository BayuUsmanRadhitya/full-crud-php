<?php 

$title = 'Ubah Mahasiswa';

include 'layout/header.php'; 

if (!isset($_SESSION["login"])) {
    echo"<script>
            alert('Login Dulu!!');
            document.location.href='login.php';
        </script>";
    exit;
  }
  

$id_mahasiswa = (int)$_GET['id_mahasiswa'];

        $mahasiswa = mysqli_query($db, "SELECT * FROM mahasiswa WHERE id_mahasiswa=$id_mahasiswa");

                    while($mahasiswa_data = mysqli_fetch_array($mahasiswa)){
                        $id_mahasiswa = $mahasiswa_data['id_mahasiswa'];
                        $nama = $mahasiswa_data['nama'];
                        $prodi = $mahasiswa_data['prodi'];
                        $jk = $mahasiswa_data['jk'];
                        $telepon = $mahasiswa_data['telepon'];
                        $alamat = $mahasiswa_data['alamat'];
                        $email = $mahasiswa_data['email'];
                        $foto = $mahasiswa_data['foto'];
                        
                    }

        if(isset($_POST['ubah'])){
            if (update_mahasiswa($_POST) > 0 ) {
                echo"<script>
                        alert('Data Mahasiswa Berhasil Di Ubah');
                        document.location.href='mahasiswa.php';
                    </script>";
            }else {
                echo"<script>
                        alert('Data Mahasiswa Gagal Di Ubah');
                        document.location.href='mahasiswa.php';
                    </script>";
            }
        
        }
?>
<div class="content-wrapper">
<div class="container ">
    <h1>Ubah Data Mahasiswa </h1>

    <hr>
    <form action="" method="post" enctype="multipart/form-data">
    <input type="hidden" name="id_mahasiswa" value="<?=$id_mahasiswa?>">
        <div class="mb-3">
            <label for="nama" class="form-label">Nama Mahasiswa</label>
            <input type="text" class="form-control" id="nama" name="nama" value="<?=$nama?>" placeholder="Nama Mahasiswa..." required>
        </div>
        
        <div class="row">
            <div class="mb-3 col-6">
                <label for="prodi" class="form-label">Program Studi</label><br>
                <select name="prodi" id="prodi" class="form-control" required>
                    <option value="Teknik Informatika" <?= $prodi == 'Teknik Informatika' ? 'Selected' : null ?>>Teknik Informatika</option>
                    <option value="Teknik Mesin" <?= $prodi == 'Teknik Mesin' ? 'Selected' : null ?>>Teknik Mesin</option>
                    <option value="Teknik Listrik" <?= $prodi == 'Teknik Listrik' ? 'Selected' : null ?>>Teknik Listrik</option>
                </select>
            </div>
            <div class="mb-3 col-6">
                <label for="jk" class="form-label">Jenis Kelamin</label><br>
                <select name="jk" id="jk" class="form-control" required>
                    <option value="Laki-Laki" <?= $jk == 'Laki-Laki' ? 'Selected' : null ?>>Laki-Laki</option>
                    <option value="Perempuan" <?= $jk == 'Perempuan' ? 'Selected' : null ?>>Perempuan</option>
                </select>
            </div>
        </div>

        <div class="mb-3">
            <label for="telepon" class="form-label">Telepon</label>
            <input type="number" class="form-control" id="telepon" name="telepon" value="<?=$telepon?>" placeholder="Masukan Nomor Telepon..." required>
        </div>

        <div class="mb-3">
            <label for="Alamat" class="form-label">Alamat</label>
            <textarea name="alamat" id="alamat" class="form-control"><?=$alamat?></textarea>
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">Email Mahasiswa</label>
            <input type="text" class="form-control" id="email" name="email" value="<?=$email?>" placeholder="Masukan Email Mahasiswa..." required>
        </div>

        <div class="mb-3">
            <label for="foto" class="form-label">Foto Mahasiswa</label>
            <input type="file" class="form-control" id="foto" name="foto" placeholder="Masukan Foto Mahasiswa..." >
            <p>
                <small>Gambar Sebelumnya</small>
            </p>
            <img src="assets/img/<?=$foto?>" alt="foto" width="150px">
        </div>
        <input type="submit" class="btn btn-primary" name="ubah" style="float: right;">
    </form>

    </div>
    </div>
<script>
    function previewImg() {
        const foto = document.querySelector('#foto');
        const imgPreview = document.querySelector('.img-preview');
        
        const fileFoto = new FileReader();
        fileFoto.readAsDataURL(foto.files[0]);

        fileFoto.onload = function(e){
            imgPreview.src = e.target.result;
        }
    }
</script>
<?php include 'layout/footer.php'; ?>
