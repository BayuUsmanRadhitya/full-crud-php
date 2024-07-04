<?php 

include 'layout/header.php'; 

$title = 'Detail Mahasiswa';

$id_mahasiswa = (int)$_GET['id_mahasiswa'];

$data_mahasiswa = mysqli_query($db, "SELECT * FROM mahasiswa WHERE id_mahasiswa = $id_mahasiswa");
$mahasiswa = mysqli_fetch_array($data_mahasiswa);
?>

<div class="container mt-5">
    <h1> Data <?= $mahasiswa['nama']; ?></h1>
    <hr>
    <table class="table table-bordered table-striped mt-3">
        <tr>
            <td>Nama</td>
            <td>: <?= $mahasiswa['nama']; ?></td>
        </tr>
        <tr>
            <td>Program Studi</td>
            <td>: <?= $mahasiswa['prodi']; ?></td>
        </tr>
        <tr>
            <td>Jenis Kelamin</td>
            <td>: <?= $mahasiswa['jk']; ?></td>
        </tr>
        <tr>
            <td>Telepon</td>
            <td>: <?= $mahasiswa['telepon']; ?></td>
        </tr>
        <tr>
            <td>alamat</td>
            <td>: <?= $mahasiswa['alamat']; ?></td>
        </tr>
        <tr>
            <td>Email</td>
            <td>: <?= $mahasiswa['email']; ?></td>
        </tr>
        <tr>
            <td width="30%">Foto</td>
            <td><a href="assets/img/<?= $mahasiswa['foto']; ?>">
                <img src="assets/img/<?= $mahasiswa['foto']; ?>" alt="foto " width="30%">
                </a></td>

        </tr>
    </table>

    <a href="mahasiswa.php" class="btn btn-secondary btn-sm" style="float: right;">Kembali</a>
    </div>

<?php include 'layout/footer.php'; ?>