<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

$mail = new PHPMailer(true);

try {
    //Server settings
    $mail->isSMTP();
    $mail->Host       = 'smtp.gmail.com';
    $mail->SMTPAuth   = true;
    $mail->Username   = 'your-gmail@gmail.com';
    $mail->Password   = 'your-app-password';  // App password, NOT your Gmail password!
    $mail->SMTPSecure = 'tls';
    $mail->Port       = 587;

    //Recipients
    $mail->setFrom('your-gmail@gmail.com', 'Elite Events');
    $mail->addAddress('recipient-email@gmail.com');     // Change to your recipient email

    // Content
    $mail->isHTML(true);
    $mail->Subject = 'Elite Events Booking Confirmation';
    $mail->Body    = '<h3>Your booking was successful!</h3><p>We will contact you shortly.</p>';

    $mail->send();
    echo 'Email has been sent successfully!';
} catch (Exception $e) {
    echo "Email could not be sent. Error: {$mail->ErrorInfo}";
}
?>
