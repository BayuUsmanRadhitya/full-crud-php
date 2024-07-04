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
$id_barang = (int)$_GET['id_barang'];

if (delete_barang($id_barang) > 0) {
        echo"<script>
                        alert('Data Barang Berhasil Di Hapus');
                        document.location.href='index.php';
                    </script>";
            }else {
                echo"<script>
                        alert('Data Barang Gagal Di Hapus');
                        document.location.href='index.php';
                    </script>";
}
?>