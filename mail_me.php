<?php
 ob_start();
//header('Content-type:application/json');
require $_SERVER['DOCUMENT_ROOT'].'/Web_Data/incs/config.php';
require $_SERVER['DOCUMENT_ROOT'].'/phpmailer/PHPMailerAutoload.php';

$mail = new PHPMailer;

//$mail->SMTPDebug = 3;
//$data = json_decode($_POST['data'] , true);                              // Enable verbose debug output
$mail->isSMTP();                                      // Set mailer to use SMTP
$mail->Host = PRIMARY_EMAIL_SERVER;  // Specify main and backup SMTP servers
$mail->SMTPAuth = true;
//$mail->SMTPDebug = 3;                              // Enable SMTP authentication
$mail->Username = PRIMARY_EMAIL;                 // SMTP username
$mail->Password = PRIMARY_EMAIL_PASSWORD;                           // SMTP password
$mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
$mail->Port = 465;                                    // TCP port to connect to

 
$mail->setFrom(PRIMARY_EMAIL, 'Victor From '.COMPANY_NAME);
$mail->addAddress('itskosieric@gmail.com', 'Kosi');     // Add a recipient
//$mail->addAddress('ellen@example.com');               // Name is optional
$mail->addReplyTo(PRIMARY_EMAIL, COMPANY_NAME);
// $mail->addCC('cc@example.com');
//$mail->addBCC('bcc@example.com');

//$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
//$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
$mail->isHTML(true);                                  // Set email format to HTML
//require_once ($_SERVER['DOCUMENT_ROOT'].'/emails/welcome_email.php');
$mail->Subject = 'Welcome to '.COMPANY_NAME;
$mail->Body    = 'Hi just testing out some php functions';
$mail->AltBody = 'Please enable HTML view to view the content of this E-mail properly.';

if(!$mail->send()) {
  // return 'Mailer Error: ' . $mail->ErrorInfo;
echo 'false'. $mail->ErrorInfo;
} else {
 echo  'true';
}



?>