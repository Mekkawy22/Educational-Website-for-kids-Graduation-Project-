<?php
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require 'mailer/autoload.php';

//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer();

    //Server settings
    $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->setFrom('mekawybuisnuess@gmail.com', 'KidsCode academy');
    $mail->Username   = 'mekawybuisnuess@gmail.com';                     //SMTP username
    $mail->Password   = 'tdor ocaj zzag grtw';                               //SMTP password
    $mail->SMTPSecure = 'ssl';            //Enable implicit TLS encryption
    $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
// content 
$mail->isHTML(true);
$mail->CharSet = "UTF-8";


 // استقبال البيانات من النموذج
 $recipient_email = $_POST['email'];
 $reply_message = $_POST['message'];

 // تحديث عنوان البريد الإلكتروني المستلم
 $mail->addAddress($recipient_email);

 // تحديث جسم البريد الإلكتروني
 $mail->Body = $reply_message;

 // إرسال البريد الإلكتروني
 if(!$mail->send()) {
     echo 'Message could not be sent.';
     echo 'Mailer Error: ' . $mail->ErrorInfo;
 } else {
     echo 'Message has been sent';
 }
 echo '<script>alert("تم الإرسال بنجاح!");</script>';
echo '<script>window.location.href = "AdminDashboard.php";</script>';


?>