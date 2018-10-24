<?php
//header("Content-type:application/json");
require_once $_SERVER['DOCUMENT_ROOT'].'/Web_Data/incs/config.php';
if(isset($_POST['data']) AND !empty($_POST['data'])) {
  $data = json_decode($_POST['data'] , true);
  $id = $data['id'];
  $action = $data['action'];
  $conn = mysqli_init();
  if(mysqli_real_connect($conn , HOST , USER , PASSWORD , DB)) {
  if($action == 'deactivate'){
    $new_action = "activate";
    $sql = "UPDATE ads SET active = 0 WHERE ad_id = '{$id}'";
  }
  else {
    $new_action = "deactivate";
    $sql = "UPDATE ads SET active = 1 WHERE ad_id = '{$id}'";
  }
    if($query = mysqli_query($conn , $sql)) {
      $report_array = Array("success" => "1" , "error" => "Ad closed" , "action" => $new_action);
       echo json_encode($report_array);
    }
    else {
      $report_array = Array("success" => "0" , "error" => "server failed");
       echo json_encode($report_array);
    }
  }

}

?>
