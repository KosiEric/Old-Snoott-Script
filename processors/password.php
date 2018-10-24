<?php
 ob_start();
header('Content-type:application/json');
require '../Web_Data/incs/config.php';
session_start();
//require_once '../phpmailer/PHPMailerAutoload.php';

if($_SERVER['REQUEST_METHOD'] != 'POST'){
    
    exit();
}

class changePassword {

    public $old_password;
    public $new_password;
    public function isReady() {


        if(isset($_POST['data']) && !empty($_POST['data'])){
$data = json_decode($_POST['data'] , true);
$this->old_password = $data['old-password'];
$this->new_password = $data['new-password'];

return true;

        }

        else {

            return false;
        }
    }


    public function isCurrentPassword () {

$user_details = $_SESSION['user_details'];
$password = $user_details['password'];

$conn = mysqli_init();
$user = $user_details['username'];
if(mysqli_real_connect($conn , HOST , USER , PASSWORD ,DB)){

    $query = "SELECT password FROM users WHERE username = '{$user}'";

    if($sql = mysqli_query($conn , $query)){

      $password_array = mysqli_fetch_assoc($sql);
     $password = $password_array['password'];

     if(md5($this->old_password) == $password){

        return true;
     }

     else {

        return false;
     }
    }

    else {

        return mysqli_error($conn);
    }
}

        }

    public  function passwordChanged () {

        $old_password = $this->old_password;
        $new_password_hash = md5($this->new_password);
        $user_details = $_SESSION['user_details'];
            $user_old_password = $user_details['password'];

        if($user_old_password == $new_password_hash){

            return true;
        }

        else {

            $conn = mysqli_init();

            if(mysqli_real_connect($conn , HOST , USER , PASSWORD , DB)){
                   $user = $user_details['username'];
                $sql = "UPDATE users SET password = '$new_password_hash' WHERE username = '$user'";

                if($query = mysqli_query($conn , $sql))
                    $_SESSION['user_details']['password'] = $new_password_hash;
                return true;
                }

                else {

                    return false;
                }
            }
        }
public function  Processor (){

    if($this->isReady()){

        if($this->isCurrentPassword()){
if($this->passwordChanged()){
$error_array = Array ("success" => "1" , "error" => "Password saved");
             return json_encode($error_array);
    
}

else {
$error_array = Array ("success" => "0" , "error" => "Server errror");
             return json_encode($error_array);
       

}

        }

        else 
        {

            $error_array = Array ("success" => "0" , "error" => "Password failed");
             return json_encode($error_array);
        }
    }
}

    



}

    $change_password = new changePassword;

    print_r($change_password->Processor());
?>