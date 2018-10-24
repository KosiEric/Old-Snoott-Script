<?php 


ob_start();
require_once $_SERVER['DOCUMENT_ROOT'].'/Web_Data/incs/config.php';
require $_SERVER['DOCUMENT_ROOT'].'/phpmailer/PHPMailerAutoload.php';
error_reporting(false);
/*if($_SERVER['REQUEST_METHOD'] !== 'POST'){

    die();


}
*/
//header('Content-type:application/json');


class recoverPassword {



    private $email ;
    private $token;
    private $type; 

    public function isReady(){

        if(isset($_POST['data']) AND !empty($_POST['data'])){
$data = $_POST['data'];
            $data_array = json_decode($data , true);
            $this->email = $data_array['email'];
            $this->type = $data_array['type'];
            //$this->token = $data_array['token'];
            return true;
        }
else {
    return false;
}

    }

public function isEmail (){
$type = $this->type;
$email = $this->email;
    $conn = mysqli_init();
    if(mysqli_real_connect($conn , HOST , USER , PASSWORD , DB)){


    $sql = "SELECT $type FROM users WHERE $type = '{$email}'";
if($run = mysqli_query($conn , $sql)){
$num_rows = mysqli_num_rows($run);
if($num_rows == 1){

    return true;
}

else {

    return false;
}

    }
}
}

public function getUsername () {

    $type=$this->type;
    $email = $this->email;
    if($type == 'username'){

        return $email;
    }

    else {

        $conn = mysqli_init();
        if(mysqli_real_connect($conn , HOST , USER , PASSWORD , DB)){

            $sql = "SELECT username FROM users WHERE email = '{$email}'";
            if($query = mysqli_query($conn , $sql)){

             $query_array = mysqli_fetch_assoc($query);
                return $username = $query_array['username'];
            }
        }
    }
}


    public function getEmail () {
 $type=$this->type;
    $email = $this->email;
    if($type == 'email'){

        return $email;
    }

    else {

        $conn = mysqli_init();
        if(mysqli_real_connect($conn , HOST , USER , PASSWORD , DB)){

            $sql = "SELECT email FROM users WHERE username = '{$email}'";
            if($query = mysqli_query($conn , $sql)){

             $query_array = mysqli_fetch_assoc($query);
                return $email = $query_array['email'];
            }
        }
    }
        
    }
    public function generateToken () {

$today = date('D d M Y');

$conn = mysqli_init();
$type = $this->type;
$username = $this->getUsername();
if(mysqli_real_connect($conn , HOST , USER , PASSWORD , DB)){

    $sql = "SELECT * FROM password_recovery WHERE username = '{$username}'";

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


public function isAlreadyInserted() {

$user = $this->getUsername();
$conn = mysqli_init();
if(mysqli_real_connect ($conn , HOST , USER , PASSWORD , DB)){


    $sql = "SELECT username FROM password_recovery WHERE username = '{$user}'";

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

        public function insertToDatabase () {

           $username = $this->getUsername();
            $email = $this->getEmail();
           $token =$this->token;
                $today = date('D d M Y');


            $conn = mysqli_init();

            if(mysqli_real_connect($conn , HOST , USER , PASSWORD , DB)){

                $sql = "INSERT INTO password_recovery (`username` , `email` , `date_created` ,`token` ) 
                VALUES (    '{$username}' , '{$email}' , '{$today}' , '{$token}')";

                if($insert = mysqli_query($conn , $sql)){

                    return true;
                }

                else {

                    return false;
                }
            }
        }

    public function  isToken () {

       $token = $this->generateToken();
        $this->token = $token;
       // return ($token == $this->token);
        $conn = mysqli_init();
  $user = $this->getUsername();
        if(mysqli_real_connect ($conn , HOST , USER , PASSWORD , DB )){

            $query = "SELECT token FROM password_recovery WHERE token = '{$token}' AND username != '{$user}'";
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
$email = $this->getEmail();
$username = $this->getUsername();
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
require_once ('../emails/recover_email.php');
$mail->Subject = 'Password recovery from '.COMPANY_NAME;
$mail->Body    = $body;
$mail->AltBody = 'Please enable HTML view to view the content of this E-mail properly.';

if(!$mail->send()) {
  // return 'Mailer Error: ' . $mail->ErrorInfo;
return false;
} else {
 return  true;
}
        }
public function Processor () {
if($this->isReady()){

    if($this->isEmail()){
if($this->isToken()){
    if($this->isAlreadyInserted()){

if($this->sendEmail()){
$email = $this->getEmail();
    $report_array = Array("success" => 1 , "error" => "Password reset link sent to your E-mail address" , "email" => $this->getEmail());
return json_encode($report_array);

}
    }

    else {

        if($this->insertToDatabase()){

if($this->sendEmail()){
$email = $this->getEmail();
    $report_array = Array("success" => 1 , "error" => "Password reset link sent to your E-mail address" , "email" => $this->getEmail());
return json_encode($report_array);
}

else {
$report_array = Array("success" => 0 , "error" => "Network not reachable");
return json_encode($report_array);

}
        }

        else {

            $report_array = Array("success" => 0 , "error" => "Unknown server error");
return json_encode($report_array);
        }
    }
}

    }

    else {


$report_array = Array("success" => 0 , "error" => "No match found");
return json_encode($report_array);

    }
}
 
}

}
$recover = new recoverPassword;

echo $recover->Processor();
?>