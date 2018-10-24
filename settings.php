<?php
session_start();
error_reporting(0);


if(!isset($_SESSION['logged_user'])){
    header('Location:/account');
}

?>
<!DOCTYPE html>
<html lang="en-us" dir="ltr">

<head>
    <!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-109775928-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-109775928-1');
</script>

    <?php
$page_description = "Snoott user account settings";
$page_keywords = "Snoott , User , Account , Settings , Session";


//$page_title = " ";
require_once($_SERVER['DOCUMENT_ROOT'].'/Web_Data/incs/site_data.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/Web_Data/incs/config.php');
$page_title = SITE_TITLE." User account settings";

require_once($incs_dir.'meta.php');

?>
    <link rel="stylesheet" type="text/css" href="<?php  echo $css_dir?>settings.css" />

    <link rel="stylesheet" type="text/css" href="<?php  echo $css_dir?>footer.css" />
    
    <?php



require_once("{$incs_dir}header_style.php");



    ?>

    <script type="text/javascript" language ="JavaScript" src="<?php  echo $js_dir?>snoott.js">

</script>

<script type="text/javascript" language ="JavaScript" src="<?php  echo $js_dir?>functions.js">

</script>

    <script type="text/javascript" language ="JavaScript" src="<?php  echo $js_dir?>settings.js">

</script>
     <script type="text/javascript" language ="JavaScript" src="<?php  echo $js_dir?>deleteAccount.js"></script>

    <script type="text/javascript" language ="JavaScript" src="<?php  echo $js_dir?>toggleuni.js"></script>


    <script type="text/javascript" language ="JavaScript" src="<?php  echo $js_dir?>edit.js"></script>
<script type="text/javascript" language ="JavaScript" src="<?php  echo $js_dir?>password.js"></script>


<script type="text/javascript" language ="JavaScript" src="<?php  echo $js_dir?>updateDetails.js"></script>
  <script type="text/javascript" language ="JavaScript" src="<?php  echo $js_dir?>upload.js">

</script>
<link rel="stylesheet" type="text/css" href="<?php  echo $css_dir?>min-settings.css" />

    </head>

    <body>


         <?php


require_once("{$incs_dir}header.php");

  //  print_r($_SESSION['user_details']);

    ?>

         <div id="main-settings-toggle">
        <button id="account-toggle" class="toggles">
        Account Settings
        </button>
        <button id="profile-toggle" class="toggles">
            Profile Settings
        </button>
        </div>
        <div id="settings-drop-down-container"  class="adjusters">
        <div class="settings-dropdowns" id="account-settings">

        <span class = "dropdown-texts" title="E-mail , phone , username">Edit account details</span>
        </div>
            <form class = "hidden-forms" action="" method="post" id="edit-account-details" name="edit-account-details" autocomplete = "on" enctype="application/x-www-form-urlencoded" accept-charset="utf-8">
                  <input type="text" id="username" disabled = "disabled" class="inputs" placeholder="Username" value="<?php echo $_SESSION['user_details']['username'];?>" />
                <input type="text" id="email" class="inputs" placeholder="email" value="<?php echo  $_SESSION['user_details']['email'];?>" placeholder="Email" />
               <div id = "first-country-code-wrapper" class="inputs"> <span class = "country-code">+234</span>
                   <input type="text" name="phone" id ="phone" placeholder = "Phone" value="<?php echo $_SESSION['user_details']['phone'];?>" class ="reg-contacts"/></div>
                <span class ="server-response" id="account-details-response"></span>
                <input type ="submit" id ="account-save-button" value ="Save changes" />


                   </form>
        <div class="settings-dropdowns" id="password-settings">

       <span class = "dropdown-texts" title="Change your account password">Change account password</span>
        </div>
            <form class ="hidden-forms" method="post" action="" accept-charset="utf-8" name="change-password-form" id="change-password-form" autocomplete ="on"
              enctype ="application/x-www-form-urlencoded">
        <input type="password" name ="current-password" id= "current-password" placeholder ="old password" class ="inputs" />
            <input type="password" name="new-password" id="new-password"  class="inputs" placeholder="new password" autocomplete="off" />
            <input type="password" name="new-password-again" id="new-password-again" class="inputs" placeholder="Password again" autocomplete ="off" />
       <span class="server-response" id="password-response"></span>
                <input type="submit" name="change-password-button" value ="Save changes" id="change-password-button" />
        </form>
            <div class="settings-dropdowns" id="picture-add">
            <span class = "dropdown-texts" title="Upload a profile image">Change account image</span>

            </div>
            <form action ="" name="account-image" id="account-image" enctype="multipart/form-data" accept-charset="utf-8" method="post"
                  class ="hidden-forms">
             <label class ="profile-label">
        <input type="file" id ="user-image"  name ="image" accept="image/jpeg,image/png" />
        </label>
  <span class = "server-response" id= "image-response">

              <?php


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
if(mysqli_real_connect($conn , HOST , USER , PASSWORD , DB)){

    $sql = "SELECT profile FROM users WHERE username = '{$user}'";
if($query = mysqli_query($conn , $sql)){

  $profile_array = mysqli_fetch_assoc($query);
$profile = $profile_array['profile'];
  if($profile == ''){
    return true;
  }

  else if ($profile != 'user.png'){

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
  if(mysqli_real_connect($conn , HOST , USER , PASSWORD ,DB)){

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

return "profile updated";
}

else {

  return "database connection lost";
}

  }

  else {

    return "server connection lost";
  }
}

}

else {

  return "image excedds 5mb";
}

}
else {

  return "only  jpg , png and jpeg formats are allowed";
}
  }
  else {

    return "only images are allowed";
  }
}
}
}
$image = new uploadImage();
echo $image->Processor();
              ?>

                          </span>

                <input type ="submit" id ="upload-image-button" name="upload-image-button" value="Upload" />


            </form>
            <div class="settings-dropdowns" id="delete-account">
            <span class = "dropdown-texts" id = "delete-account-text" title="Delete this account(<?php echo $_SESSION['logged_user']; ?>)"><?php

            if($_SESSION['user_details']['active'] == 1){
  echo "Delete account";
}
else {

  echo "Activate account";
} ?></span>
            </div>
            <form action="" method="post" name="delete-account-form" id="delete-account-form" class="hidden-forms" enctype="application/x-www-form-urlencoded"
                  accept-charset ="utf-8">
                <span id ="delete-response" class="server-response"></span>
            <input type="submit" name="delete-account-button" id="delete-account-button" value ="<?php
if($_SESSION['user_details']['active'] == 1){
  echo "Delete account";
}
else {

  echo "Activate account";
}

            ?>"/>
            </form>
            </div>
        <div class="adjusters" id="profile-settings">
        <div class="settings-dropdowns" id="profile-dropdown">
                 <span class = "dropdown-texts" title="Username, institution , state">Edit personal details</span>
                </div>
            <form name="profile-settings-form" id = "profile-settings-form" action="" method="post" accept-charset="utf-8" enctype="application/x-www-form-urlencoded"
                   class="hidden-forms">
                <input type="text" name="fullname" id="fullname" class="profile-inputs" placeholder = "firstname lastname"
                value="<?php echo $_SESSION['user_details']['fullname'];?>" />

                        <select class ="profile-inputs" id ="profile-region" onchange="checkDropDown()" class="profile-inputs">

               <option value="">State or Region</option>
                                <option value="Abia">Abia state</option>
     <option value="Abuja">F.C.T Abuja</option>
                <option value="Adamawa" class="options">Adamawa state</option>
                <option value="Anambra" class="options">Anambra state</option>
                <option value="Akwa Ibom" class="options">Akwa Ibom state</option>
                <option value="Bauchi" class="options">Bauchi state</option>
                <option value="Bayelsa" class="options">Bayelsa state</option>
                <option value="Benue" class="options">Benue state</option>
                <option value="Borno" class="options">Borno state</option>
                <option value="Cross River" class="options">Cross River state</option>
                <option value="Delta" class="options">Delta state</option>
                <option value ="Ebonyi" class="options">Ebonyi state</option>
                <option value="Edo" class="options">Edo state</option>
                <option value="Ekiti" class="options">Ekiti state</option>
                <option value="Enugu" class="options">Enugu state</option>
                <option value="Gombe" class="options">Gombe state</option>
                <option value="Imo" class="options">Imo state</option>
                <option value="Jigawa" class="options">Jigawa state</option>
                 <option value="Kaduna" class="options">Kaduna state</option>
<option value="Kano" class="options">Kano state</option>
<option value="Katsina"  class="options">Katsina state</option>
<option value="Kebbi" class="options">Kebbi state</option>
<option value="Kogi" class="options">Kogi state</option>
<option value="Kwara" class="options">Kwara state</option>
<option value="Lagos" class="options">Lagos state</option>
<option value="Nassarawa" class="options">Nassarawa state</option>
<option value="Niger" class="options">Niger state</option>
<option value="Ogun" class="options">Ogun state</option>
<option value="Ondo" class="options">Ondo state</option>
<option value="Osun" class="options">Osun state</option>
<option value="Oyo" class="options">Oyo state</option>
<option value="Plateau" class="options">Plateau state</option>
<option value="Rivers" class="options">Rivers state</option>
<option value="Sokoto" class="options">Sokoto state</option>
<option value="Taraba" class="options">Taraba state</option>
<option value="Yobe" class="options">Yobe state</option>
<option value="Zamfara" class="options">Zamfara state</option>
            </select>
            <select id="universities" class="profile-inputs"></select>
            <span class = "server-response" id = "update-response"></span>
                <input type="submit" value="Save settings" id ="save-profile-button"/>
            </form>



             </div>


         <?php  require_once("{$incs_dir}offline.php");?>
         
         
         
         <!--Start of Tawk.to Script-->
<script type="text/javascript">
var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
(function(){
var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
s1.async=true;
s1.src='https://embed.tawk.to/5a056337198bd56b8c03a58f/default';
s1.charset='UTF-8';
s1.setAttribute('crossorigin','*');
s0.parentNode.insertBefore(s1,s0);
})();
</script>
<!--End of Tawk.to Script-->

         <?php  require_once("{$incs_dir}footer.php");?>
    </body>
</html>
