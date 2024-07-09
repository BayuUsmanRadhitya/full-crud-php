use PHPMailer\PHPMailer\PHPMailer;

require 'vendor/autoload.php';
$mail = new PHPMailer(true);

$mail->SMTPDebug = 2;
$mail->isSMTP();
$mail->Host = 'smtp.gmail.com';
$mail->SMTPAuth = true;
$mail->Username = 'echagaming12@gmail.com';
$mail->Password = 'plewmhtiarnosvhy';
$mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
$mail->Port = 465;

if (isset($_POST['kirim'])) {
    $mail->setFrom('echagaming12@gmail.com', 'Mahesa');
    $mail->addAddress($_POST['email_penerima']);
    $mail->addReplyTo('echagaming12@gmail.com', 'Mahesa');

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
