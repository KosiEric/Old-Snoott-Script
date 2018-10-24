
<?php
$conn = mysqli_init();
require_once $_SERVER['DOCUMENT_ROOT'].'/Web_Data/incs/config.php';

if(mysqli_real_connect($conn , MY_HOST , MY_USER , MY_PASSWORD , MY_DB)) {
  $user = $_SESSION['user_details']['username'];
  $sql = "SELECT username FROM last_seen WHERE username = '{$user}'";
  if($query = mysqli_query($conn , $sql)){
    $num_rows = mysqli_num_rows($query);
    if($num_rows == 1) {
      $time = time();
      $sql = "UPDATE last_seen SET last_seen = '{$time}' WHERE username = '{$user}'";
      if($query = mysqli_query($conn , $sql)){
        $_SESSION['user_details']['last_seen'] = $time;
      }


          }

          else {
            $time = time();
            $sql = "INSERT INTO last_seen(`username` ,`last_seen`) VALUES ('{$user}' , '{$time}')";
            if($query  = mysqli_query($conn , $sql)){
            $_SESSION['user_details']['last_seen'] = $time;
            }
          }
  }
}

function getUnreadMessages () {

  $user = $_SESSION['user_details']['username'];
$conn = mysqli_init();
if(mysqli_real_connect($conn , MY_HOST , MY_USER , MY_PASSWORD , MY_DB)) {

  $sql = "SELECT username FROM messages WHERE message_to = '{$user}' AND read_status = 'unread'";

  if($query = mysqli_query($conn , $sql)) {
    $num_rows = mysqli_num_rows($query);
    return $num_rows;
  }

}

}

 ?>
<script>

 
jQuery(document).ready(function() {
  
   jQuery('#menu-bar').on('click' , function () {

if(document.getElementById('logged-header-container')){
   
jQuery('.logged-header-divs').toggleClass('block-elements');

    }
});
 }); 
  </script>
    <div id = "logged-header-container" class = "main-header-containers">

<div id = "drop-header-container"><a href = "/" id = "main-menu-link"><i class = "fa fa-home" id = "menu-home"></i></a> <i class = "fa fa-bars" 
  id = "menu-bar" ></i></div>
            <?php

        if(strtolower($_SESSION['user_details']['profile']) != 'user.png'){

          echo '<a href = "/profile" id="first-on-header-div" class = "logged-header-divs slidable-headers" onclick="window.location.href=\'/profile\';" >
 <span style = "background-image:url(\'/user_profiles/'.$_SESSION["user_details"]["profile"].'\')" id = "small-header-icon"></span>
          <i class="fa fa-user-circle" style="font-size:20px;color:#000;display:none;"></i>

<span class = "mobile-header-span" id = "mobile-profile-span-header">My Profile</span>
        </a>
          ';
        }

        else {

         echo '<a href = "/profile" id="first-on-header-div" class = "logged-header-divs slidable-headers" onclick="window.location.href=\'/profile\';">
          <i class="fa fa-user-circle" style="font-size:20px;color:#000;"></i>
<span class = "mobile-header-span" id = "mobile-profile-span-header">My Profile</span>
        </a>';}
            ?>

        <a id="second-on-header-div" href = "/messages" class = "logged-header-divs slidable-headers" onclick="window.location.href='/messages';">

            <i id = "message-envelope" class="fa fa-envelope" aria-hidden="true"><?php if(getUnreadMessages() >= 1){ ?>
              <?php $numMessagesUnread = getUnreadMessages(); ?>
              <font id = "message-count"><?php echo $numMessagesUnread; ?></font>
            <?php }  ?></i>
<span class = "mobile-header-span" id = "mobile-messages-span-header">Messages</span>
        </a>
               <a href = "/sell" id="third-on-header-div"  class = "logged-header-divs slidable-headers" onclick="window.location.href='/sell';">
      <!--<span id = "header-plus"><i class="fa fa-bullhorn"></i></span>--><i class="fa fa-bullhorn"></i><span class = "mobile-header-span" id = "mobile-sell-span-header">Sell your item</span>
        </a>

        <a id="user-settings-header" href = "/settings" class = "logged-header-divs slidable-headers" onclick="window.location.href='/settings';">
        <i class="fa fa-gear"></i> <span class = "mobile-header-span" id = "mobile-settings-span-header" >Settings</span>

             </a>
<a id="user-link-header" href = "/" class = "logged-header-divs" onclick="window.location.href='/';">
        

             </a>
       </div>
