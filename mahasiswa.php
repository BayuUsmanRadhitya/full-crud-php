<?php 

include 'layout/header.php'; 

if ($_SESSION['level'] != 1 and $_SESSION['level'] != 3) {
    echo"<script>
            alert('Anda Tidak Memiliki Hak Akses!!');
            document.location.href='crud-modal.php';
        </script>";
    exit;
}

$title = 'Daftar Mahasiswa';

$data_mahasiswa = select("SELECT * FROM mahasiswa ORDER BY id_mahasiswa DESC")
?>

<div class="container mt-5">
    <h1>Data Mahasiswa</h1>
    <hr>
    <a href="tambah-mahasiswa.php" class="btn btn-primary mb-1">Tambah</a>
    <a href="donwload-excel-mahasiswa.php" class="btn btn-success mb-1">Donwload Excel</a>
    <a href="donwload-pdf-mahasiswa.php" class="btn btn-danger mb-1">Donwload Pdf</a>
    <table class="table table-bordered table-striped mt-3" id="table">
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
          <?php $no = 1; ?>
          <?php foreach ($data_mahasiswa as $mahasiswa) : ?>
          <tr>
            <td><?= $no++; ?></td>
            <td><?= $mahasiswa ['nama'];?></td>
            <td><?= $mahasiswa ['prodi'];?></td>
            <td><?= $mahasiswa ['jk'];?></td>
            <td><?= $mahasiswa ['telepon'];?></td>
            <td width="20%" class="text-center">
            <a href="detail-mahasiswa.php?id_mahasiswa=<?=$mahasiswa['id_mahasiswa']; ?>" class="btn btn-secondary" >Detail</a>
                <a href="ubah-mahasiswa.php?id_mahasiswa=<?=$mahasiswa['id_mahasiswa']; ?>" class="btn btn-success" >Edit</a>
                <a href="hapus-mahasiswa.php?id_mahasiswa=<?=$mahasiswa['id_mahasiswa']; ?>" class="btn btn-danger" onclick="return confirm('Yakin Data Mahasiswa Akan Di Hapus.');">Hapus</a>
            </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    </div>

<?php include 'layout/footer.php'; ?>