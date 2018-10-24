<?php

require_once $_SERVER['DOCUMENT_ROOT'].'/Web_Data/incs/config.php';
$request_method = $_SERVER['REQUEST_METHOD'];

if($request_method != "POST") {
  die();
}
class Like {

  private $username;
  private $action;
  private $adID;

  public function isReady(){
    if(isset($_POST['data']) && !empty($_POST['data'])){

      $data = json_decode($_POST['data'] , true);
      $this->username = $data['username'];
      $this->adID = $data['id'];
      $this->action = $data['action'];
    return true;

    }

    else {
      return false;
    }


  }


  public function LikeOrDislike () {

    $action = $this->action;
   $username = $this->username;
    $time = time();
    $today = date('D d M Y h:i:s a');
    $id = $this->adID;
    $conn = mysqli_init();
    if(mysqli_real_connect($conn, HOST , USER , PASSWORD , DB)){
      if(strtolower($action) == "flag") {
        $sql = "INSERT INTO flags (`ad_id` ,`time_flagged` ,`date_flagged` , `username`) VALUES
         ('{$id}' , '{$time}' , '{$today}' , '{$username}')";
      }
      else {

        $sql = "DELETE FROM flags WHERE username = '{$username}' AND ad_id = '{$id}'";
      }


      if($query = mysqli_query($conn , $sql)){
        return true;
      }
      else {
        return false;
      }
    }
  }

  public function Processor () {
    if($this->isReady()){
      if($this->LikeOrDislike()){
        $error;
        if(strtolower($this->action) == 'flag') {
          $error = "unflag";
        }
        else {

          $error = "flag";
        }
        $report_array = Array("success" => "1" , "error" => $error);
return json_encode($report_array);
        }

      else {
        $report_array = Array("success" => "0" , "error" => $this->action);
return json_encode($report_array);
      }
    }
  }
}

$like = new like;
//$like->isReady();
echo $like->Processor();
?>
