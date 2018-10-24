
<?php
error_reporting(false);
session_start();



if(!isset($_SESSION['user_details'])){
    header('Location:/account');
}

//print_r($_SESSION['user_details']);
if($_SESSION['user_details']['fullname'] !=''){
  $name = $_SESSION['user_details']['fullname'];
}

else {

  $name = 'User';
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
$page_description = "Snoott user account Profile";
$page_keywords = "Snoott , User , Account , Settings , Session";


//$page_title = " ";

require_once($_SERVER['DOCUMENT_ROOT'].'/Web_Data/incs/site_data.php');

$page_title = $name.' @'.ucfirst($_SESSION['user_details']['username']).' • Snoott.';

require_once($incs_dir.'meta.php');

require_once($incs_dir.'config.php');
$conn  = mysqli_init();
$username = $_SESSION['user_details']['username'];

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

if($_SESSION['user_details']['email_verified'] == 0){

echo "<link rel= 'stylesheet' href = '{$css_dir}confirm_email.css' type = 'text/css' />".PHP_EOL;
echo "<script type = 'text/JavaScript' src = '{$js_dir}confirm_email.js' language = 'javascript'></script>";


}
    ?>




    </head>

    <body>


         <?php


require_once("{$incs_dir}header.php");

  //  print_r($_SESSION['user_details']);

    ?>
<div id = "big-profile-div">
<div id = "profile-content-container">
    <div style  = "background-image:url('/user_profiles/<?php echo $_SESSION['user_details']['profile']; ?>')" id = "user-profile-image" class = "inside-profile-container"></div>
<span class = "inside-profile-container" id = "profile-username"><a href="/settings"><i class="fa fa-gear" id = "username-gear"></i></a><span id = "logged-username"
><?php echo ucfirst($_SESSION['user_details']['username']); ?></span>
</span>
<span class = "inside-profile-container" id = "profile-ads">your ads : <?php echo getTotalAdsByUser(); ?></span>
<span class = "inside-profile-container" id = "favorite-ads">Favorite ads : <?php echo getTotalFavoritesByUser(); ?></span>
<span class = "inside-profile-container" id = "profile-address"><a href = "/profile">Snoott.com/user/<?php echo ucfirst($_SESSION['user_details']['username']); ?></a></span>
<span class = "inside-profile-container" id = "profile-address"><a href = "/logout" title = "Logout this account">Log out my account</a></span>
</div>
</div>
<div id = "large-profile-image-container">
<div id = "cancel-large-image"><i class = "fa fa-remove" id = "remove-large-icon"></i></div>
<img src = "/user_profiles/<?php echo $_SESSION['user_details']['profile']; ?>" id = "user-profile-large" alt = "" />
</div>
<div id="main-settings-toggle">
<button id="ads-toggle" class="toggles">
Your ads
</button>
<button id="favorites-toggle" class="toggles">
   Favorite ads
</button>
</div>
<div id = "ads-main">
<div id = "ads-container">
<div id = "ads-home-text">Your ads</div>
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

function isVerifiedEmail() {
  $conn = mysqli_init();
  if(mysqli_real_connect($conn  , HOST , USER , PASSWORD , DB)) {
$user = $_SESSION['user_details']['username'];
  $sql = "SELECT * FROM users WHERE username = '{$user}'";
  if($query = mysqli_query($conn , $sql)) {
    $query_array = mysqli_fetch_assoc($query);
    $verified = $query_array['email_verified'];
    return $verified;
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

<?php  

//$sql = "SELECT * FROM favorites WHERE username = '{$username}' ORDER BY id DESC LIMIT  0 , 10 ";
 
?>
<div id = "ads-main">
<div id = "favorites-ads-container">
<div id = "ads-home-text">Favorite ads</div>
<?php

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

<span id = "confirm-load" data-loaded = "true"></span>
<?php if(getTotalAdsByUser() > 10 || getTotalFavoritesByUser() > 10) { ?>
<span  data-username = "<?php  echo $username; ?>"id = "post-span" data-ad-last = "10"  data-favorites-last = "10"><i id = "post-loader"></i></span>
<?php } ?>
 <?php
if(isVerifiedEmail() == 0){
require_once("{$incs_dir}confirm_email.php");

}




require_once("{$incs_dir}footer.php");

  //  print_r($_SESSION['user_details']);

    ?>
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

    </body>
</html>
