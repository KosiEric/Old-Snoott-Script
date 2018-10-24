<?php  
 ob_start();
 session_start();
header('Content-type:application/json');
error_reporting(0);
require '../Web_Data/incs/config.php';

class login {

public function isReady () {

    if(isset($_POST['data']) AND !empty($_POST['data'])){

        return true;
    }

    else {

        return false;
    }
}
 
public $loginData = ''; 
public function isLoginDetails () {
    
    $data = json_decode($_POST['data'] , true);

    //$username = $data['username'];
    $password = $data['password'];
    $conn = mysqli_init();

    if(mysqli_real_connect($conn , HOST , USER , PASSWORD , DB)) {
        $username = trim(mysqli_real_escape_string($conn , $data['username']));
$password = md5($password);
$query = "SELECT * FROM users WHERE (username = '{$username}' OR email = '{$username}' OR phone LIKE 
'%{$username}%') AND password = '{$password}' AND account_type = 'user'";

if($query = mysqli_query($conn , $query)) {

    $num_rows = mysqli_num_rows($query);
   
settype($num_rows, 'integer');
    if($num_rows === 0){

return false;
    }

    else {
        $user_data = mysqli_fetch_assoc($query);
$this->loginData = $user_data;
return true;
    }
}

else {

    return mysqli_error($conn);
}

    }
}

public function confirmLogin () {

    if($this->isReady()){

if($this->isLoginDetails()) {

    session_start();
    $report_array = Array ("success" => 1 ,
"error" => "Login successful!"
        );

    $_SESSION['user_details'] = $this->loginData;
    $data = json_decode($_POST['data'] , true);
     $_SESSION['logged_user'] = $data['username'];
    $_SESSION['account_type'] = 'user';
$time = time();
$plus_30_days = $time * 60 * 1 * 24 * 30;
    setcookie('user', $this->loginData['username'], $plus_30_days , '/' , false);
    $_COOKIE['user'] = $this->loginData['username'];
            return json_encode($report_array);
    }

    else {

    $report_array = Array ("success" => 0 ,
"error" => "Login failed!"
        );
            return json_encode($report_array);
    } 
}


}
}

$login = new Login;
echo $login->confirmLogin();
?>