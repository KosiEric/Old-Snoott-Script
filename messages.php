
<?php

session_start();

if(!isset($_GET['id']) && isset($_SESSION['user_details'])) {?>

<!DOCTYPE html>
<html>
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
  $page_description = "Snoott user account Messages";
  $page_keywords = "Snoott , User , Account , Messages , Session";


  //$page_title = " ";

  require_once($_SERVER['DOCUMENT_ROOT'].'/Web_Data/incs/site_data.php');

  $page_title = 'Account Messages • Snoott.';

  require_once($incs_dir.'meta.php');

  require_once($incs_dir.'config.php');
  $conn  = mysqli_init();
  $username = $_SESSION['user_details']['username'];
?>
<link rel="stylesheet" type="text/css" href="<?php  echo $css_dir?>profile.css" />
<link rel="stylesheet" type="text/css" href="<?php  echo $css_dir?>footer.css" />
<link rel="stylesheet" type="text/css" href="<?php  echo $css_dir?>messages.css" />



<?php



require_once("{$incs_dir}header_style.php");



?>
<style type="text/css">

body {
background-color: #f5f8fa;
}
</style>
<script type="text/javascript" language ="JavaScript" src="<?php  echo $js_dir?>jquery.js"></script>
<script type="text/javascript" language ="JavaScript" src="<?php  echo $js_dir?>messages.js">
</script>
</head>

<?php


require_once("{$incs_dir}header.php");

//  print_r($_SESSION[
function isRead($id) {
  $conn = mysqli_init();
  if(mysqli_real_connect($conn , HOST , USER , PASSWORD, DB)) {
    $sql = "SELECT * FROM messages WHERE message_id = '{$id}'";
    if($query = mysqli_query($conn , $sql)) {
      $query_array = mysqli_fetch_assoc($query);
      $read_status =  $query_array['read_status'];
if($read_status == 'unread') {
  return false;
}
else {

  return true;
}

    }
  }
}
function getTotalMessagesByUser () {
global $username , $conn;
  if(mysqli_real_connect ($conn , HOST , USER , PASSWORD , DB)){
    $sql = "SELECT username FROM messages WHERE message_to = '{$username}'";
    if($query = mysqli_query($conn , $sql)){
$number_of_ads = mysqli_num_rows($query);
return $number_of_ads;
      }

  }
  }


?>

<div id = "messages-div">
  Your messages
</div>
<span id = "messages-count">Total messages : <?php echo getTotalMessagesByUser(); ?></span>
<div id = "user-messages-container" class = "containers">
  <?php
  function getAdTitle($id) {
    $conn = mysqli_init();
    if(mysqli_real_connect($conn  , HOST , USER , PASSWORD , DB)) {

    $sql = "SELECT * FROM ads  WHERE ad_id = '{$id}'";
    if($query = mysqli_query($conn , $sql)) {
      $query_array = mysqli_fetch_assoc($query);
      $title = $query_array['title'];
      return $title;
    }
  }
  }
  if(mysqli_real_connect($conn  , HOST , USER , PASSWORD , DB)) {

  $sql = "SELECT * FROM messages WHERE message_to = '{$username}' ORDER BY id DESC LIMIT  0 , 20 ";
  if($query = mysqli_query($conn , $sql)) {
    $result = mysqli_fetch_all($query , MYSQLI_ASSOC);
    $message = (empty($result))?"No records found" : null;
    $i = 0;
    echo $message;
    foreach ($result as $key) {
      $i = $i+ 1;
      $id = $key['ad_id'];
      $title = getAdTitle($key['ad_id']);
      $message_id = $key['message_id'];
      if(isRead($message_id)){
      echo   "<a class = 'messages-links' href = '/messages/{$message_id}' title = '{$title}' >$title</a>";
}

else {
  echo   "<b><a class = 'messages-links' href = '/messages/{$message_id}' title = '{$title}' >$title</a></b>";
}
    }
  }
  }
  ?>

</div>
<?php if(getTotalMessagesByUser() > 20) { ?>
<span  data-username = "<?php  echo $username; ?>"id = "post-span" data-ad-last = "20"  data-favorites-last = "20"><i id = "post-loader"></i></span>
<?php } ?>
<?php


require_once("{$incs_dir}footer.php");

//  print_r($_SESSION['user_details']);

?>
</html>



<?php


}

 else if(isset($_SESSION['user_details']) && isset($_GET['id'])) {
require_once($_SERVER['DOCUMENT_ROOT'].'/Web_Data/incs/config.php');
$conn = mysqli_init();
if(mysqli_real_connect($conn , HOST , USER , PASSWORD , DB)) {
  $id = mysqli_real_escape_string($conn , $_GET['id']);
  $sql = "SELECT * FROM messages WHERE message_id = '{$id}'";
  if($query = mysqli_query($conn , $sql)) {
    $query_array = mysqli_fetch_assoc($query);
    $username = $_SESSION['user_details']['username'];
    if(!empty($query_array) AND (strtolower($query_array['message_to']) == strtolower($username)))  { ?>
  <!DOCTYPE html>
  <html>
  <head>
    <?php
    $page_description = "Snoott user account Messages";
    $page_keywords = "Snoott , User , Account , Messages , Session";


    //$page_title = " ";

    require_once($_SERVER['DOCUMENT_ROOT'].'/Web_Data/incs/site_data.php');

    $page_title = 'Account Messages • Snoott.';

    require_once($incs_dir.'meta.php');

    require_once($incs_dir.'config.php');
    $conn  = mysqli_init();
    $username = $_SESSION['user_details']['username'];

    function  updateRead() {
      global $id;
      $conn = mysqli_init();
      if(mysqli_real_connect($conn , HOST , USER , PASSWORD , DB)) {
        $sql = "UPDATE messages SET read_status = 'read' WHERE message_id = '{$id}'";
        if($query = mysqli_query($conn , $sql)) {
          return true;
        }
        else {
          return false;
        }
      }
    }

    updateRead();
  ?>
 <link rel="stylesheet" type="text/css" href="<?php  echo $css_dir?>ad.css" />

  <link rel="stylesheet" type="text/css" href="<?php  echo $css_dir?>messages.css" />
  <link rel="stylesheet" type="text/css" href="<?php  echo $css_dir?>footer.css" />

 <link rel="stylesheet" type="text/css" href="<?php  echo $css_dir?>font-awesome.css" />

  <?php



  require_once("{$incs_dir}header_style.php");



  ?>
  <style type="text/css">

  body {
  background-color: #f5f8fa;
  }
  </style>
  <script type="text/javascript" language ="JavaScript" src="<?php  echo $js_dir?>jquery.js"></script>
  <script type="text/javascript" language ="JavaScript" src="<?php  echo $js_dir?>messages.js">

  </script>
  <script type="text/javascript" language ="JavaScript" src="<?php  echo $js_dir?>moment.js">

  </script>
  <script type="text/javascript" language ="JavaScript" src="<?php  echo $js_dir?>livestamp.js">

  </script>

  </head>
<body>
  <?php
function getAdTitle($id) {
    $conn = mysqli_init();
    if(mysqli_real_connect($conn  , HOST , USER , PASSWORD , DB)) {

    $sql = "SELECT * FROM ads  WHERE ad_id = '{$id}'";
    if($query = mysqli_query($conn , $sql)) {
      $query_array = mysqli_fetch_assoc($query);
      $title = $query_array['title'];
      return $title;
    }
  }
  }


  require_once("{$incs_dir}header.php");
?>
<div id = "inbox-container">
<div id = 'message-ad'><?php echo getAdTitle($query_array['ad_id']); ?></div>
<div id = "message-from-content" class = "message-headers">
  <span class = "message-spans-headers" id = "from">From : </span> <span class = "message-from"><?php echo $query_array['message_from']; ?></span>
</div>

<div id = "message-username-content" class = "message-headers">
  <span class = "message-spans-headers" id = "username">Username : </span> <span class = "message-username"><?php
   if($query_array['username'] == 'none'){
echo "Not registered";
}

else {
  echo $query_array['username'];
}
    ?></span>
</div>
<div id = "message-phone-content" class = "message-headers">
  <span class = "message-spans-headers" id = "phone">Phone : </span> <span class = "message-phone"><?php echo $query_array['phone']; ?></span>

</div>
  <div id = "message-name-content" class = "message-headers">
  <span class = "message-spans-headers" id = "name">Fullname : </span> <span class = "message-fullname"><?php echo $query_array['fullname']; ?></span>
</div>
<div id = "message-content" class = "message-headers">
  <span class = "message-spans-headers" id = "message">Message : </span> <span id = "message-text"><?php echo $query_array['message']; ?></span>
</div>
<div id = "message-time">Sent <span data-livestamp="<?php echo $query_array['message_time']; ?>"></span></div>
<?php if($query_array['username'] != 'none') { ?>
<button  id = "send-message-hide-div" data-already-sent = "false">
                  <i class = "fa fa-envelope" id = "send-email-button-icon"></i> Reply message
                    </button>
    <fieldset id ="form-field">

                    <form autocomplete="on" action = "#" name = "send-message-form" id = "send-message-form" enctype="application/x-www-form-urlencoded" accept-charset="utf-8" method="post">
<input type = "text" name = "message-fullname" class = "text-inputs message-text-inputs" id = "message-fullname" value = '<?php

if(isset($_SESSION['user_details']) AND !empty($_SESSION['user_details'])){
  echo $_SESSION['user_details']['fullname'];
}
else {
  echo null;
}
?>' placeholder = "fullname" />
<span id = "message-fullname-warning" class = "message-warnings">first name ,  sur name</span>

<input type = "text" name = "message-email" class = "text-inputs message-text-inputs" id = "message-email" value = '<?php

if(isset($_SESSION['user_details']) AND !empty($_SESSION['user_details'])){
  echo $_SESSION['user_details']['email'];
}
else {
  echo null;
}
?>' placeholder = "email" />
<input type ="text" name = "phone" class = "text-inputs message-text-inputs" id = "message-phone" placeholder = "Tel" value = '<?php

if(isset($_SESSION['user_details']) && !empty($_SESSION['user_details'])){
  echo $_SESSION['user_details']['phone'];
}
else {
  echo null;
}
?>' />

<textarea name = "message" id = "message-message"  class="text-inputs" placeholder="enter your message"></textarea>
<span id = "message-message-warning" class = "message-warnings">Minimum of 20 characters</span>
<button name = "send-message-button" id = "send-message-button" data-username = "<?php
if(isset($_SESSION['user_details']) && !empty($_SESSION['user_details'])) {
  echo $_SESSION['user_details']['username'];
}

else {

  echo "none";
}

 ?>" data-id = "<?php echo $query_array['ad_id']; ?>" data-to = "<?php echo $query_array['username']; ?>"><font id = "message-send-text">Send</font><i
 class = "fa fa-sign-in" id = "send-message-icon"></i></button>
                    </form></fieldset>
<?php }?>
</div>
<?php


require_once("{$incs_dir}footer.php");
?>

    <?php }
  }
}

}
    ?>

 <?php  //} ?>
 
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