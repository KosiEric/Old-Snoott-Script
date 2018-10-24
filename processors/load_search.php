<?php

require_once $_SERVER['DOCUMENT_ROOT'].'/Web_Data/incs/config.php';

$request_method = $_SERVER['REQUEST_METHOD'];

if($request_method != 'POST') {

    die("File exited");
}

session_start();
function getPosterData($username) {
    $conn = mysqli_init();
   if(mysqli_real_connect($conn , HOST  , USER , PASSWORD , DB));
    $sql = "SELECT * FROM users WHERE username = '{$username}'";
    if($query = mysqli_query($conn , $sql)) {
        $fetch_array = mysqli_fetch_assoc($query);
         return $fetch_array;
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

$conn = mysqli_init();

$connect = mysqli_real_connect ($conn , HOST , USER , PASSWORD , DB);




$ad_state = strtolower($_SESSION['main_state']);

//$text = mysqli_real_escape_string($conn , $data['text']);

$original_text = $_SESSION['original_text'];
$new_text = str_replace(' ', '',  $original_text);
$search_text = mysqli_real_escape_string($conn , $original_text);
$start = $_POST['start'];
$next = $start + NUM_ADS;
$num_ads = NUM_ADS;
$sql = "SELECT * FROM ads WHERE title LIKE '%$search_text%' AND active = 1 AND activated = 1 ORDER BY time_updated DESC LIMIT $start , $num_ads";
$query = mysqli_query($conn , $sql);
$query_array = mysqli_fetch_all($query , MYSQLI_ASSOC);




  $counter = 0;
  $image = IMAGES;
        foreach($query_array as $ad) {
            $counter += 1;


            $id = $ad['ad_id'];
            $title = $ad['title'];
            $first_photo = $ad['first_photo'];
            //$username = $ad['username'];
            $poster_data = getPosterData($ad['username']);
            $state = strtolower($poster_data['state']);
            //$time_created = $ad['time_created'];
            $university = cut($poster_data['institution'] , 40);
            $price = $ad['price'];

                 if($price != 'Contact for price') {
                    $price = "&#8358;".$price;
                 }


        if ($state == $ad_state){
  echo   "<a onClick = 'window.location.href=\"/ad/$id\"' class = 'ad-user-links' href = '/ad/{$id}' title = '{$title}'><span
    class = 'image-ad-first' style  = \"background-image:url('/$image/".$first_photo."')\"></span>
    <font class = 'ad-title'>".cut($title , 22)."</font>
<span class ='ad-universiity'>".cut($university , 30)."</span>
    <span class = 'ad-price'>$price</span>

  </a>";



        }
}


if($counter == 0) {
  $_SESSION['empty_result'] = 'true';
}
else {
  $_SESSION['empty_result'] = 'false';
}



?>
