<?php
session_start();

if (!isset($_SESSION["login"])) {
    echo"<script>
            alert('Login Dulu!!');
            document.location.href='login.php';
        </script>";
    exit;
}

include 'config/app.php';
$id_mahasiswa = (int)$_GET['id_mahasiswa'];

if (delete_mahasiswa($id_mahasiswa) > 0) {
        echo"<script>
                        alert('Data Mahasiswa Berhasil Di Hapus');
                        document.location.href='mahasiswa.php';
                    </script>";
            }else {
                echo"<script>
                        alert('Data Mahasiswa Gagal Di Hapus');
                        document.location.href='mahasiswa.php';
                    </script>";
}
?>