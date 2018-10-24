<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/Web_Data/incs/config.php';
$request_method = $_SERVER['REQUEST_METHOD'];
if($request_method == "POST" AND isset($_POST['data'])) {

  }

  else {
    exit("Exited");

  }


function getPosterData($username) {
    $conn = mysqli_init();
   if(mysqli_real_connect($conn , MY_HOST , MY_USER , MY_PASSWORD , MY_DB));
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
if(isset($_POST['data']) && !empty($_POST['data'])){
$conn = mysqli_init();
if(mysqli_real_connect($conn , MY_HOST , MY_USER , MY_PASSWORD , MY_DB)){
  $data = json_decode($_POST['data']  , true);
  $next = $data['next'];
  $num_ads = NUM_ADS;
     $nextPlus = $next + $num_ads;
     //echo "<br />";
$sql = "SELECT * FROM ads WHERE active = 1 AND activated = 1 ORDER BY time_updated DESC LIMIT  $next , $num_ads";
$my_image = IMAGES;
    if($query = mysqli_query($conn , $sql)) {

        $query_array = mysqli_fetch_all($query , MYSQLI_ASSOC);




        foreach($query_array as $ad) {
            $id = $ad['ad_id'];
            $title = $ad['title'];
            $first_photo = $ad['first_photo'];
            $username = $ad['username'];
            $poster_data = getPosterData($ad['username']);
            $time_created = $ad['time_created'];
            $university = cut($poster_data['institution'] , 40);
            $price = $ad['price'];
                 if($price != 'Contact for price') {
                    $price = "&#8358;".$price;
                 }
                 echo   "<a onClick = 'window.location.href=\"/ad/$id\"' class = 'ad-user-links' href = '/ad/{$id}' title = '{$title}'><span
    class = 'image-ad-first' style  = \"background-image:url('/$my_image/".$first_photo."')\"></span>
    <font class = 'ad-title'>".cut($title , 22)."</font>
<span class ='ad-universiity'>".cut($university , 30)."</span>
    <span class = 'ad-price'>$price</span>

  </a>
  ";
        }

    }

}
}

?>
