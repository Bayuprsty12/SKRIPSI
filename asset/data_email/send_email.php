<?php
// PASSWORD/SANDI EMAIL = osqvrgfwbbpauled

require '../../asset/vendor/autoload.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;

function send_email(){
    $name = "Sistem Monitoring Listrik"; 
    $email = "bayuprsty2001@gmail.com";
    $subject = "-- WARNING!!! PENGGUNAAN LISTRIK --";
    $message = "
    Halo, Bayu Prasetiyo

    Sistem mengirimkan Anda Pesan WARNING! PENGGUNAAN LISTRIK, Oleh karena itu, Sistem ingin Anda tahu bahwa ada Penggunaan listrik berlebih. SEGERA PERIKSA secara detail penggunaannya di http://192.168.147.249/monitoring_daya_listrik/ Sekian Dan Terimakasih.

    Salam HEMAT,
    
    Monitoring Listrik 
    ";

    $mail = new PHPMailer(true);

    $mail->isSMTP();
    $mail->SMTPAuth = true;

    $mail->Host = "smtp.gmail.com";
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port = 587;

    $mail->Username = "bayuprsty2001@gmail.com";
    $mail->Password = "osqvrgfwbbpauled";

    $mail->setFrom($email, $name);
    $mail->addAddress("bayuprasetiyo0102@gmail.com", "Bayu");

    $mail->Subject = $subject;
    $mail->Body = $message;

   $mail->send();
   //echo "email Terkirim";

}
//send_email();

?>