<?php
ob_start();
//header('Content-type:application/json');
require '../Web_Data/incs/config.php';
$image = IMAGES;
define('UPLOAD_FOLDER' , $_SERVER['DOCUMENT_ROOT']."/$image/" , false);
error_reporting(false);
session_start();

if(!isset($_SESSION['user_details'])){
    $report_array = array("success" => 0 , "error" => "Login session expired");
    echo (json_encode($report_array));
}


class createAd {


    public $ID;
     public $category;
     public $subCategory;
     public $title;
     public $price;
     public $negotiable;
     public $description;

    public function isReady () {
foreach ($_POST as $post) {

  if(!isset($post) OR  empty($post)){
    return false;
  }
  else {
    foreach ($_FILES as $file) {
      if(!isset($file) OR empty($file)){

        return false;
      }

      else {
        return true;
      }
    }
  }
}

}


private function generateID () {

  $letters = Array("A" , "B" , "C" , "D" , "E" , "F" , "G" , "H" ,  "I" , "J" , "K" ,"L" ,"M" ,"N" ,"O" ,"P" ,"Q" ,"R" ,"S" , "T" ,
"U" ,"V" ,"W" ,"X" ,"Y" ,"Z" ,"a" ,"b" ,"c" ,"d" ,"e" ,"f" ,"g" ,"h" ,"i" ,"j" ,"k" ,"l" ,"m" ,"n" ,"o" ,
"p" ,"q" ,"r" ,"s" ,"t" ,"u" ,"v" ,"w" ,"x" ,"y" ,"z" ,"0" ,"1" ,"2" ,"3" ,"4" ,"5" ,"6" ,"7" ,"8"
, "9" , "-" , "_");

$random_string = "";
$string_length = count($letters);
for($i = 0; $i < 15; $i++) {
$random_string.= $letters[rand(0 , $string_length-1)];

}

return $random_string;
}

private function setValues () {
     $this->category = $_POST['category'];
  $this->subCategory = $_POST['subCategory'];
  $this->title = strip_tags(ucfirst($_POST['title']));
  $this->description = strip_tags(ucfirst($_POST['description']));
$this->price = $_POST['price'];
$this->negotiable = $_POST['negotiable'];
  return true;

}


private function  isToken () {

   $token = $this->generateID();
    $this->ID = $token;
    //return ($token == $this->token);
    $conn = mysqli_init();
$user = $_SESSION['user_details']['username'];
    if(mysqli_real_connect ($conn , HOST , USER , PASSWORD , DB )){

        $query = "SELECT ad_id FROM ads WHERE ad_id = '{$token}'";
        if($run = mysqli_query($conn , $query)) {

            $num_rows = mysqli_num_rows($run);

            if($num_rows == 0){
                 return true;

            }

            else {

                $this->isToken();

            }
        }
    }

}

private function getExtension ($filename) {
  $lastIndexOfDot = strrpos($filename, '.');
  $extension = substr($filename, $lastIndexOfDot);
  return $extension;
}
private function getFileExtention ($name){
$target_dir = UPLOAD_FOLDER;
$target_file = $target_dir . basename($name);
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
$target_dir = PROFILE_FOLDER;
return ".$imageFileType";

}
private function getDatabaseImages() {
$image_string = "";
$i = 0;
  foreach($_FILES['file']['name'] as $key => $name){
  $i = $i + 1;
  if($i < 3){
    $image_string.=$this->ID.'_photo'.$i.$this->getExtension($_FILES['file']['name'][$key]).',';
  }
else {
  $image_string.=$this->ID.'_photo'.$i.$this->getExtension($_FILES['file']['name'][$key]);

}

}
  return $image_string;

}
private function getFirstImage () {
    $image_string = "";
$i = 0;
  foreach($_FILES['file']['name'] as $key => $name){
  $i = $i + 1;
  if($i == 1){
    $image_string.=$this->ID.'_photo'.$i.$this->getExtension($_FILES['file']['name'][$key]);
    break;
  }

}
  return $image_string;

}
private function insertToDatabase () {
  $date_stamp = date('h:i:s a');
  $today = date('D d M Y');
  $now = $today.' '.$date_stamp;
  $time = time();
  $ad_id = $this->ID;
  $username = $_SESSION['user_details']['username'];
  $category = $this->category;
  $subCategory = $this->subCategory;
  $active = 1;
  $activated = 1;
  $first_image = $this->getFirstImage();
  $photos = $this->getDatabaseImages();
  $conn = mysqli_init();
  if(mysqli_real_connect($conn , HOST , USER , PASSWORD , DB)){
  $title = mysqli_real_escape_string($conn , $this->title);
  $description = mysqli_real_escape_string($conn , $this->description);
  $price = mysqli_real_escape_string($conn , $this->price);
  $negotiable  = mysqli_real_escape_string($conn , $this->negotiable);

  $sql = "INSERT INTO ads(`ad_id` , `username` , `views` , `date_created` , `time_created` , `date_updated` , `time_updated` , `category` ,
  `subcategory` , `title` , `description` , `price` , `negotiable` , `first_photo` ,  `photos` , `active` , `activated`) VALUES
  ('{$ad_id}' , '{$username}' , 0 ,  '{$now}' , '{$time}' , '{$now}' , '{$time}' , '{$category}' , '{$subCategory}' , '{$title}'
    , '{$description}' , '{$price}' , '{$negotiable}' , '{$first_image}' , '{$photos}' , '{$active}' , '{$activated}')";
    if($query = mysqli_query($conn , $sql)){
      return true;
    }

    else {
      return true;
    }

  }


}

private function changePhotoName($i , $filename){
$image_string = "";
$image_string.=$this->ID.'_photo'.$i.$this->getExtension($filename);
return $image_string;
}

public function isFileSize ($filesize , $size){

  if($filesize > $size){

    return false;
  }

  else {

    return true;
  }


}

public function isFileType ($filename , $type){
$image_array = Array ("png" , "jpg" , "jpeg");
$video_array = Array("mp4" , "3gp");
$target_dir = UPLOAD_FOLDER;
$target_file = $target_dir . basename($filename);
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
if(strtolower($type) == 'image'){

  if(in_array($imageFileType , $image_array)){

return true;
  }

  else {

    return false;
  }


}

elseif (strtolower($type) == 'video'){

  if(in_array($imageFileType , $video_array)){

    return true;
  }

  else {

    return false;
  }
}

}

private function uploadFile($i ,  $filename , $tmp_name){
$filename = $this->changePhotoName($i , $filename);
$dir = UPLOAD_FOLDER.$filename;

if(move_uploaded_file($tmp_name , $dir)){
//rename(PROFILE_FOLDER.$file['name'], PROFILE_FOLDER.$profile)
return true;
}

else {

  return false;
}

}

private function  isImage ($tmp_name) {

  $image_size = getimagesize($tmp_name);
  if($image_size !== false){

return true;
  }

  else {

    return false;
  }
}


private function check () {
  $i = 0;
  foreach ($_FILES['file']['name'] as $key => $name) {
# code...
$i = $i + 1;
if($this->isImage($_FILES['file']['tmp_name'][$key])) {
echo "Ok".$i."\n";

}
  }
}


public function Processor () {

if($this->isReady()){
  if($this->setValues()){
    if($this->isToken()){
      $i = 0;
      $uploaded = false;
      foreach ($_FILES['file']['name'] as $key => $name) {
$i = $i + 1;
if($this->isImage($_FILES['file']['tmp_name'][$key])) {
  if($this->isFileType($_FILES['file']['name'][$key] , 'image')){
    if($this->isFileSize($_FILES['file']['size'][$key] , 5120000)){
      $filename = $this->changePhotoName($i , $_FILES['file']['name'][$key]);
  $dir = UPLOAD_FOLDER.$filename;
if(move_uploaded_file($_FILES['file']['tmp_name'][$key] , $dir)){
  if($i == 3){
    if($this->insertToDatabase()){
      $report_array = Array("success" => 1 , "error" => "Ad posted successfully");
      return json_encode($report_array);

    }

    else {
      $report_array = Array("success" => 0 , "error" => "Server failed to respond");
      return json_encode($report_array);

    }
    }
}
else {
  $uploaded = false;
  $report_array = Array("success" => 0 , "error" => "Photo {$i} failed to upload");
    return json_encode($report_array);

  }
  }
  else {

    $report_array = Array("success" => 0 , "error" => "photo {$i} exceed max 5mb.");
      return json_encode($report_array);

  }
  }

  else {

    $report_array = Array("success" => 0 , "error" => "photo {$i} is not an image");
      return json_encode($report_array);

  }
}

else {
  $report_array = Array("success" => 0 , "error" => "photo {$i} is not an image");
    return json_encode($report_array);

} 
      }
    }
  }
}

}

}

$createAd = new createAd;
#$createAd->isToken();
#$createAd->setValues();
echo $createAd->Processor();
#$createAd->getFirstImage();
#print_r($createAd->Processor());
?>
