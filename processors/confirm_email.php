<?php  
ob_start();
session_start();
require_once $_SERVER['DOCUMENT_ROOT'].'/Web_Data/incs/config.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/phpmailer/PHPMailerAutoload.php';
//header('Content-type:application/json');
error_reporting(false);
class confirmEmail {
public $token;
    public function  isReady () {

if(isset($_POST['email']) && !empty($_POST['email'])){

    return true;
}

else {

    return false;
}

    }
public function isAlreadyInserted() {

$user = $_SESSION['user_details']['username'];
$conn = mysqli_init();
if(mysqli_real_connect ($conn , HOST , USER , PASSWORD , DB)){


    $sql = "SELECT username FROM email_verification WHERE username = '{$user}'";

    if($query = mysqli_query($conn , $sql)){

        $num_rows = mysqli_num_rows($query);

        if($num_rows == 0){

            return false;
        }

        else {

            return true;
        }
    }
}



}
    public function generateToken () {

$username = $_SESSION['user_details']['username'];
$email = $_SESSION['user_details']['email'];
$today = date('D d M Y');

$conn = mysqli_init();

if(mysqli_real_connect($conn , HOST , USER , PASSWORD , DB)){

    $sql = "SELECT * FROM email_verification WHERE username = '{$username}'";

    if($run = mysqli_query($conn , $sql)){
$db_token = mysqli_fetch_assoc($run);
if(empty($db_token)){
$time = time();
$rand2 = rand(ceil($time * microtime(true)) , ceil(rand(microtime() * $time , $time * 1000)));
$rand3 = sha1($rand2);

return $rand3;


    }

    else {
$token = $db_token['token'];
return $token;

    }
}
}

    }

    public function  isToken () {

       $token = $this->generateToken();
        $this->token = $token;
        //return ($token == $this->token);
        $conn = mysqli_init();
  $user = $_SESSION['user_details']['username'];
        if(mysqli_real_connect ($conn , HOST , USER , PASSWORD , DB )){

            $query = "SELECT token FROM email_verification WHERE token = '{$token}' AND username != '{$user}'";
            if($run = mysqli_query($conn , $query)) {

                $num_rows = mysqli_num_rows($run);

                if($num_rows == 0){
                     return true;

                }

                else {

                    $this->isToken();

                }
            }
        }

    }


        public function sendEmail () {

            $mail = new PHPMailer;

//$mail->SMTPDebug = 3;
$email = $_SESSION['user_details']['email'];
$username = $_SESSION['user_details']['username'];
$token = $this->token;

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
require ($_SERVER['DOCUMENT_ROOT'].'/emails/confirm_email.php');
$mail->Subject = 'E-mail confirmation from '.COMPANY_NAME;
$mail->Body    = $body;
$mail->AltBody = 'Please enable HTML view to view the content of this E-mail properly.';

if(!$mail->send()) {
  // return 'Mailer Error: ' . $mail->ErrorInfo;
return false;
} else {
 return  true;
}
        }

        public function insertToDatabase () {

           $username = $_SESSION['user_details']['username'];
            $email = $_SESSION['user_details']['email'];
           $token =$this->token;
                $today = date('D d M Y');


            $conn = mysqli_init();

            if(mysqli_real_connect($conn , HOST , USER , PASSWORD , DB)){

                $sql = "INSERT INTO email_verification (`username` , `email` , `date_created` ,`token` )
                VALUES (    '{$username}' , '{$email}' , '{$today}' , '{$token}')";

                if($insert = mysqli_query($conn , $sql)){

                    return true;
                }

                else {

                    return false;
                }
            }
        }

        public function Processor () {
if($this->isReady()){

    if($this->isToken()){

        if($this->isAlreadyInserted()){

if($this->sendEmail()){


$report_array = Array("success" => 1 , "error" => "E-mail verification  link sent successfully" ,
 "email" => $_SESSION['user_details']['email']);
return json_encode($report_array);

}

else {

$report_array = Array("success" => 0 , "error" => "Network not reachable" ,
 "email" => $_SESSION['user_details']['email']);
return json_encode($report_array);

}

        }

        else if($this->insertToDatabase()){
if($this->sendEmail()){
$report_array = Array("success" => 1 , "error" => "E-mail verification  link sent successfully" ,
 "email" => $_SESSION['user_details']['email']);

}

else {
$report_array = Array("success" => 0 , "error" => "Network not reachable" ,
 "email" => $_SESSION['user_details']['email']);
return json_encode($report_array);


}

           }

           else {

             $report_array = Array("success" => 0 , "error" => "an unknown error occured");
return json_encode($report_array);
           }


    }
}

        }


    }







$confirmEmail = new confirmEmail;
echo $confirmEmail->Processor();

?>
