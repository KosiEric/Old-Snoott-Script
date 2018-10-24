<?php 

ob_start();
header('Content-type:application/json');
require '../Web_Data/incs/config.php';
session_start();

if($_SERVER['REQUEST_METHOD'] != 'POST'){

    die();
}
class setAccount {

    public $type;
public function isReady (){
if(isset($_POST['data']) && !empty($_POST['data'])){

    $data_array = json_decode($_POST['data'] , true);
$this->type = $data_array['type'];

return true;
}
else {

    return false;
}
}

public function update (){

    $type = $this->type;

    $user = $_SESSION['user_details']['username'];

    $conn = mysqli_init();

    if(mysqli_real_connect($conn , HOST , USER , PASSWORD ,DB)){

        $sql = "UPDATE users SET active = '{$type}' WHERE username = '{$user}'";

        if($run = mysqli_query($conn, $sql)){

        $_SESSION['user_details']['active'] = $type;
return true;

        }

        else {

            return false;
        }
    }
}

public function Processor (){

    if($this->isReady()){

        if($this->update()){
if($this->type == 0){

    $report_array = Array ("success" => "1" , "error" => "Account set to inactive");

}
else {


    $report_array = Array ("success" => "1" , "error" => "Account activated successfully!");

}

return  json_encode($report_array);

            
        }

        else {
 $report_array = Array ("success" => "0" , "error" => "server busy,try again");
return json_encode($report_array);
        }
    }
}

}
$setAccount = new setAccount;
echo $setAccount->Processor();
?>