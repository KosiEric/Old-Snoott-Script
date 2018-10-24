<?php 


ob_start();
session_start();
header('Content-type:application/json');
require '../Web_Data/incs/config.php';
//require_once '../phpmailer/PHPMailerAutoload.php';


class editDetails {

    public $state;
    public $university;
    public $fullname;

public function isReady (){

    if(isset($_POST['data']) && !empty($_POST['data'])){

        $data = json_decode($_POST['data'] , true);
        $this->state = $data['state'];
        $this->university = $data['university'];
        $this->fullname = ucfirst($data['fullname']);

        return true;
    }

    else {

        return false;
    }
}

public function updateDetails() {
$username = $_SESSION['user_details']['username'];




        $data = json_decode($_POST['data'] , true);
        $state = $data['state'];
        $university = $data['university'];
        $fullname = ucwords($data['fullname']);

$conn = mysqli_init();

if(mysqli_real_connect($conn , HOST , USER , PASSWORD , DB)){


    $sql = "UPDATE users SET fullname = '{$fullname}' , state = '{$state}' , institution ='{$university}' WHERE username = '{$username}'";


    if($run = mysqli_query($conn , $sql)){

        $_SESSION['user_details']['institution'] = $university;
        $_SESSION['user_details']['state'] = $state;
        $_SESSION['user_details']['fullname'] = $fullname;

        return true;
    }

    else {

        return mysqli_error($conn);
    }
}

}


public function Processor (){

    if($this->isReady()){

        if($this->updateDetails()){

            $report_array = Array("success" => 1 , "error" => "details saved");
            return json_encode($report_array);
        }

        else {

            $report_array = Array ("success" => 0 , "error" => "server busy, try some other time");
            return json_encode($report_array);
        }
    }
}
}


$update = new editDetails;

echo $update->Processor();
?>