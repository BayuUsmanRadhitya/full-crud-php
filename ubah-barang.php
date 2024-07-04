<?php 

include 'layout/header.php'; 

$title = 'Ubah Barang';

$id_barang = (int)$_GET['id_barang'];

        $barang = mysqli_query($db, "SELECT * FROM barang WHERE id_barang=$id_barang");

                    while($barang_data = mysqli_fetch_array($barang)){
                        $id_barang = $barang_data['id_barang'];
                        $nama = $barang_data['nama'];
                        $jumlah = $barang_data['jumlah'];
                        $harga = $barang_data['harga'];
                        
                    }

        if(isset($_POST['ubah'])){
            if (update_barang($_POST) > 0 ) {
                echo"<script>
                        alert('Data Barang Berhasil Di Ubah');
                        document.location.href='index.php';
                    </script>";
            }else {
                echo"<script>
                        alert('Data Barang Gagal Di Ubah');
                        document.location.href='index.php';
                    </script>";
            }
        
        }
 ?>


<div class="container mt-5">
    <h1>Ubah Barang</h1>

    <hr>
    <form action="" method="POST">

        <input type="hidden" name="id_barang" value="<?=$id_barang?>">
        <div class="mb-3">
            <label for="nama" class="form-label">Nama Barang</label>
            <input type="text" class="form-control" id="nama" name="nama" value="<?=$nama?>"  required>
        </div>
        <div class="mb-3">
            <label for="jumlah" class="form-label">Jumlah</label>
            <input type="number" class="form-control" id="jumlah" name="jumlah"  value="<?=$jumlah?>" required>
        </div>
        <div class="mb-3">
            <label for="harga" class="form-label">Harga</label>
            <input type="number" class="form-control" id="harga" name="harga"  value="<?=$harga?>" required>
        </div>
        <button type ="submit" name="ubah" class="btn btn-primary" style="float: right;">Ubah</button>
    </form>

</div>
<?php include 'layout/footer.php'; ?>