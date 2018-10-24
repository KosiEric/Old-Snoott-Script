<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/Web_Data/incs/config.php';
class editAd {
     private $category;
     private $subCategory;
     private $title;
     private $description;
     private $price;
     private $negotiable;
     private $ID;
  public function isReady (){
    if(isset($_POST['data']) && !empty($_POST['data'])){
      $data = json_decode($_POST['data'] , true);
      $this->category = $data['category'];
      $this->subCategory = $data['subCategory'];
      $this->title = $data['title'];
      $this->description = $data['description'];
      $this->price = $data['price'];
      $this->negotiable = $data['negotiable'];
      $this->ID = $data['id'];
    return true;
    }
    else {
      return false;
    }


}

private function upDateTable () {

  $conn = mysqli_init();
  if (mysqli_real_connect($conn , HOST , USER , PASSWORD , DB)) {
    $date_stamp = date('h:i:s a');
    $today = date('D d M Y');
    $now = $today.' '.$date_stamp;
    $time = time();
    $title = mysqli_real_escape_string($conn , $this->title);
    $description = mysqli_real_escape_string($conn , $this->description);
    $price = mysqli_real_escape_string($conn , $this->price);
    $negotiable  = mysqli_real_escape_string($conn , $this->negotiable);
    $id = $this->ID;
    $sql = "UPDATE ads SET title = '{$title}' , description = '{$description}' , price = '{$price}' , negotiable = '{$negotiable}' , date_updated =
    '{$now}' , time_updated = '{$time}' WHERE ad_id = '{$id}'";
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
    if($this->upDateTable()){
      $report_array = Array("success" => 1 , "error" => "Ad updated successfully");
      return json_encode($report_array);
    }
    else {
      $report_array = Array("success" => 0 , "error" => "Server failed to respond , try again");
      return json_encode($report_array);

    }
  }
}
}

$editAd = new editAd;
echo $editAd->Processor();?>
