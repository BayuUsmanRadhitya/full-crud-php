<?php

$title = "Kirim Email";
include 'layout/header.php';

if (!isset($_SESSION["login"])) {
    echo"<script>
            alert('Login Dulu!!');
            document.location.href='login.php';
        </script>";
    exit;
  }
  

use PHPMailer\PHPMailer\PHPMailer;

require 'vendor/autoload.php';
$mail = new PHPMailer(true);

$mail->SMTPDebug = 2;
$mail->isSMTP();
$mail->Host = 'smtp.gmail.com';
$mail->SMTPAuth = true;
$mail->Username = 'usmanradhityab@gmail.com';
$mail->Password = 'cipolzhdeqcgntot';
$mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
$mail->Port = 465;

if (isset($_POST['kirim'])) {
    $mail->setFrom('usmanradhityab@gmail.com', 'Bayu Usman Radhitya');
    $mail->addAddress($_POST['email_penerima']);
    $mail->addReplyTo('usmanradhityab@gmail.com', 'Bayu Usman Radhitya');

    $mail->Subject = $_POST['subject'];
    $mail->Body = $_POST['pesan'];

    if ($mail->send()) {
        echo "<script>
            alert('Email Berhasil Dikirimkan');
            document.location.href = 'email.php';
        </script>";
    } else {
        echo "<script>
            alert('Email Gagal Dikirimkan');
            document.location.href = 'email.php';
        </script>";
    }
    exit();
}

?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">
                        <ia class="fas fa-envelope"></ia> Kirim Email
                    </h1>
                </div>
                <div class="col-sm-6">
                    <ol class="col-sm-12">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item active">Kirim Email</li>
                        </ol>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <section class="content">
        <div class="container-fluid">
            <form action="" method="post">
                <div class="mb-3">
                    <label for="email_penerima" class="form-label">Email Penerima</label>
                    <input type="email" class="form-control" id="email_penerima" name="email_penerima" placeholder="Email Penerima" required>
                </div>
                <div class="mb-3">
                    <label for="subject" class="form-label">Subject</label>
                    <input type="text" class="form-control" id="subject" name="subject" placeholder="Subject" required>
                </div>
                <div class="mb-3">
                    <label for="pesan" class="form-label">Pesan</label>
                    <textarea name="pesan" id="pesan" cols="30" rows="10" class="form-control"></textarea>
                </div>
                <button type="submit" class="btn btn-primary" name="kirim" style="float: right;">Kirim</button>
            </form>
        </div>
    </section>
</div>
<?php include 'layout/footer.php'; ?>