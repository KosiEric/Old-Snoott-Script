<?php
ob_start();
//header('Content-type:application/json');
require '../Web_Data/incs/config.php';

//require_once '../phpmailer/PHPMailerAutoload.php';

/*if($_SERVER['REQUEST_METHOD'] != 'POST'){
    
    exit();
}
*/
class resetPassword {

    public $username;
    public $password;
    public function isReady() {


        if(isset($_POST['data']) && !empty($_POST['data'])){
$data = json_decode($_POST['data'] , true);
$this->username = $data['username'];
return $this->password = $data['password'];

return true;

        }

        else {

            return false;
        }
    }

    public function isCurrentPassword () {

$username = $this->username;
$password = $this->password;

$conn = mysqli_init();
if(mysqli_real_connect($conn , HOST , USER , PASSWORD ,DB)){

    $query = "SELECT password FROM users WHERE username = '{$user}'";

    if($sql = mysqli_query($conn , $query)){

      $password_array = mysqli_fetch_assoc($sql);
     $old_password = $password_array['password'];

     if(md5($password) == $old_password){

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

        }

        public function getCurrentPassword () {

            $username = $this->username;
            $conn = mysqli_init();
            if(mysqli_real_connect($conn , HOST , USER , PASSWORD , DB)){

                $sql = "SELECT password FROM users WHERE username = '{$username}'";
                if($query = mysqli_query($conn , $sql)){

                    $password_array = mysqli_fetch_assoc($query);
                    $old_password = $password_array['password'];
                    return $old_password;
                }
            }
        }

    public  function passwordChanged () {

        $old_password = $this->getCurrentPassword();
        $new_password = md5($this->password);
            $user = $this->username;
        if($old_password == $new_password){

            return true;
        }

        else {

            $conn = mysqli_init();

            if(mysqli_real_connect($conn , HOST , USER , PASSWORD , DB)){
                  
                $sql = "UPDATE users SET password = '$new_password' WHERE username = '{$user}'";

                if($query = mysqli_query($conn , $sql))
                    return true;
                }

                else {

                    return false;
                }
            }
        }

        public function deleteFromDatabase () {
$user = $this->username;

$conn = mysqli_init();

if(mysqli_real_connect($conn , HOST , USER , PASSWORD , DB)){

    $delete = "DELETE FROM password_recovery WHERE username = '{$user}'";
    if($query = mysqli_query($conn , $delete)){

        return true;
    }

    else {

        return false;
    }
}

        }
public function Processor () {

    if($this->isReady()){
if($this->passwordChanged()){

    $report_array =  Array("success" => "1" , "error" => "password saved successfully");
    return json_encode($report_array);
}

else {

    $report_array =  Array("success" => "0" , "error" => "Server not reachable");
    return json_encode($report_array);
}
        }
}
}

$resetPassword = new resetPassword;
echo $resetPassword->Processor();
?>