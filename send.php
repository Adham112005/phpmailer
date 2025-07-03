<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

// بيانات الفورم
$name = $_POST['name'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$message = $_POST['message'];

// إعداد PHPMailer
$mail = new PHPMailer(true);

try {
    // إعدادات SMTP
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com'; 
    $mail->SMTPAuth = true;
    $mail->Username = 'adhammotaz59@gmail.com';     // <-- عدل هنا
    $mail->Password = 'bsznohtxmhqtgyvu';         // <-- عدل هنا (app password)
    $mail->SMTPSecure = 'tls';
    $mail->Port = 587;

    // بيانات المرسل والمستقبل
    $mail->setFrom($email, $name);
    $mail->addAddress('bilal27205@gmail.com');  // <-- عدل هنا (الإيميل اللي هيوصله الميل)

    // محتوى الرسالة
    $mail->isHTML(true);
    $mail->Subject = 'New message from contact form';
    $mail->Body    = "
        <h3>Contact Details</h3>
        <b>Name:</b> {$name}<br>
        <b>Email:</b> {$email}<br>
        <b>Phone:</b> {$phone}<br>
        <b>Message:</b> {$message}
    ";

    $mail->send();
    echo "Message sent successfully!";
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
?>
