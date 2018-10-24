<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/Web_Data/incs/config.php';
$request_method = $_SERVER['REQUEST_METHOD'];
if($request_method != "POST") {
  exit("Exited");
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


function cut($text , $length) {
  if(mb_strlen($text, "UTF-8") > $length) {
    $string = substr($text, 0 , $length);
return $string."...";
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
  $next = 10 + $last;
  $connect = mysqli_real_connect($conn , HOST , USER , PASSWORD , DB);
  $num_ads = NUM_ADS;
  $image = IMAGES;
  $sql = "SELECT * FROM favorites WHERE username = '{$username}' ORDER BY id DESC LIMIT  $last , $num_ads";
  if($query = mysqli_query($conn , $sql)) {
    $result = mysqli_fetch_all($query , MYSQLI_ASSOC);
    if(count($result) > 0) {
    $i = 0;
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
    class = 'image-ad-first' style  = \"background-image:url('/$image/".getFirstPhoto($id)."')\"></span>
    <font class = 'ad-title'>".cut($title , 22)."</font>
<span class ='ad-universiity'>".cut($university , 30)."</span>
    <span class = 'ad-price'>$price</span>

  </a>
  ";


}

}
else {
  echo "";
}
}
}


?>
