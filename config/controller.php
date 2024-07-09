<?php

//fungsi menampilkan (read)
function select($query)
{
    global $db;

    $result = mysqli_query($db, $query);
    $rows = [];

    while ($row = mysqli_fetch_assoc($result)){
        $rows[] = $row;
    }
    return $result;
}

//fungsi menambahkan data barang
function create_barang($post)
{
    global $db;

    $nama = strip_tags($post['nama']);
    $jumlah = strip_tags($post['jumlah']);
    $harga = strip_tags($post['harga']);
    $barcode = rand(100000, 999999);

    //query tambah data
    $query = "INSERT INTO barang VALUES(null, '$nama', '$jumlah', '$harga', '$barcode', CURRENT_TIMESTAMP())";

    mysqli_query($db, $query);

    return mysqli_affected_rows($db);
}

// fungsi mengubah data barang
function update_barang($post)
{
    global $db;

    $id_barang = strip_tags($post['id_barang']);
    $nama = strip_tags($post['nama']);
    $jumlah = strip_tags($post['jumlah']);
    $harga = strip_tags($post['harga']);

    //query ubah data
    $query = "UPDATE barang SET nama = '$nama', jumlah = '$jumlah', harga = '$harga' WHERE id_barang = '$id_barang'";
    
    mysqli_query($db, $query);

    return mysqli_affected_rows($db);
}

//fungsi menghapus data barang
function delete_barang($id_barang)
{
    global $db;

    //query hapus data barang
    $query = "DELETE FROM barang WHERE id_barang = $id_barang";

    mysqli_query($db, $query);

    return mysqli_affected_rows($db);
}

//fungsi menambahkan data mahasiswa
function create_mahasiswa($post)
{
    global $db;

    $nama = strip_tags($post['nama']);
    $prodi = strip_tags($post['prodi']);
    $jk = strip_tags($post['jk']);
    $telepon = strip_tags($post['telepon']);
    $alamat = strip_tags($post['alamat']);
    $email = strip_tags($post['email']);
    $foto = upload_file();

    // check upload foto
    if (!$foto) {
        return false;
    }

    //query tambah data
    $query = "INSERT INTO mahasiswa VALUES(null, '$nama', '$prodi', '$jk', '$telepon', '$alamat', '$email', '$foto')";

    mysqli_query($db, $query);

    return mysqli_affected_rows($db);
}

// fungsi mengupload file
function upload_file()
{
    $namaFile = $_FILES['foto']['name'];
    $ukuranFile = $_FILES['foto']['size'];
    $error = $_FILES['foto']['error'];
    $tmpName = $_FILES['foto']['tmp_name'];

    // check file yang diupload
    $extensifileValid = ['jpg', 'jpeg', 'png'];
    $extensifile = explode('.', $namaFile);
    $extensifile = strtolower(end($extensifile));

    // check format/extensi file
    if (!in_array($extensifile, $extensifileValid)){
        echo "<script>
            alert('Format file tidak valid');
            document.location.href = 'tambah-mahasiswa.php';
            </script>";
        die();
    }

    // check ukuran file 2 MB
    if ($ukuranFile > 2048000) {
        echo "<script>
            alert('Format file tidak valid');
            document.location.href = 'tambah-mahasiswa.php';
            </script>";
        die();
    }

    // generate nama file baru
    $namaFileBaru = uniqid();
    $namaFileBaru .= '.';
    $namaFileBaru .= $extensifile;

    // pindahkan ke folder local
    move_uploaded_file($tmpName, 'assets/img/'. $namaFileBaru);
    return $namaFileBaru;
}

//fungsi menghapus data mahasiswa
function delete_mahasiswa($id_mahasiswa)
{
    global $db;

    //query hapus data mahasiswa
    $query = "DELETE FROM mahasiswa WHERE id_mahasiswa = $id_mahasiswa";

    mysqli_query($db, $query);

    return mysqli_affected_rows($db);
}

//fungsi menambahkan data mahasiswa
function update_mahasiswa($post)
{
    global $db;

    $id_mahasiswa = strip_tags($post['id_mahasiswa']);
    $nama = strip_tags($post['nama']);
    $prodi = strip_tags($post['prodi']);
    $jk = strip_tags($post['jk']);
    $telepon = strip_tags($post['telepon']);
    $alamat = strip_tags($post['alamat']);
    $email = strip_tags($post['email']);
    $fotolama = strip_tags($post['fotolama']);;

    // check upload foto baru atau tidak
    if ($_FILES['foto']['error'] == 4) {
        $foto = $fotolama;
    }else{
        $foto = upload_file();
    }

    //query ubah data
    $query = "UPDATE mahasiswa SET nama = '$nama', prodi = '$prodi', jk = '$jk', telepon = '$telepon', alamat = '$alamat', email = '$email', foto = '$foto' WHERE id_mahasiswa = $id_mahasiswa";

    mysqli_query($db, $query);

    return mysqli_affected_rows($db);
}

//fungsi menambahkan data akun
function create_akun($post)
{
    global $db;

    $nama = strip_tags($post['nama']);
    $username = strip_tags($post['username']);
    $email = strip_tags($post['email']);
    $password = strip_tags($post['password']);
    $level = strip_tags($post['level']);

    // enkripsi password
    $password = password_hash($password, PASSWORD_DEFAULT);

    //query tambah data
    $query = "INSERT INTO akun VALUES(null, '$nama', '$username', '$email', '$password', '$level')";

    mysqli_query($db, $query);

    return mysqli_affected_rows($db);
}

//fungsi menghapus data akun
function delete_akun($id_akun)
{
    global $db;

    //query hapus data akun
    $query = "DELETE FROM akun WHERE id_akun = $id_akun";

    mysqli_query($db, $query);

    return mysqli_affected_rows($db);
}

function update_akun($post)
{
    global $db;

    $id_akun = strip_tags($post['id_akun']);
    $nama = strip_tags($post['nama']);
    $username = strip_tags($post['username']);
    $email = strip_tags($post['email']);
    $password = strip_tags($post['password']);
    $level = strip_tags($post['level']);

    // enkripsi password
    $password = password_hash($password, PASSWORD_DEFAULT);

    //query ubah data
    $query = "UPDATE akun SET nama = '$nama', username = '$username', email = '$email', password = '$password', level = '$level' WHERE id_akun = $id_akun";

    mysqli_query($db, $query);

    return mysqli_affected_rows($db);
}
?>