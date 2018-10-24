<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/Web_Data/incs/config.php';
$request_method = $_SERVER['REQUEST_METHOD'];
if($request_method != "POST") {
  exit("Exited");
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
function cut($text , $length) {
  if(mb_strlen($text, "UTF-8") > $length) {
    $string = substr($text, 0 , $length);
return $string.'...';
  }
  else {
    return $text;
  }
}
if(isset($_POST['data']) && !empty($_POST['data'])){
  $data = json_decode($_POST['data'] , true);
  $username = $data['username'];
  $last = $data['last'];
  $conn = mysqli_init();
  $next = 20 + $last;
  $num_message = 20;
  mysqli_real_connect($conn , HOST , USER , PASSWORD , DB);
  $sql = "SELECT * FROM messages WHERE message_to = '{$username}' ORDER BY id DESC LIMIT  $last , $num_message ";
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
