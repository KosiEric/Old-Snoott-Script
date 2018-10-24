<?php
 ob_start();
//header('Content-type:application/json');
require $_SERVER['DOCUMENT_ROOT'].'/Web_Data/incs/config.php';
require $_SERVER['DOCUMENT_ROOT'].'/phpmailer/PHPMailerAutoload.php';
session_start();
error_reporting(false);
if($_SERVER['REQUEST_METHOD'] != 'POST'){

    exit();
}
 class Account  {



public static function isReady () {


if(isset($_POST['data']) && !empty($_POST['data'])) {

    return true;

}

else {

    return false;
}
}
public static function isUsername () {
    $conn = mysqli_init();
    $data = json_decode($_POST['data'] , true);

    if(mysqli_real_connect($conn , HOST , USER , PASSWORD , DB)) {

$username = trim(mysqli_real_escape_string($conn , $data['username']));


$query = "SELECT username FROM users WHERE username = '{$username}'";

if($query = mysqli_query($conn  , $query)) {

    $num_rows = mysqli_num_rows($query);
settype($num_rows, 'integer');
    if($num_rows === 0) {

        return true;
    }

    else {

        return false;
    }
}

else {

    return false;
}

}

else {

    return false;
}

}

public static function isEmail () {
    $conn = mysqli_init();
    $data = json_decode($_POST['data'] , true);

    if(mysqli_real_connect($conn , HOST , USER , PASSWORD , DB)) {

$email = trim(mysqli_real_escape_string($conn , $data['email']));


$query = "SELECT email FROM users WHERE email = '{$email}'";

if($query = mysqli_query($conn  , $query)) {

    $num_rows = mysqli_num_rows($query);
settype($num_rows, 'integer');
    if($num_rows === 0) {

        return true;
    }

    else {

        return false;
    }
}

else {

    return false;
}

}

else {

    return false;
}

}

public static function isPhone() {
    $conn = mysqli_init();
    $data = json_decode($_POST['data'] , true);

    if(mysqli_real_connect($conn , HOST , USER , PASSWORD , DB)) {

$phone = trim(mysqli_real_escape_string($conn , $data['phone']));
if(mb_strlen($phone) == 10) {

    $phone = "0$phone";
}


$query = "SELECT phone FROM users WHERE phone = '{$phone}'";

if($query = mysqli_query($conn  , $query)) {

    $num_rows = mysqli_num_rows($query);
settype($num_rows, 'integer');
    if($num_rows === 0) {

        return true;
    }

    else {

        return false;
    }
}

else {

    return false;
}

}

else {

    return false;
}

}


public function createAccount () {

$data = json_decode($_POST['data'] , true);
$conn = mysqli_init();
if(mysqli_real_connect ($conn , HOST , USER , PASSWORD , DB)) {


$phone = $data['phone'];
if(mb_strlen($phone) == 10) {

    $phone = "0$phone";
}


$username = $data['username'];
$email = htmlentities(trim(mysqli_real_escape_string($conn , $data['email'])));
$password = md5(mysqli_real_escape_string($conn , trim($data['password'])));

$date = date('D d M Y h:i:s a');
    $insert = "INSERT INTO `users` ( `username`, `email`, `phone`,   `password`, `date_created` , `fullname` , `profile` ,
     `state` , `institution` ,  `account_type` , `email_verified` , `active`) VALUES
    ('{$username}' , '{$email}', '{$phone}', '{$password}' , '{$date}' , '' , 'user.png' , '' , '' , 'user' , '0' , '1')";

    if(mysqli_query($conn , $insert)) {

        return true;
    }

    else {

        return mysqli_error($conn);
    }
}

}

public function sendEmail () {


$mail = new PHPMailer;

//$mail->SMTPDebug = 3;
$data = json_decode($_POST['data'] , true);                              // Enable verbose debug output
$email = $data['email'];
$username = $data['username'];
$mail->isSMTP();                                      // Set mailer to use SMTP
$mail->Host = PRIMARY_EMAIL_SERVER;  // Specify main and backup SMTP servers
$mail->SMTPAuth = true;
//$mail->SMTPDebug = 3;                              // Enable SMTP authentication
$mail->Username = PRIMARY_EMAIL;                 // SMTP username
$mail->Password = PRIMARY_EMAIL_PASSWORD;                           // SMTP password
$mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
$mail->Host = gethostbyname(PRIMARY_EMAIL_SERVER);
$mail->SMTPOptions = array('ssl' => array('verify_peer_name' => false));

$mail->Port = 465;                                    // TCP port to connect to

$mail->setFrom(PRIMARY_EMAIL, 'Victor From '.COMPANY_NAME);
$mail->addAddress($email, $username);     // Add a recipient
//$mail->addAddress('ellen@example.com');               // Name is optional
$mail->addReplyTo(PRIMARY_EMAIL, COMPANY_NAME);
// $mail->addCC('cc@example.com');
//$mail->addBCC('bcc@example.com');

//$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
//$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
$mail->isHTML(true);                                  // Set email format to HTML
require_once ($_SERVER['DOCUMENT_ROOT'].'/emails/welcome_email.php');
$mail->Subject = 'Welcome to '.COMPANY_NAME;
$mail->Body    = $body;
$mail->AltBody = 'Please enable HTML view to view the content of this E-mail properly.';

if(!$mail->send()) {
  // return 'Mailer Error: ' . $mail->ErrorInfo;
return false;
} else {
 return  true;
}
}
public function Confirm() {

    if($this->isReady()) {
$data = json_decode($_POST['data'] , true);
        if($this->isUsername() && !file_exists($_SERVER['DOCUMENT_ROOT'].$data['username']).'.php') {
if($this->isEmail()) {
    if($this->isPhone()){


if($this->createAccount()) {
    if($this->sendEmail()){


$report_array = Array ("success" => 1 ,"error" => "Success"
        );

$time = time();
$plus_30_days = $time * 60 * 1 * 24 * 30;
$data = json_decode($_POST['data'] , true);                              // Enable verbose debug output
$email = $data['email'];
$username = $data['username'];
    setcookie('user', $username, $plus_30_days , '/' , 'www.snoott.com');
$_COOKIE['user'] = $username;
$_SESSION['new_email'] = $email;
            return json_encode($report_array);
}
else {

    $time = time();
    $plus_30_days = $time * 60 * 1 * 24 * 30;

$data = json_decode($_POST['data'] , true);                              
// Enable verbose debug output
$email = $data['email'];
$username = $data['username'];
    setcookie('user', $username, $plus_30_days , '/' , 'www.snoott.com');
    $_SESSION['new_email'] = $email;
$_COOKIE['user'] = $username;
$report_array = Array ("success" => 1 ,"error" => "email not sent"
        );
            return json_encode($report_array);

}
}

}
else {

    $report_array = Array ("success" => 0 ,
"error" => "contact exists."
        );
            return json_encode($report_array);
}
}
else {

    $report_array = Array ("success" => 0 ,
"error" => "E-mail exists."
        );
            return json_encode($report_array);
}
        }

        else {

            $report_array = Array ("success" => 0 ,
"error" => "username exists."
        );
            return json_encode($report_array);
        }
    }
}

}

$account = new Account();

echo $account->Confirm();





?>
