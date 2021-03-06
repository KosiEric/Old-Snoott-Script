<?php

require_once $_SERVER['DOCUMENT_ROOT'].'/Web_Data/incs/config.php';

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


  private function LikeOrDislike () {

    $action = $this->action;
    $username = $this->username;
    $time = time();
    $today = date('D d M Y h:i:s a');
    $id = $this->adID;
    $conn = mysqli_init();
    if(mysqli_real_connect($conn, HOST , USER , PASSWORD , DB)){
      if(strtolower($action) == "favorite") {
        $sql = "INSERT INTO favorites (`ad_id` ,`time_favorited` ,`date_favorited` , `username`) VALUES
         ('{$id}' , '{$time}' , '{$today}' , '{$username}')";
      }
      else {

        $sql = "DELETE FROM favorites WHERE username = '{$username}' AND ad_id = '{$id}'";
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
        if(strtolower($this->action) == 'favorite') {
          $error = "unfavorite";
        }
        else {

          $error = "favorite";
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
echo $like->Processor();
?>
