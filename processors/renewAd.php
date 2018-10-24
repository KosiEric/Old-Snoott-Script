<?php
header("Content-type:application/json");
require_once $_SERVER['DOCUMENT_ROOT'].'/Web_Data/incs/config.php';
$request_method =$_SERVER['REQUEST_METHOD'];

if($request_method != "POST") {
  exit();
}
class RenewAd {

function __toString () {

  if($this->isReady()) {
    if($this->changeDate()) {
      $report_array = Array("success" => "1" , "error" => "Ad updated");
      return json_encode($report_array);
    }
    else {
      $report_array = Array("success" => 0  , "error" => "Update failed");
      return json_encode($report_array);
    }
  }
}
  private $id;

  private function isReady () {
    if(isset($_POST['data']) && !empty($_POST['data'])) {
      $data = json_decode($_POST['data'] , true);
      $id = $data['id'];

      $this->id = $id;
      return true;
    }
    else {
      return false;
    }
  }

  private function changeDate () {
    $today = date('D d M Y h:i:s a');
    $now = time();
    $id = $this->id;
    $conn = mysqli_init();
    if(mysqli_real_connect($conn , HOST , USER , PASSWORD , DB)) {
      $sql = "UPDATE ads SET date_created = '{$today}' , time_updated = '{$now}' WHERE ad_id = '{$id}'";
      if($query = mysqli_query($conn , $sql)) {
        return true;
      }
      else {
        return false;
      }
    }




  }

}
$renew_ad = new renewAd();

echo($renew_ad);
?>
