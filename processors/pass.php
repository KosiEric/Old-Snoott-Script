<?php 


ob_start();
require_once $_SERVER['DOCUMENT_ROOT'].'/Web_Data/incs/config.php';
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
            $this->token = $data_array['token'];
            return true;
        }
else {
    return false;
}

    }

    public function isEmail (){
$token = $this->token;

        $conn = mysqli_init();

        if(mysqli_real_connect($conn , HOST , USER , PASSWORD , DB)){

            $query = "SELECT * FROM users WHERE '{$this->type}' = '{$this->email}'";
            if($run = mysqli_query($conn , $query)){

                $query_array = mysqli_fetch_assoc($run);

                if(empty($query_array)){

                    return false;
                }
                else {
                    return true;
                }
            }
     
        }
    }
}

$recover = new recoverPassword;

echo $recover->isReady();
?>