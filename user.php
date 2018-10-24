<?php 
session_start();
if(isset($_GET['id']) && isset($_SESSION['user_details']) && strtolower($_GET['id']) == strtolower($_SESSION['user_details']['username'])) {
    header('Location:/profile');
    
}

else if(isset($_GET['id'])) {
require_once $_SERVER['DOCUMENT_ROOT'].'/Web_Data/incs/config.php';
$conn = mysqli_init();

if(mysqli_real_connect($conn , HOST , USER , PASSWORD , DB)) {
     $username = mysqli_real_escape_string($conn , $_GET['id']);

    $sql = "SELECT * FROM users WHERE username = '{$username}'";

    if($query = mysqli_query($conn , $sql)) {
        $query_array = mysqli_fetch_assoc($query);
        if(empty($query_array)) {
  
header("Location:/404");
        }
        

}
}

}



 ?>



<!DOCTYPE html>
<html lang="en-us" dir="ltr">

<head>
    <?php
$page_description = "Snoott user account Profile";
$page_keywords = "Snoott , User , Account , Settings , Session";


//$page_title = " ";
$name = (is_null(($query_array['fullname'])))?"User":$_GET['id'];
require_once($_SERVER['DOCUMENT_ROOT'].'/Web_Data/incs/site_data.php');

$page_title = $name.' @'.ucfirst($query_array['username']).' • Snoott.';

require_once($incs_dir.'meta.php');

require_once($incs_dir.'config.php');
$conn  = mysqli_init();
$username = $query_array['username'];

function getTotalAdsByUser () {
global $username , $conn;
  if(mysqli_real_connect ($conn , HOST , USER , PASSWORD , DB)){
    $sql = "SELECT username FROM ads WHERE username = '{$username}'";
    if($query = mysqli_query($conn , $sql)){
$number_of_ads = mysqli_num_rows($query);
return $number_of_ads;
      }

  }
  }
  function getTotalFavoritesByUser () {
  global $username , $conn;
    if(mysqli_real_connect ($conn , HOST , USER , PASSWORD , DB)){
      $sql = "SELECT username FROM favorites WHERE username = '{$username}'";
      if($query = mysqli_query($conn , $sql)){
  $number_of_ads = mysqli_num_rows($query);
  return $number_of_ads;
        }

    }
    }
?>
    <link rel="stylesheet" type="text/css" href="<?php  echo $css_dir?>settings.css" />
   <link rel="stylesheet" type="text/css" href="<?php  echo $css_dir?>profile.css" />
    <link rel="stylesheet" type="text/css" href="<?php  echo $css_dir?>footer.css" />

<link rel="stylesheet" type="text/css" href="<?php  echo $css_dir?>home.css" />

    <?php



require_once("{$incs_dir}header_style.php");



    ?>
<style type="text/css">

  body {
  background-color: #f5f8fa;
  }
</style>
    <script type="text/javascript" language ="JavaScript" src="<?php  echo $js_dir?>jquery.js"></script>
    <script type="text/javascript" language ="JavaScript" src="<?php  echo $js_dir?>profile.js">
</script>
 <?php

if($query_array['email_verified'] == 0){

echo "<link rel= 'stylesheet' href = '{$css_dir}confirm_email.css' type = 'text/css' />".PHP_EOL;
echo "<script type = 'text/JavaScript' src = '{$js_dir}confirm_email.js' language = 'javascript'></script>";


}
    ?>




    </head>

    <body>


         <?php


require_once("{$incs_dir}header.php");

  //  print_r($query_array);

    ?>
<div id = "big-profile-div">
<div id = "profile-content-container">
    <div style  = "background-image:url('/user_profiles/<?php echo $query_array['profile']; ?>')" id = "user-profile-image" class = "inside-profile-container"></div>
<span class = "inside-profile-container" id = "profile-username"><a href="/settings"><i class="fa fa-gear" id = "username-gear"></i></a><span id = "logged-username"
><?php echo ucfirst($query_array['username']); ?></span>
</span>
<span class = "inside-profile-container" id = "profile-ads"><?php echo $_GET['id']; ?> ads : <?php echo getTotalAdsByUser(); ?></span>
<span class = "inside-profile-container" id = "favorite-ads">Favorite ads : <?php echo getTotalFavoritesByUser(); ?></span>

<span class = "inside-profile-container" id = "profile-address"><a href = "/user/<?php echo $_GET['id']; ?>">Snoott.com/user/<?php echo ucfirst($query_array['username']); ?></a></span>
<span class = "inside-profile-container" id = "profile-address"><a href = "/logout">Log out of your account</a></span>
</div>
</div>
<div id = "large-profile-image-container">
<div id = "cancel-large-image"><i class = "fa fa-remove" id = "remove-large-icon"></i></div>
<img src = "/user_profiles/<?php echo $query_array['profile']; ?>" id = "user-profile-large" alt = "" />
</div>
<div id="main-settings-toggle">
<button id="ads-toggle" class="toggles">
<?php  echo $_GET['id']; ?> ads
</button>
<button id="favorites-toggle" class="toggles">
   Favorite ads
</button>
</div>
 <div id = "ads-main">
<div id = "ads-container">
<div id = "ads-home-text"><?php echo $_GET['id']; ?> ads</div>
<?php
function cut($text , $length) {
  if(mb_strlen($text, "UTF-8") > $length) {
    $string = substr($text, 0 , $length);
return $string."...";
  }
  else {
    return $text;
  }
}
function getAdTitle($id) {
  $conn = mysqli_init();
  if(mysqli_real_connect($conn  , HOST , USER , PASSWORD , DB)) {

  $sql = "SELECT * FROM ads WHERE ad_id = '{$id}'";
  if($query = mysqli_query($conn , $sql)) {
    $query_array = mysqli_fetch_assoc($query);
    $title = $query_array['title'];
    return $title;
  }
}
}

function getAdDetails($id) {
  $conn = mysqli_init();
  if(mysqli_real_connect($conn  , HOST , USER , PASSWORD , DB)) {

  $sql = "SELECT * FROM ads WHERE ad_id = '{$id}'";
  if($query = mysqli_query($conn , $sql)) {
    return $query_array = mysqli_fetch_assoc($query);
    }
}
}
function getPosterData($username) {
  $conn = mysqli_init();
  if(mysqli_real_connect($conn  , HOST , USER , PASSWORD , DB)) {

  $sql = "SELECT * FROM users WHERE username = '{$username}'";
  if($query = mysqli_query($conn , $sql)) {
    return $query_array = mysqli_fetch_assoc($query);
    }
}
}

function getFirstPhoto($id) {
  $conn = mysqli_init();
  if(mysqli_real_connect($conn  , HOST , USER , PASSWORD , DB)) {

  $sql = "SELECT * FROM ads WHERE ad_id = '{$id}'";
  if($query = mysqli_query($conn , $sql)) {
    $query_array = mysqli_fetch_assoc($query);
    $title = $query_array['first_photo'];
    return $title;
  }
}
}
if(mysqli_real_connect($conn  , HOST , USER , PASSWORD , DB)) {

$sql = "SELECT * FROM ads WHERE username = '{$username}' ORDER BY id DESC LIMIT  0 , 10 ";
if($query = mysqli_query($conn , $sql)) {
  $result = mysqli_fetch_all($query , MYSQLI_ASSOC);
  $message = (empty($result))?"No records found" : null;
  $i = 0;
  $my_image = MY_IMAGES;
  echo $message;
  foreach ($result as $key) {
    $i = $i+ 1;
    $id = $key['ad_id'];
    $title = $key['title'];
    $university = $query_array['institution'];
    $price = $key['price'];
                 if($price != 'Contact for price') {
                    $price = "&#8358;".$price;
                    
                 }
    echo   "<a onClick = 'window.location.href=\"/ad/$id\"' class = 'ad-user-links' href = '/ad/{$id}' title = '{$title}'><span
    class = 'image-ad-first' style  = \"background-image:url('/$my_image/".getFirstPhoto($id)."')\"></span>
    <font class = 'ad-title'>".cut($title , 22)."</font>
<span class ='ad-universiity'>".cut($university , 30)."</span>
    <span class = 'ad-price'>$price</span>

  </a>";
  }
}
}
?>

</div>
</div>

<div id = "ads-main">
<div id = "favorites-ads-container">
<div id = "ads-home-text"><?php echo ucfirst(strtolower($_GET['id'])); ?> Favorite ads</div>
<?php
$username = ucfirst(strtolower($_GET['id']));
if(mysqli_real_connect($conn  , HOST , USER , PASSWORD , DB)) {

$sql = "SELECT * FROM favorites WHERE username = '{$username}' ORDER BY id DESC LIMIT  0 , 10 ";

if($query = mysqli_query($conn , $sql)) {
  $result = mysqli_fetch_all($query , MYSQLI_ASSOC);
  $message = (empty($result))?"No records found" : null;
  $i = 0;
  $my_image = MY_IMAGES;
  echo $message;
  foreach ($result as $key) {
  $i = $i+ 1;
    $id = $key['ad_id'];
    $ad_details = getAdDetails($id);
    $ad_poster = $ad_details['username'];
    $poster_details = getPosterData($ad_poster);
    $title = $ad_details['title'];
    $price = $ad_details['price'];
    $university = $poster_details['institution'];
                 if($price != 'Contact for price') {
                    $price = "&#8358;".$price;
                 }
    echo   "<a onClick = 'window.location.href=\"/ad/$id\"' class = 'ad-user-links' href = '/ad/{$id}' title = '{$title}'><span
    class = 'image-ad-first' style  = \"background-image:url('/$my_image/".getFirstPhoto($id)."')\"></span>
    <font class = 'ad-title'>".cut($title , 22)."</font>
<span class ='ad-universiity'>".cut($university , 30)."</span>
    <span class = 'ad-price'>$price</span>

  </a>
  ";
  }
}
}
?>

</div>
</div>

  
<span id = "confirm-load" loaded = "true"></span>

<?php if(getTotalAdsByUser() > 10 || getTotalFavoritesByUser() > 10) { ?>
<span  data-username = "<?php  echo $username; ?>"id = "post-span" data-ad-last = "10"  data-favorites-last = "10"><i id = "post-loader"></i></span>
<?php } ?>
 <?php

require_once("{$incs_dir}footer.php");

  //  print_r($query_array);

    ?>


    </body>
</html>
