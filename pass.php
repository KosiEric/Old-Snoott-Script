<?php  
mb_internal_encoding("UTF-8");
session_start();
ob_start();
require_once $_SERVER['DOCUMENT_ROOT'].'/Web_Data/incs/config.php';
if(isset($_SESSION['user_details']) AND !empty($_SESSION['user_details'])){
header("Location:/logout");

}
else if(isset($_GET['token'])){
   $token = $_GET['token'];
    $isToken = false;
    if(mb_strlen($token) <= 20){
header("Location:/");

    }

    else {

$conn = mysqli_init();
if(mysqli_real_connect($conn , HOST , USER , PASSWORD , DB)){
 $token = mysqli_real_escape_string($conn , $token);

$sql = "SELECT * FROM password_recovery WHERE token = '{$token}'";

if($run = mysqli_query($conn , $sql)){

   $sql_array = mysqli_fetch_assoc($run);
    if(empty($sql_array)){
header("Location:/");
        
    }

    else {
        $GLOBALS['username'] = $sql_array['username'];
        $GLOBALS['email'] = $sql_array['email'];
        require_once $_SERVER['DOCUMENT_ROOT'].'/Web_Data/incs/reset_password.php';
    
    }
}

    }
}

}

else {

require_once $_SERVER['DOCUMENT_ROOT'].'/Web_Data/incs/recover_password.php';

}




?>