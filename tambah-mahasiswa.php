<?php 


$title = 'Tambah Mahasiswa';

include 'layout/header.php'; 

if (!isset($_SESSION["login"])) {
    echo"<script>
            alert('Login Dulu!!');
            document.location.href='login.php';
        </script>";
    exit;
  }
  

if(isset($_POST['tambah'])){
    if (create_mahasiswa($_POST) > 0 ) {
        echo"<script>
                alert('Data Mahasiswa Berhasil Di Tambahkan');
                document.location.href='mahasiswa.php';
            </script>";
    }else {
        echo"<script>
                alert('Data Mahasiswa Gagal Di Tambahkan');
                document.location.href='mahasiswa.php';
            </script>";
    }

}
?>
<div class="content-wrapper">
<div class="container ">
    <h1>Tambah Data Mahasiswa </h1>

    <hr>
    <form action="" method="post" enctype="multipart/form-data">
        <div class="mb-3">
            <label for="nama" class="form-label">Nama Mahasiswa</label>
            <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama Mahasiswa..." required>
        </div>
        
        <div class="row">
            <div class="mb-3 col-6">
                <label for="prodi" class="form-label">Program Studi</label>
                <select name="prodi" id="prodi" class="form-control">
                    <option value="">-- Pilih Prodi -- </option>
                    <option value="Teknik Informatika">Teknik Informatika</option>
                    <option value="Teknik Mesin">Teknik Mesin</option>
                    <option value="Teknik Lisrik">Teknik Lisrik</option>
                </select>
            </div>
            <div class="mb-3 col-6">
                <label for="jk" class="form-label">Jenis Kelamin</label>
                <select name="jk" id="jk" class="form-control">
                    <option value="">-- Pilih Jenis Kelamin -- </option>
                    <option value="Laki-Laki">Laki-Laki</option>
                    <option value="Perempuan">Perempuan</option>
                   
                </select>
            </div>
        </div>

        <div class="mb-3">
            <label for="telepon" class="form-label">Telepon</label>
            <input type="number" class="form-control" id="telepon" name="telepon" placeholder="Masukan Nomor Telepon..." required>
        </div>

        <div class="mb-3">
            <label for="Alamat" class="form-label">Alamat</label>
            <textarea name="alamat" id="alamat" class="form-control"></textarea>
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">Email Mahasiswa</label>
            <input type="text" class="form-control" id="email" name="email" placeholder="Masukan Email Mahasiswa..." required>
        </div>

        <div class="mb-3">
            <label for="foto" class="form-label">Foto Mahasiswa</label>
            <input type="file" class="form-control" id="foto" name="foto" placeholder="Masukan Foto Mahasiswa..." >

            <img src="" alt="" class="img-thunbnail img-preview" width="100px">
        </div>
        <input type="submit" class="btn btn-primary" name="tambah" style="float: right;">
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
