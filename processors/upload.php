<?php 

ob_start();
session_start();
header('Content-type:application/json');
error_reporting(false);
define('PROFILE_FOLDER' , $_SERVER['DOCUMENT_ROOT']."/user_profiles/" , false);
require_once $_SERVER['DOCUMENT_ROOT'].'/Web_Data/incs/config.php';
if($_SERVER['REQUEST_METHOD'] != 'POST'){

    die();
}
class uploadImage  {

private $image;

public function isReady (){

  if(isset($_FILES['image']) && !empty($_FILES['image'])){
return  true;

  }

  else {

    return false;
  }
}

public function  isImage ($file) {

  $name = $file['tmp_name'];
  $image_size = getimagesize($name);
  if($image_size !== false){

return true;
  }

  else {

    return false;
  }
}
public function checkIfFileExists(){

  $user = $_SESSION['user_details']['username'];
$conn = mysqli_init();
if(mysqli_real_connect($conn , MY_HOST , MY_USER , MY_PASSWORD , MY_DB)){

    $sql = "SELECT profile FROM users WHERE username = '{$user}'";
if($query = mysqli_query($conn , $sql)){

  $profile_array = mysqli_fetch_assoc($query);
$profile = $profile_array['profile'];
  

   if ($profile != 'user.png'){

unlink(PROFILE_FOLDER.$profile);
    return true;
  }

  else {

    return  true;
  }


}
}
}
public function isFileSize ($file , $size){
  $file_size = $file['size'];
  if($file_size > $size){

    return false;
  }

  else {

    return true;
  }


}

public function getFileExtention ($file){
$target_dir = PROFILE_FOLDER;
$target_file = $target_dir . basename($file["name"]);
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
$target_dir = PROFILE_FOLDER;
return ".$imageFileType";

}

public function isFileType ($file , $type){
$image_array = Array ("png" , "jpg" , "jpeg");
$video_array = Array("mp4" , "3gp");
$target_dir = PROFILE_FOLDER;
$target_file = $target_dir . basename($file["name"]);
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
public function updateProfileInDatabase($file){

  $user = $_SESSION['user_details']['username'];
  $conn = mysqli_init();
$profile = strtolower($user).$this->getFileExtention($file);
  if(mysqli_real_connect($conn , MY_HOST , MY_USER , MY_PASSWORD , MY_DB)){

    $query = "UPDATE users SET profile = '{$profile}' WHERE username = '{$user}'";
    if($run = mysqli_query($conn, $query)){
$_SESSION['user_details']['profile'] = $profile;
      return true;
    
        
    }

    else {

      return false;
    }
  }
}
public function uploadFile($file){
$user = $_SESSION['user_details']['username'];
$profile = strtolower($user).$this->getFileExtention($file);
$dir = PROFILE_FOLDER.$profile;

if(move_uploaded_file($file['tmp_name'] , $dir)){
//rename(PROFILE_FOLDER.$file['name'], PROFILE_FOLDER.$profile)
if(true){
  return true;
}

else {

  return false;
}

}
else {
  return false;
}
}

public function Processor(){

if($this->isReady()){
  $file = $_FILES['image'];
  if($this->isImage($file)){
if($this->isFileType($file , 'image')){
if($this->isFileSize($file , 5120000)){
if($this->checkIfFileExists()){

  if($this->uploadFile($file)){
if($this->updateProfileInDatabase($file)){
$report_array = Array("success" => 1 , "error" => "Profile updated");
return json_encode($report_array);
}

else {

   $report_array = Array("success" => 0, "error" => "database connection lost");
return json_encode($report_array);
}

  }

  else {

     $report_array = Array("success" => 0, "error" => "server connection lost");
return json_encode($report_array);
  }
}

}

else {

 $report_array = Array("success" => 0, "error" => "image exceeds 5mb");
return json_encode($report_array);}

}
else {
 $report_array = Array("success" => 0, "error" => "only  jpg , png and jpeg formats are allowed");
return json_encode($report_array);

}
  }
  else {
$report_array = Array("success" => 0, "error" => "only images are allowed");
return json_encode($report_array);

  }
}
}
}
$image = new uploadImage();
echo $image->Processor();
?>
