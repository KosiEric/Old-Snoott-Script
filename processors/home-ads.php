<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/Web_Data/incs/config.php';
$request_method = $_SERVER['REQUEST_METHOD'];
if($request_method != "POST") {
  exit("Exited");
}
?>
<?php

$conn = mysqli_init();
$ads =  NUM_ADS;
if(mysqli_real_connect($conn , MY_HOST , MY_USER , MY_PASSWORD , MY_DB)){
     $sql = "SELECT * FROM ads WHERE active = 1 AND activated = 1 ORDER BY time_updated DESC LIMIT  0 , $ads";
    if($query = mysqli_query($conn , $sql)) {

        $query_array = mysqli_fetch_all($query , MYSQLI_ASSOC);

function getPosterData($username) {
    $conn = mysqli_init();
   if(mysqli_real_connect($conn , HOST , USER , PASSWORD , DB));
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

        foreach($query_array as $ad) {
            $id = $ad['ad_id'];
            $title = $ad['title'];
            $first_photo = $ad['first_photo'];
            $username = $ad['username'];
            $my_image = IMAGES;
            $poster_data = getPosterData($username);
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

?>
