<?php

require_once $_SERVER['DOCUMENT_ROOT'].'/Web_Data/incs/config.php';

$request_method = $_SERVER['REQUEST_METHOD'];

if($request_method != 'POST') {

    die("File exited");
}

session_start();
$conn = mysqli_init();

$connect = mysqli_real_connect ($conn , HOST , USER , PASSWORD , DB);


$data = json_decode($_POST['data'] , true);


$ad_state = strtolower($data['state']);
$_SESSION['main_state'] = $data['state'];
$text = mysqli_real_escape_string($conn , $data['text']);
$original_text = $data['text'];
$_SESSION['original_text'] = $original_text;
$new_text = str_replace(' ', '',  $data['text']);
$_SESSION['search_text'] = $new_text;
$_SESSION['search_state'] = $ad_state;
$search_text = mysqli_real_escape_string($conn , $original_text);
$sql = "SELECT * FROM ads WHERE title LIKE '%$search_text%' AND active = 1 AND activated = 1 ORDER BY time_updated DESC";
$query = mysqli_query($conn , $sql);
$query_array = mysqli_fetch_all($query , MYSQLI_ASSOC);

function getPosterData($username) {
    $conn = mysqli_init();
   if(mysqli_real_connect($conn , HOST  , USER , PASSWORD , DB));
    $sql = "SELECT * FROM users WHERE username = '{$username}'";
    if($query = mysqli_query($conn , $sql)) {
        $fetch_array = mysqli_fetch_assoc($query);
         return $fetch_array;
    }


}


  $counter = 0;
        foreach($query_array as $ad) {
            $counter += 1;
if($counter == 6 ) {
    break;
}

            //$id = $ad['ad_id'];
            $title = $ad['title'];
            //$first_photo = $ad['first_photo'];
            $username = $ad['username'];
            $poster_data = getPosterData($ad['username']);
            $state = strtolower($poster_data['state']);
            //$time_created = $ad['time_created'];
            //$university = cut($poster_data['institution'] , 40);
            $price = $ad['price'];

                 if($price != 'Contact for price') {
                    $price = "&#8358;".$price;
                 }


        if ($state == $ad_state){
  echo   "<a class = 'ad-drop-links' href = '/search' title = '{$title}' onclick = \"window.location.href='/search'\">
$title
  </a>
  ";



        }
}


if($counter == 0) {
  $_SESSION['empty_result'] = 'true';
}
else {
  $_SESSION['empty_result'] = 'false';
}



?>
