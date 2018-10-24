<?php
require_once($_SERVER['DOCUMENT_ROOT'].'/Web_Data/incs/config.php');
session_start();
$conn = mysqli_init();
mb_internal_encoding("utf-8");
if(isset($_GET['id']) && !empty($_GET['id'])) {
  $id = $_GET['id'];
  if(mb_strlen($id) != 15){
    header("Location: /".$id);
  }
  else {
global $conn;
  //  require_once($_SERVER['DOCUMENT_ROOT'].'/Web_Data/incs/config.php');

    if(mysqli_real_connect($conn , HOST , USER , PASSWORD , DB)){
      $id = mysqli_real_escape_string($conn , $id);
      $sql = "SELECT * FROM ads WHERE ad_id = '{$id}'";
      if($query = mysqli_query($conn , $sql)){
        $ad_details = mysqli_fetch_assoc($query);
        $_GLOBALS['ad_details'] = $ad_details;
        if(empty($ad_details)){
          header("Location: /".$id);
        }

      }
    }
  }
}
else if(!isset($_GET['id'])){
  header("Location:/");
}

$conn = mysqli_init();
if(mysqli_real_connect($conn , HOST , USER , PASSWORD , DB)){
  $ad_poster = $ad_details['username'];
  $sql = "SELECT * FROM users WHERE username = '{$ad_poster}'";
  if($query = mysqli_query($conn , $sql)) {
    $post_details = mysqli_fetch_assoc($query);

  }
}

function isActive () {
  global $id , $conn;
  if(connect()) {
    $sql  = "SELECT active FROm ads WHERE ad_id = '{$id}'";
    if($query = mysqli_query($conn , $sql )) {
      $active_array = mysqli_fetch_assoc($query);
      $active = $active_array['active'];
      if($active == 1) {
        return true;
      }
      else {
        return false;
      }
    }

  }
}

function isSuspended () {
  global $id , $conn;
  if(connect()) {
    $sql  = "SELECT activated FROm ads WHERE ad_id = '{$id}'";
    if($query = mysqli_query($conn , $sql )) {
      $active_array = mysqli_fetch_assoc($query);
      $active = $active_array['activated'];
      if($active == 0) {
        return true;
      }
      else {
        return false;
      }
    }

  }
}
function cut($text , $length) {
  if(mb_strlen($text, "UTF-8") > 20) {
    $string = substr($text, 0 , 20);
return $string;
  }
  else {
    return $text;
  }
}
function sessionExists() {
  if(isset($_SESSION['user_details']) && !empty($_SESSION['user_details'])){
    return true;
  }
  else {
    return false;
  }
}
function connect () {
   $conn = mysqli_init();
  if(mysqli_real_connect($conn , HOST , USER , PASSWORD , DB)){
    return true;
  }
  else {
    return false;
  }
}

function query ($sql){
  global $conn;
  if(mysqli_query($conn  , $sql)){
    return true;
  }
  else {
    return false;
  }
  }
$current_user = null;
function postedByCurrentUser () {
if(sessionExists()){
  global $ad_poster , $current_user;
  $current_user = $_SESSION['user_details']['username'];
  if(strtolower($ad_poster) == strtolower($current_user)){
    return true;
  }
  else {

    return false;
  }
}
else {
  return false;
}

}

if(mysqli_real_connect($conn , HOST , USER , PASSWORD , DB)){
  $sql = "SELECT * FROM users  WHERE username  ='{$ad_poster}'";
  if($query = mysqli_query($conn , $sql)){
    $poster_details = mysqli_fetch_assoc($query);
    //print_r($post_details);
  }
}
function getLastSeen () {
global $ad_poster , $conn;
  if(mysqli_real_connect ($conn , HOST , USER , PASSWORD , DB)){
    $sql = "SELECT * FROM last_seen WHERE username = '{$ad_poster}'";
    if($query = mysqli_query($conn , $sql)){
      $last_seen_array = mysqli_fetch_assoc($query);
    echo  $poster_last_seen = $last_seen_array['last_seen'];
    }

  }
  }
  function getTotalAdsByPoster () {
global $ad_poster , $conn;
    if(mysqli_real_connect ($conn , HOST , USER , PASSWORD , DB)){
      $sql = "SELECT username FROM ads WHERE username = '{$ad_poster}'";
      if($query = mysqli_query($conn , $sql)){
$number_of_ads = mysqli_num_rows($query);
echo $number_of_ads;
        }

    }
    }

    function isAnotherUser () {
      if(!postedByCurrentUser()){
        return true;
      }

      else {
        return false;
      }
    }

    function isLoggedInUser (){
      if(!postedByCurrentUser() && sessionExists()){
        return true;
      }
      else {
        return false;
      }
    }

function updateViews () {
  global $id , $conn;

  if(isAnotherUser()){
  if(mysqli_real_connect($conn , HOST , USER , PASSWORD , DB )){

    $sql = "UPDATE ads SET views = (views + 1) WHERE ad_id = '{$id}'";
if($query = mysqli_query($conn , $sql)){
  return true;
}
else {
  return false;
}
  }
  }
}


if(isset($_SESSION['user_details']) && !empty($_SESSION['user_details'])){
  $current_user = $_SESSION['user_details']['username'];
}

function isLikedByThisUser () {

global $conn , $id;
$current_user = $_SESSION['user_details']['username'];
if(connect()){
  $sql = "SELECT username FROM likes WHERE username = '{$current_user}' AND ad_id = '{$id}'";
  if($query = mysqli_query($conn , $sql)){
    $num_rows = mysqli_num_rows($query);
    if($num_rows == 1){
      return true;
    }

    else {
      return false;
    }
  }

}


}

function isFlaggedByThisUser () {

global $conn , $id;
$current_user = $_SESSION['user_details']['username'];
if(connect()){
  $sql = "SELECT username FROM flags WHERE username = '{$current_user}' AND ad_id = '{$id}'";
  if($query = mysqli_query($conn , $sql)){
    $num_rows = mysqli_num_rows($query);
    if($num_rows == 1){
      return true;
    }

    else {
      return false;
    }
  }

}


}
function isFavoritedByThisUser () {

global $conn , $id;
$current_user = $_SESSION['user_details']['username'];
if(connect()){
  $sql = "SELECT username FROM favorites WHERE username = '{$current_user}' AND ad_id = '{$id}'";
  if($query = mysqli_query($conn , $sql)){
    $num_rows = mysqli_num_rows($query);
    if($num_rows == 1){
      return true;
    }

    else {
      return false;
    }
  }

}


}
function getNumLikes () {
  global $conn , $id;
if(connect()){
  $sql = "SELECT username FROM likes WHERE ad_id = '{$id}'";
  if($query = mysqli_query($conn , $sql)) {
    $num_rows = mysqli_num_rows($query);
 return  $num_rows;
  }
}
  }
  function getNumFlags () {
    global $conn , $id;
  if(connect()){
    $sql = "SELECT username FROM flags WHERE ad_id = '{$id}'";
    if($query = mysqli_query($conn , $sql)) {
      $num_rows = mysqli_num_rows($query);
   return  $num_rows;
    }
  }
    }


  function getNumFavorites () {
    global $conn , $id;
  if(connect()){
    $sql = "SELECT username FROM favorites WHERE ad_id = '{$id}'";
    if($query = mysqli_query($conn , $sql)) {
      $num_rows = mysqli_num_rows($query);
   return  $num_rows;
    }
  }
    }
updateViews();
?>

  <!DOCTYPE html>
  <html lang="en-us" dir="ltr">

  <head>
      <?php
  $page_description = "Ad , View , Snoott , Web , Adify";
  $page_keywords = "Snoott , Ad , Create , View, Session";


  //$page_title = " ";

  require_once($_SERVER['DOCUMENT_ROOT'].'/Web_Data/incs/site_data.php');

  $page_title = ucfirst($ad_details['title'])."";

  require_once($incs_dir.'meta.php');

  ?>
      
      <link rel = "stylesheet" type = "text/css" href = "/mad.css" />
       <link rel="stylesheet" type="text/css" href="<?php  echo $css_dir?>footer.css" />
        <link rel="stylesheet" type="text/css" href="<?php  echo $css_dir?>offline.css" />
<link rel="stylesheet" type="text/css" href="<?php  echo $css_dir?>home.css" />
        
      <?php



  require_once("{$incs_dir}header_style.php");


require_once("{$incs_dir}offline.php");
      ?>

  <style type="text/css">

    body {
    background-color: #fff;
    }
  </style>
      <script type="text/javascript" language ="JavaScript" src="<?php  echo $js_dir?>jquery.js"></script>
      <script type="text/javascript" language ="JavaScript" src="<?php  echo $js_dir?>moment.js"></script>
      <script type="text/javascript" language ="JavaScript" src="<?php  echo $js_dir?>livestamp.js"></script>
      <script type="text/javascript" language ="JavaScript" src="<?php  echo $js_dir?>ad.js"></script>




      </head>

      <body>


           <?php


  require_once("{$incs_dir}header.php");
  ?>

<div id = "full-ad-container">
  <div id = "ad-post-details" class = "some-other-stuffs">
       <span id = "ad-title-span" class = "same-width"><?php  echo htmlspecialchars($ad_details['title'] , ENT_QUOTES , 'UTF-8'); ?></span>
       <span id = "ad-location" class="same-width"><i class = "fa fa-map-marker" id = "location-maker"></i>
         <a id = "state-of-post" class = "ad-location-link"><?php echo $post_details['state']; ?></a> <font id = "dot">•</font>
         <a id = "ad-institution-link"><?php echo ucfirst(strtolower($post_details['institution'])); ?></a></span><br />
    <span id = "further-more-details"><font id = "posted-time-details"><i class="fa fa-clock-o" id = "post-clock"></i>
       Posted <span data-livestamp="<?php echo $ad_details['time_created']; ?>"></span> by <?php
       if(postedByCurrentUser()) {
         $postee = "you";
       }
       else {
         $postee = $ad_poster;
       }
  if(postedByCurrentUser() && !isSuspended() && isActive()) {
    echo "<a href = '/profile' id = 'ad_poster_link' data-posted-by-current-user = 'true'>{$postee}</a>";
    echo "<a href = '/edit-ad/".$_GET['id']."' id = 'edit-ad-link'>Edit This Ad</a>";

  }

  else if(!isSuspended() AND isAnotherUser() AND isActive()) {
    echo "<a href = '/user/{$ad_poster}' id = 'ad_poster_link' data-posted-by-current-user = 'false'>{$postee}</a></a>";
     echo "<a href = '#' id = 'edit-ad-link'>Available</a>";

  }
  else if(isSuspended()) {

    echo "<a href = '/user/{$ad_poster}' id = 'ad_poster_link' data-posted-by-current-user = 'false'>{$postee}</a></a>";
     echo "<a href = '#' id = 'edit-ad-link'>Suspended</a>";
  }

  else if(!isActive()){
    echo "<a href = '/user/{$ad_poster}' id = 'ad_poster_link' data-posted-by-current-user = 'false'>{$postee}</a></a>";
     echo "<a href = '#' id = 'edit-ad-link'>Sold</a>";

  }   ?></font>  <div id = "short-poster-profile-details">
    <div id = "poster-profile-image" style  = "background-image:url('/user_profiles/<?php echo $poster_details['profile']; ?>')">

    </div>

    <div id = "someother-poster-details">
  <span id = "poster-fullname" class = "poster-profile"><?php echo $poster_details['fullname']; ?>
  </span>

  <span id = "poster-username" class = "poster-profile">@<?php echo $poster_details['username']; ?></span>
  <span class = "poster-data" id = "poster-total-ads"><i class = "fa fa-audio-description"></i></span>
  </span><span class = "poster-data" id = "poster-last-seen"><i class = "fa fa-eye"></i></span>
  <span class="poster-data" id = "poster-registered"><i class = "fa fa-user-plus"></i></span><br />
  <span id = "number_of_ads" class = "poster-profile-details"><?php getTotalAdsByPoster(); ?></span>
  <span id = "last_seen" class = "poster-profile-details" data-livestamp="<?php getLastSeen(); ?>"></span>
  <span id = "time_registered" class = "poster-profile-details" data-livestamp="<?php echo $poster_details['date_created']; ?>">
  </span>
  <?php
  if(postedByCurrentUser()){
    echo "<a href = '/profile' id = 'view_further_profile'>View your profile</a>";

  }
  else {

    echo "<a target = '_blank' href = '/user/{$ad_poster}' id = 'view_further_profile'>View full profile</a>";

  }
  ?>
   </div>

  </span>

     </div>

       <img id = "poster-profile-loader" src="<?php echo $img_dir."time-load.gif"?>" />


       </div>
  <div id = "first-container">



  <div id = "ad-photo-container" class = "ad-containers same-width">
    <?php  if(isSuspended()) { ?>
      <font id = "ad-canceled-div">
          Suspended
      </font>
    <?php } elseif (!isActive()) {?>
      <font id = "ad-canceled-div">
          Sold
      </font>
    <?php } ?>
    <span id = "photo-back" class="photo-shifter" data-current-image = "0">&#10094;</span>
    <span id = "photo-front" class = "photo-shifter" data-current-image = "0">&#10095;</span>
<div id="overlay" onmousemove="zoomIn(event)" onmouseleave = "hideZoom();"></div>
<img  src = "/<?php echo MY_IMAGES; ?>/<?php echo $ad_details['first_photo']; ?>" id = "ad-image" data-image = "<?php echo $ad_details['first_photo']; ?>"/>
<?php // onmousemove = "showZoom();" ?>

  </div>

  <?php
  $photos_from_database = $ad_details['photos'];
  $photos_array = explode( "," , $photos_from_database);
  for ($i = 0; $i <= count($photos_array) - 1; ++$i) {
   $plus = $i + 1;
   $image = MY_IMAGES;
    echo "<div class = 'small-ad-images' id = 'small-image-$plus' data-image-num = '$i' style  = \"background-image:url('/$image/$photos_array[$i]')\" data-current-image = '$photos_array[$i]'></div>";
  }

  ?>
  
            <span id = "description" class="same-width display_details">
               <?php echo htmlspecialchars($ad_details['description'] , ENT_QUOTES , "UTF-8"); ?>
            </span>
            <span id = "price" class="same-width display_details">
                <?php  if(strpos($ad_details['price'] , 'price')) { ?>

                  <b><?php echo htmlspecialchars($ad_details['price'] , ENT_QUOTES , "UTF-8"); ?></b>
              <?php   } else { ?>
<b>&#8358;<?php echo htmlspecialchars($ad_details['price'] , ENT_QUOTES , "UTF-8"); ?></b>

              <?php  }?>
            </span>


            <?php
            if($ad_details['negotiable'] == 'true'){

            echo '<span class = "same-width display_details" id = "negotiable">Negotiable <i class = "fa fa-check-circle" id = "check-negotiable-icon"></i></span>';
            }
            else {
              echo null;
            }
            if($ad_details['active'] == '1') {

              if(isSuspended() OR !isActive()) {
              $available_text = "Unavailable";
              $style = "style='color:#000;'";
              }
              else {
                $available_text = "Available";
                $style = '';
              }


              echo '<span class = "same-width display_details" id = "active">'.$available_text.' <i class = "fa fa-check-circle"'.$style.' id = "check-active-icon"></i></span>';

            }
            else {

                echo '<span class = "same-width display_details" id = "active">Unavailable <i class = "fa fa-check-circle" id = "check-active-icon-sold" ></i></span>';
            }
            ?>
            <span id = "total_views" class="same-width display_details">
              <i class = "fa fa-eye"></i> views       <b>
<?php  if(postedByCurrentUser()){

echo $ad_details['views'];
}

else {
  echo $ad_details['views'] + 1;
}

?>
                </b>      </span>
                <span id = "span-contact-details" class="same-width display_details" data-drop = "down"><font id = "show-text">show contact details</font> <i class = "fa fa-chevron-down" id = "up-or-down"></i></span>

                <div id = "contact-details-div" class = "same-width">
                <span id = "contact-details-fullname" class = "contact-details-text same-width">
<i class = "fa fa-user-circle" id = "name_details"></i><span id = "fullname" class = "contact-details">
<?php echo $poster_details['fullname']; ?>
</span>
                </span>
                <span id = "contact-details-email" class = "contact-details-text same-width">
                <i class = "fa fa-envelope" id = "details-email"></i> <span id = "email" class = "contact-details">
                <?php echo $poster_details['email']; ?>
                </span>
                </span>

                <span id = "contact-details-phone" class = "contact-details-text same-width info">
<i class =  "fa fa-whatsapp" id = "detail-call"></i> <span id = "phone" class = "contact-details">
<?php echo $poster_details['phone']; ?>
</span>
                </span>


                  </div>
                  </div>
                  <div id = "ad-tools-container" class = "ad-containers">
                    <font id = "first-tools-container">


                  <?php if(isLoggedInUser() || postedByCurrentUser()){



                  ?>
                  <button <?php if(isLikedByThisUser()){
                    echo "style ='background-color:rgb(64, 128, 255);'";
                  }?> title = "<?php if(isLikedByThisUser()) {
                    echo "disLike";
                  }else{
                    echo "Like";
                  }?>" <?php if(isSuspended()) {
                    echo "disabled='disabled'";
                  } ?> data-username = "<?php echo $current_user; ?>" data-id = "<?php echo $id;  ?>" id = "LikeOrDislike" data-action = "<?php if(isLikedByThisUser()){
                  echo "dislike";
                  }

                  else {
                    echo 'like';
                    } ?>"> <span class = "same-width" id = "num_likes">
                      <font id = "likeOrLikes">
                      <i class = "<?php if(!isLikedByThisUser()){
                        echo 'fa fa-thumbs-up';
                      }else {
                        echo 'fa fa-check';
                      } ?>" id = "like-icon">
                      </i>
                    </font><font id = "like-text">Like</font><font id = "number-of-likes">
                  <?php echo getNumLikes(); ?>
                   </font>

                    </span></button>
                    <button <?php if(isFavoritedByThisUser()){
                      echo "style ='background-color:rgb(64, 128, 255);'";
                    }?> title = "<?php if(isFavoritedByThisUser()) {
                      echo "unFavorite";
                    }else{
                      echo "Favorite";
                    }?>" data-username = "<?php echo $current_user; ?>" data-id = "<?php echo $id;  ?>" id = "FavoriteOrUnfavorite" data-action = "<?php if(isFavoritedByThisUser()){
                    echo "unfavorite";
                    }

                    else {
                      echo 'favorite';
                    } ?>"> <span class = "same-width" id = "number-of-favorites">
                        <font id = "FavoriteOrunfavorite">
                        <i class = "<?php if(!isFavoritedByThisUser()){
                          echo 'fa fa-star';
                        }else {
                          echo 'fa fa-check';
                        } ?>" id = "favorite-icon">
                        </i>
                      </font><font id = "favorite-text">Favorite</font><font id = "count-of-favorites">
                    <?php echo getNumFavorites(); ?>
                     </font>

                      </span></button>
                  <?php }  else {?>

                  <button <?php if(isSuspended()) {
                    echo "disabled='disabled'";
                  } ?> title = 'Login to like this Ad' disabled = "disabled"
                   id = "LikeOrDislike"><span class = "same-width" id = "num_likes">
                      <font id = "likeOrLikes">
                      <i class = "fa fa-thumbs-up" id = "like-icon">
                      </i>
                    </font><font id = "like-text">Likes</font><font id = "number-of-likes">
                  <?php echo getNumLikes(); ?>
                   </font>

                    </span></button>
                <button <?php if(isSuspended()) {
                  echo "disabled='disabled'";
                } ?> title = "Login to favorite this Ad" id = "FavoriteOrUnfavorite" disabled="disabled" > <span class = "same-width" id = "number-of-favorites">
                        <font id = "FavoriteOrunfavorite">
                        <i class = "fa fa-star" id = "favorite-icon">
                        </i>
                      </font><font id = "favorite-text">Favorites</font><font id = "count-of-favorites">
                    <?php echo getNumFavorites(); ?>
                     </font>

                      </span></button>

                  <?php }?>
                    </font>
                    <button <?php if(isSuspended()) {
                      echo "disabled='disabled'";
                    } ?> id = "send-message-hide-div" data-already-sent = "false" <?php if(postedByCurrentUser() || !isActive()) {
                      echo "disabled='disabled'";
                    } ?>>
                  <i class = "fa fa-envelope" id = "send-email-button-icon"></i> Send message
                </button><fieldset id = "form-field">

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

<textarea name = "message" id = "message-message"  class="text-inputs" placeholder="enter your message">Hello i really like your ad</textarea>
<span id = "message-message-warning" class = "message-warnings">Minimum of 20 characters</span>
<button name = "send-message-button" id = "send-message-button" data-username = "<?php
if(isset($_SESSION['user_details']) && !empty($_SESSION['user_details'])) {
  echo $_SESSION['user_details']['username'];
}

else {

  echo "none";
}

 ?>" data-id = "<?php echo $_GET['id']; ?>"data-to = "<?php echo $ad_poster; ?>"><font id = "message-send-text">Send</font><i
 class = "fa fa-sign-in" id = "send-message-icon"></i></button>
                    </form>  </fieldset>

                    <div id = "ad-warning">
                      <span id = "header-warning">Please read safety tips</span>
                      <span class = "warning-texts" id = "strong-ad-warning"><font class = "warning-dots">•</font>
                       NEVER PAY BEFORE PURCHASE

                      </span>
                      <span class = "warning-texts" id = "first-ad-warning"><font class = "warning-dots">•</font>
                       Meet at a safe, public place

                      </span>
                      <span class = "warning-texts" id = "second-ad-warning"><font class = "warning-dots">•</font>
                       Check the item BEFORE you buy it

                      </span>
                      <span class = "warning-texts" id = "second-ad-warning"><font class = "warning-dots">•</font>
                       Pay only after collecting the item

                      </span>
                    </div>
                    <?php
   if(isLoggedInUser()) { ?>

<div id = "flag-text">
<span id = "content-span">
If you think this ad contains inappropriate content(s) Like images, words , E.t.c You can flag it for upward review.


</span>
<button <?php if(!isActive()) {
  echo "disabled='disabled'";
} ?> id = "flag-button" data-username = "<?php

echo $_SESSION['user_details']['username'];
?>" data-id = "<?php
echo $_GET['id'];
?>" data-action = "<?php if(isFlaggedByThisUser()){
  echo "unflag";
} else {
  echo "flag";
}?>"><i class = "<?php
if(isFlaggedByThisUser()){
  echo 'fa fa-check';
}
else {
  echo 'fa fa-flag';
}
?>" id = "flag-icon"></i><font id = "flag-font-text">
Flag
</font><font id = "num-flags"><?php echo getNumFlags(); ?></font>
</button>
</div>


                  <?php } else {?>
                    <div id = "flag-text">
                    <span id = "content-span">
                    Ads that are believed to contain inappropriate contents are Flagged by registered users for review.


                    </span>
                    <button <?php if(isSuspended()) {
                      echo "disabled='disabled'";
                    } ?> id = "flag-button"   disabled = "disabled" data-id = "<?php
                    echo $_GET['id'];
                    ?>" ><i class = "fa fa-flag" id = "flag-icon"></i><font id = "flag-font-text">
                    Flags</font><font id = "num-flags"><?php echo getNumFlags(); ?></font>
                    </button>
                    </div>

                <?php  }

                if(!postedByCurrentUser()){
$conn_init = mysqli_init();
$database_connection = mysqli_real_connect($conn_init , HOST , USER , PASSWORD , DB);
$ad_category = $ad_details['category'];
$ad_time = $ad_details['time_created'];
 $ad_state = strtolower($poster_details['state']);
   $sql = "SELECT * FROM ads WHERE active = 1 AND activated = 1 AND category = '{$ad_category}' AND time_created != '{$ad_time}' ORDER BY time_updated DESC LIMIT  0 , 100";
   $query = mysqli_query($conn , $sql);
   $query_array = mysqli_fetch_all($query , MYSQLI_ASSOC);
   function getPosterDetails($username) {
    $conn = mysqli_init();
   if(mysqli_real_connect($conn , HOST  , USER , PASSWORD , DB));
    $sql = "SELECT * FROM users WHERE username = '{$username}'";
    if($query = mysqli_query($conn , $sql)) {
        $fetch_array = mysqli_fetch_assoc($query);
        return $fetch_array;
    }


}

function cutText($text , $length) {
  if(mb_strlen($text, "UTF-8") > $length) {
    $string = substr($text, 0 , $length);
return $string."...";
  }
  else {
    return $text;
  }
}

   if(!empty($query_array)){
$i =0;
$started = 0 ;
        foreach($query_array as $ad) {
            
            $id = $ad['ad_id'];
            $title = $ad['title'];
            $first_photo = $ad['first_photo'];
            $username = $ad['username'];
            $poster_data = getPosterDetails($ad['username']);
            $state = strtolower($poster_data['state']);
            $time_created = $ad['time_created'];
            $image = MY_IMAGES;
            $university = cutText($poster_data['institution'] , 40);
            $price = $ad['price'];

                 if($price != 'Contact for price') {
                    $price = "&#8358;".$price;
                 }
                 
        if ($state == $ad_state){
           $started += 1;
           if($started == 1) {

            echo "<span id = 'related-ads-span'>Related ads</span>";
           }
           else if($started == 4) {
            break;
           }
  echo   "<a onClick = 'window.location.href=\"/ad/$id\"' class = 'ad-user-links related-ads-link' href = '/ad/{$id}' title = '{$title}'><span
    class = 'image-ad-first related-image-first' style  = \"background-image:url('/{$image}/".$first_photo."')\"></span>
    <font class = 'ad-title'>".cut($title , 22)."</font>
<span class ='ad-universiity'>".cut($university)."</span>
    <span class = 'ad-price'>$price</span>

  </a>
  ";

        }
}


   }


}
                 ?>
                
                <?php  if(postedByCurrentUser()){ ?>
<button data-id = "<?php
echo $_GET['id'];
?>" title = "<?php  if(isActive()) {

echo "Deactivate this Ad";

}
else {
  echo "Activate this Ad";
}

?>" id = "activate-ad-button" <?php if(isSuspended()) {
  echo "disabled='disabled'";
} ?> data-action = "<?php  if(isActive()) {

echo "deactivate";

}
else {
  echo "activate";
}

?>"><?php  if(isActive()) {

echo "Close ad";

}
else {
  echo "Activate ad";
}

?></button>
 <button data-id = "<?php
echo $_GET['id'];  ?>" id = "renew-ad-button" title="Renew this ad" <?php if(isSuspended()) {
  echo "disabled='disabled'";
} ?>>Renew this ad</button>

<?php } ?>


                  </div>
                </div>
<abbr id = "photostorage" data-ad-images = "<?php echo $ad_details['photos']?>"
  data-first-photo = "<?php echo $ad_details['first_photo']?>"></abbr>

  <div id ="ad-image-displayer">
<i class="fa fa-circle-o-notch fa-spin image-loader"></i>
<div id = "cancel-large-image"><i class = "fa fa-remove" id = "remove-large-icon"></i></div>
<img src = "#" id = "ad-image-zoom" class = "ad-images" />


</div>


  <?php require_once("{$incs_dir}footer.php"); ?>

</body>
</html>
