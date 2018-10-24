<?php
 ob_start();
header('Content-type:application/json');
require '../incs/config.php';
require_once '../phpmailer/PHPMailerAutoload.php';
 class Account extends database {


public static function isReady () {


if(isset($_POST['values'] , $_FILES['profile'])) {

if(!empty($_POST['values']) && !empty($_FILES['profile'])) {


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
public static function isUsername () {
    $conn = mysqli_init();     
    $data = json_decode($_POST['values'] , true);
    
    if(mysqli_real_connect($conn , HOST , USER , PASSWORD , DB)) {

$username = trim(mysqli_real_escape_string($conn , $data['username']));


$query = "SELECT username FROM customers WHERE username = '{$username}'";

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
    $data = json_decode($_POST['values'] , true);
    
    if(mysqli_real_connect($conn , HOST , USER , PASSWORD , DB)) {

$email = trim(mysqli_real_escape_string($conn , $data['email']));


$query = "SELECT email FROM customers WHERE email = '{$email}'";

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

public static function isPhoneOne () {
    $conn = mysqli_init();     
    $data = json_decode($_POST['values'] , true);
    
    if(mysqli_real_connect($conn , HOST , USER , PASSWORD , DB)) {

$phoneone = trim(mysqli_real_escape_string($conn , $data['phoneone']));
if(mb_strlen($phoneone) == 10) {

    $phoneone = "0$phoneone";
}


$query = "SELECT first_contact FROM customers WHERE first_contact = '{$phoneone}'";

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


public static function isPhoneTwo () {
    $conn = mysqli_init();     
    $data = json_decode($_POST['values'] , true);
    
    if(mysqli_real_connect($conn , HOST , USER , PASSWORD , DB)) {

$phonetwo = trim(mysqli_real_escape_string($conn , $data['phonetwo']));
if(mb_strlen($phonetwo) == 10) {

    $phonetwo = "0$phonetwo";
}


$query = "SELECT second_contact FROM customers WHERE second_contact = '{$phonetwo}'";

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
    
$data = json_decode($_POST['values'] , true);
$conn = mysqli_init();
if(mysqli_real_connect ($conn , HOST , USER , PASSWORD , DB)) {

$fullname = trim(mysqli_real_escape_string($conn , $data['fullname']));

$address = htmlentities(trim(mysqli_real_escape_string($conn , $data['address'])));
$state = $data['state'];
$phoneone = $data['phoneone'];
if(mb_strlen($phoneone) == 10) {

    $phoneone = "0$phoneone";
}


$phonetwo = $data['phonetwo'];
if(mb_strlen($phonetwo) == 10) {

    $phonetwo = "0$phonetwo";
}

$gender = $data['gender'];
$username = $data['username'];
$file_format = $data['fileFormat'];
$email = htmlentities(trim(mysqli_real_escape_string($conn , $data['email'])));
$password = md5(mysqli_real_escape_string($conn , trim($data['password'])));
$image = "$username$file_format";
$date = date('D d M Y');
    $insert = "INSERT INTO `customers` (`id`, `fullname`, `address`, `state`, `first_contact`, `second_contact`, `gender`, `username`, `email`, `password`, `profile` , `date_created`) VALUES ('NULL', '{$fullname}', '{$address}', '{$state}', '{$phoneone}', '{$phonetwo}', '{$gender}', '{$username}', '{$email}', '{$password}', '{$image}' , '{$date}')";

    if(mysqli_query($conn , $insert)) {

        return true;
    }

    else {

        return false;
    }
}

}

public function uploadImage  () {


    $data = json_decode($_POST['values'] , true);
    $username = $data['username'];
    $fileFormat = $data['fileFormat'];
    $profile = $_FILES['profile'];
    $error = $profile['error'];
    $type = $profile['type'];
    $name = $profile['name'];
    $allowed_formats = Array('image/png' , 'image/jpeg');
   
    if(in_array($type, $allowed_formats) AND $error == 0) {

$tmp_name = $profile['tmp_name'];
$location = "../".PROFILE_FOLDER."/$name";
$new_location = "../".PROFILE_FOLDER."/$username$fileFormat";
// $new_location = "../uploads/$new_profile";
  
if(move_uploaded_file($tmp_name, $location)) {
if(rename($location, $new_location)){

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

public function sendEmail () {


$mail = new PHPMailer;

//$mail->SMTPDebug = 3; 
$data = json_decode($_POST['values'] , true);                              // Enable verbose debug output
$email = $data['email'];
$username = $data['username'];
$mail->isSMTP();                                      // Set mailer to use SMTP
$mail->Host = PRIMARY_EMAIL_SERVER;  // Specify main and backup SMTP servers
$mail->SMTPAuth = true; 
//$mail->SMTPDebug = 3;                              // Enable SMTP authentication
$mail->Username = PRIMARY_EMAIL;                 // SMTP username
$mail->Password = PRIMARY_EMAIL_PASSWORD;                           // SMTP password
$mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
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
require_once ('../emails/welcome_email.php');
$mail->Subject = 'Welcome to Snoott';
$mail->Body    = $body;
$mail->AltBody = 'Please enable HTML view to view the content of this E-mail properly.';

if(!$mail->send()) {
  // return 'Mailer Error: ' . $mail->ErrorInfo;
return false;
} else {
 return  true;
}
}

<?php
 ob_start();
header('Content-type:application/json');
require '../config.php';
require_once '../phpmailer/PHPMailerAutoload.php';
 class Account extends database {


public static function isReady () {


if(isset($_POST['values'] , $_FILES['profile'])) {

if(!empty($_POST['values']) && !empty($_FILES['profile'])) {


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
public static function isUsername () {
    $conn = mysqli_init();     
    $data = json_decode($_POST['values'] , true);
    
    if(mysqli_real_connect($conn , HOST , USER , PASSWORD , DB)) {

$username = trim(mysqli_real_escape_string($conn , $data['username']));


$query = "SELECT username FROM customers WHERE username = '{$username}'";

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
    $data = json_decode($_POST['values'] , true);
    
    if(mysqli_real_connect($conn , HOST , USER , PASSWORD , DB)) {

$email = trim(mysqli_real_escape_string($conn , $data['email']));


$query = "SELECT email FROM customers WHERE email = '{$email}'";

if($query = mysqli_query($conn  , $query)) {

    $num_rows = mysqli_num_rows($query);
settype($num_rows, 'integer');
    if($num_rows === 0) {
$plus_30_days = $time * 60 * 1 * 24 * 30;

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

public static function isPhoneOne () {
    $conn = mysqli_init();     
    $data = json_decode($_POST['values'] , true);
    
    if(mysqli_real_connect($conn , HOST , USER , PASSWORD , DB)) {

$phoneone = trim(mysqli_real_escape_string($conn , $data['phoneone']));
if(mb_strlen($phoneone) == 10) {

    $phoneone = "0$phoneone";
}


$query = "SELECT first_contact FROM customers WHERE first_contact = '{$phoneone}'";

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


public static function isPhoneTwo () {
    $conn = mysqli_init();     
    $data = json_decode($_POST['values'] , true);
    
    if(mysqli_real_connect($conn , HOST , USER , PASSWORD , DB)) {

$phonetwo = trim(mysqli_real_escape_string($conn , $data['phonetwo']));
if(mb_strlen($phonetwo) == 10) {

    $phonetwo = "0$phonetwo";
}


$query = "SELECT second_contact FROM customers WHERE second_contact = '{$phonetwo}'";

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
    
$data = json_decode($_POST['values'] , true);
$conn = mysqli_init();
if(mysqli_real_connect ($conn , HOST , USER , PASSWORD , DB)) {

$fullname = trim(mysqli_real_escape_string($conn , $data['fullname']));

$address = htmlentities(trim(mysqli_real_escape_string($conn , $data['address'])));
$state = $data['state'];
$phoneone = $data['phoneone'];
if(mb_strlen($phoneone) == 10) {

    $phoneone = "0$phoneone";
}


$phonetwo = $data['phonetwo'];
if(mb_strlen($phonetwo) == 10) {

    $phonetwo = "0$phonetwo";
}

$gender = $data['gender'];
$username = $data['username'];
$file_format = $data['fileFormat'];
$email = htmlentities(trim(mysqli_real_escape_string($conn , $data['email'])));
$password = md5(mysqli_real_escape_string($conn , trim($data['password'])));
$image = "$username$file_format";
$date = date('D d M Y');
    $insert = "INSERT INTO `customers` (`id`, `fullname`, `address`, `state`, `first_contact`, `second_contact`, `gender`, `username`, `email`, `password`, `profile` , `date_created`) VALUES ('NULL', '{$fullname}', '{$address}', '{$state}', '{$phoneone}', '{$phonetwo}', '{$gender}', '{$username}', '{$email}', '{$password}', '{$image}' , '{$date}')";

    if(mysqli_query($conn , $insert)) {

        return true;
    }

    else {

        return false;
    }
}

}

public function uploadImage  () {


    $data = json_decode($_POST['values'] , true);
    $username = $data['username'];
    $fileFormat = $data['fileFormat'];
    $profile = $_FILES['profile'];
    $error = $profile['error'];
    $type = $profile['type'];
    $name = $profile['name'];
    $allowed_formats = Array('image/png' , 'image/jpeg');
   
    if(in_array($type, $allowed_formats) AND $error == 0) {

$tmp_name = $profile['tmp_name'];
$location = "../".PROFILE_FOLDER."/$name";
$new_location = "../".PROFILE_FOLDER."/$username$fileFormat";
// $new_location = "../uploads/$new_profile";
  
if(move_uploaded_file($tmp_name, $location)) {
if(rename($location, $new_location)){

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

public function sendEmail () {


$mail = new PHPMailer;

//$mail->SMTPDebug = 3; 
$data = json_decode($_POST['values'] , true);                              // Enable verbose debug output
$email = $data['email'];
$username = $data['username'];
$mail->isSMTP();                                      // Set mailer to use SMTP
$mail->Host = PRIMARY_EMAIL_SERVER;  // Specify main and backup SMTP servers
$mail->SMTPAuth = true; 
//$mail->SMTPDebug = 3;                              // Enable SMTP authentication
$mail->Username = PRIMARY_EMAIL;                 // SMTP username
$mail->Password = PRIMARY_EMAIL_PASSWORD;                           // SMTP password
$mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
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
require_once ('../emails/welcome_email.php');
$mail->Subject = 'Welcome to Gidimi';
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

        if($this->isUsername()) {
if($this->isEmail()) {
    if($this->isPhoneOne()){
        if($this->isPhoneTwo()){
if($this->uploadImage()) {

if($this->createAccount()) {
    if($this->sendEmail()){


$report_array = Array ("success" => 1 ,"error" => "Success"
        );

$time = time();

$data = json_decode($_POST['values'] , true);                              // Enable verbose debug output
$email = $data['email'];
$username = $data['username'];
    setcookie('user', $username, $time * 60 * 1 * 24 * 30 , '/' ,  null , true, false);

            return json_encode($report_array);
}
else {

    $time = time();

$data = json_decode($_POST['values'] , true);                              // Enable verbose debug output
$email = $data['email'];
$username = $data['username'];
    setcookie('user', $username, $time * 60 * 1 * 24 * 30 , '/' ,  null , true, false);
$report_array = Array ("success" => 1 ,"error" => "email"
        );
            return json_encode($report_array);

}
}
}

else {

$report_array = Array ("success" => 0 ,
"error" => "Image not uploaded succesfully."
        );
            return json_encode($report_array);


}
}
else {

    $report_array = Array ("success" => 0 ,
"error" => "second contact already exists."
        );
            return json_encode($report_array);
}
}
else {

    $report_array = Array ("success" => 0 ,
"error" => "first contact already exists."
        );
            return json_encode($report_array);
}
}
else {

    $report_array = Array ("success" => 0 ,
"error" => "E-mail address already exists."
        );
            return json_encode($report_array);
}
        }

        else {

            $report_array = Array ("success" => 0 ,
"error" => "username already exists."
        );
            return json_encode($report_array);
        }
    }
}

}

$account = new Account();

echo $account->Confirm();
    




?>


}

$account = new Account();

echo $account->Confirm();
    




?>

