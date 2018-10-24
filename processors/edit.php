<?php  
header('Content-type:application/json');
error_reporting(0);
require '../Web_Data/incs/config.php';
if($_SERVER['REQUEST_METHOD'] != 'POST'){

exit();
    
}
session_start();
class EditForm {
public  $username;
public $email;
public  $phone;
public function isReady  () {

    if(isset($_POST['data']) && !empty($_POST['data'])){
        $data = json_decode($_POST['data'] , true);

 $this->username = $data['username'];
 $this->email = $data['email'];
 $this->phone = $data['phone'];
    return true;
    }

    else {

        return false;
    }
}

public  function isUsername () {
$data = json_decode($_POST['data'] , true);
$username = $data['username'];
if(strtolower($username) == strtolower($_SESSION['user_details']['username'])){

    return true;
}

else {

    $conn  = mysqli_init();
    if(mysqli_real_connect($conn , HOST , USER , PASSWORD , DB)){

        $user = mysqli_real_escape_string($conn, $username);

        $query = "SELECT * FROM users WHERE username = '{$user}'";

        if($sql = mysqli_query($conn, $query)){
            $num_rows = (int)mysqli_num_rows($sql);
if($num_rows == 0){

    return true;
}

else {

    return false;
}

        }
    }
}
}
public  function isEmail () {

    $data = json_decode($_POST['data'] , true);
$email = $data['email']; 
    if(strtolower($email) == strtolower($_SESSION['user_details']['email'])){
return true;
    }
else {
    $conn = mysqli_init();

if(mysqli_real_connect($conn, HOST, USER, PASSWORD, DB));

 $email = mysqli_real_escape_string($conn,$email);

$sql = "SELECT * FROM users WHERE email = '{$email}'";
if($query = mysqli_query($conn , $sql)){

 $num_rows = (int)mysqli_num_rows($query);

    if($num_rows == 0){
        return true;
    }
    else {

        return false;
    }
}

else{

    return mysqli_error($conn);
}
}
}

public function isPhone () {

    $data = json_decode($_POST['data'] , true);
    return true;
$phone = $data['username'];

    if($phone == $_SESSION['user_details']['phone']){
return true;
    }
else {
$conn = mysqli_init();

if(mysqli_real_connect($conn, HOST, USER, PASSWORD, DB));

$phone = mysqli_real_escape_string($conn,$phone);

$sql = "SELECT * FROM users WHERE phone = '{$phone}'";
if($query = mysqli_query($conn , $sql)){

    $num_rows = (int)mysqli_num_rows($query);

    if($num_rows == 0){
        return true;
    }
    else {

        return false;
    }
}
}

}

public  function updateData() {

    $conn = mysqli_init();

    if(mysqli_real_connect($conn , HOST , USER , PASSWORD , DB)){

        $data = json_decode($_POST['data'] , true);
        $username =  mysqli_real_escape_string($conn , $data['username']);
         $phone =  mysqli_real_escape_string($conn , $data['phone']);
         $email = mysqli_real_escape_string($conn , $data['email']);
         $logged_user = $_SESSION['user_details'];
         $user = $logged_user['username'];
           $sql = "UPDATE users SET username = '$username' , email = '$email' , phone = '$phone'  WHERE username = '$user' ";
           if($query = mysqli_query($conn , $sql)){

           if(strtolower($data['email']) == strtolower($_SESSION['user_details']['email'])){

             return true;
           }

           else {

            $sqli = "DELETE FROM email_verification WHERE username = '{$logged_user}';";
            $sqli.= "UPDATE users SET email_verified = 0 WHERE username = '{$username}';";

            if($query = mysqli_multi_query($conn, $sqli)){
                return true;
            }

            else {

                return false;
            }
           }
           }

           else {

            return false;
           }
        
    }
}

public  function Processor () {
if($this->isReady()){

    if($this->isUsername()){

if($this->isEmail()){

if($this->isPhone()){
    if($this->updateData()){
    $time = time();
    $plus_30_days = $time * 60 * 1 * 24 * 30;
setcookie("user", $this->username, $plus_30_days , '/' , false);


   $_SESSION['user_details']['username'] = $this->username;
   $_SESSION['user_details']['email'] = $this->email;
   $_SESSION['user_details']['phone'] = $this->phone;
        $error_array = Array ("error" => "Success!" , "success" => 1);
        return json_encode($error_array);

    }

    else {
 $error_array = Array ("error" => "settings failed" , "success" => 0);
        return json_encode($error_array);

    }
}

else{
        $error_array = Array ("error" => "phone already exists" , "success" => 0);
        return json_encode($error_array);
    }


}
else{
        $error_array = Array ("error" => "email already exists" , "success" => 0);
        return json_encode($error_array);
    }

    }

    else{
        $error_array = Array ("error" => "Username already exists" , "success" => 0);
        return json_encode($error_array);
    }
}
}
}

$edit = new EditForm;

 echo $edit->Processor();
?>