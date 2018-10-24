<?php
mb_internal_encoding("utf-8");
session_start();
$GLOBALS['result'] = null;
if(isset($_SESSION['user_details'])) {
  if(isset($_GET['id']) && mb_strlen($_GET['id']) == 15){
require_once($_SERVER['DOCUMENT_ROOT'].'/Web_Data/incs/config.php');
$conn = mysqli_init();

if(mysqli_real_connect($conn , HOST , USER , PASSWORD , DB)){
   $id = mysqli_real_escape_string($conn , $_GET['id']);
  $sql = "SELECT * FROM ads WHERE ad_id = '{$id}'";
  if($query = mysqli_query($conn , $sql)){

    $ad_details = mysqli_fetch_assoc($query);
    if(empty($ad_details)){
      $globals['result'] = false;
    }
    else if(strtolower($_SESSION['user_details']['username']) == strtolower($ad_details['username'])){
$GLOBALS['result'] = true;


    }
    else {

      $GLOBALS['result'] = false;
      header('Location:/404');
    }
  }
}

else {
  exit("Database connection failed");
}

  }

  else {

    $GLOBALS['result'] = false;
    header("Location:/404");
  }

}

else {
$GLOBALS['result'] = false;
header("Location:/failed");
  }


?>

<!DOCTYPE html>
<html lang="en-us" dir="ltr">

<head>
    <?php
$page_description = "Sell your item on Snoott";
$page_keywords = "sell , Campus , Online , Best";


//$page_title = " ";

require_once($_SERVER['DOCUMENT_ROOT']."/Web_Data/incs/site_data.php");

$page_title = 'Snoott • Edit ad';

require_once("{$incs_dir}/meta.php");

require_once("{$incs_dir}/config.php");

?>
    <link rel="stylesheet" type="text/css" href="<?php  echo $css_dir?>footer.css" />


    <?php



require_once("{$incs_dir}/header_style.php");



    ?>
<style type="text/css">

  body {
  background-color: #f5f8fa;
  }
</style>
    <script type="text/javascript" language ="JavaScript" src="<?php  echo $js_dir?>jquery.js"></script>

    <script type="text/javascript" language ="JavaScript" src="<?php  echo $js_dir?>moment.js"></script>


    <script type="text/javascript" language ="JavaScript" src="<?php  echo $js_dir?>livestamp.js"></script>


 <?php


echo "<link rel= 'stylesheet' href = '{$css_dir}edit-ad.css' type = 'text/css' />".PHP_EOL;
echo "<script type = 'text/JavaScript' src = '{$js_dir}edit-ad.js' language = 'javascript'></script>";



    ?>
    <script type="text/javascript" language ="JavaScript" src="<?php  echo $js_dir?>timeago.js"></script>

    <script type="text/javascript" language ="JavaScript" src="<?php  echo $js_dir?>validation.js"></script>



    </head>

    <body>


         <?php


require_once("{$incs_dir}/header.php");


    ?>
    <div id = "ad-posted-alert">

          <i class = "fa fa-remove" id = "remove-alert-icon"></i>

    </div>

    <div id ="ad-image-displayer">
<i class="fa fa-circle-o-notch fa-spin image-loader"></i>
<div id = "cancel-large-image"><i class = "fa fa-remove" id = "remove-large-icon"></i></div>
<img src = "#" id = "ad-image" class = "ad-images" src = "#"  />

    </div>

    <fieldset id ="form-field">
  
<span id =  "opera-warning">Opera mini users are required to disable "Data Saving Mode"  or Switch to another browser  for better user experience.</span>
<form action="" method="post" enctype = "application/x-www-form-urlencoded" accept-charset="utf-8" id = "ad-form">
  <div id = "form-container" class="containers">
<?php //print_r($ad_details); ?>
    <!--Matt Bradley was born <span id="birth">on June 18, 1987</span>.-->
<!--<time class="timeago" datetime="Tue 12 Sep 2017 12:29:49 am" title="Tue 12 Sep 2017 12:29:49 am"></time>-->
<span id = "submit-ad-text">Edit your Ad</span>
<button id = "clear-fields">clear all fields</button>

<span class = "input-texts">Category<font class = "asterisk">*</font></span>
<select name = "category" id = "select-categories" class = "selects"  disabled="disabled">
      <option value = "<?php
       $value =  $ad_details['category'];
      $replaced_value = str_ireplace("&" , " & " , $value);
      echo $replaced_value; ?>" selected="selected" ><?php echo $replaced_value; ?></option>

    </select>
<span class = "input-texts">Subcategory<font class = "asterisk">*</font></span>
<select name = "subCategory"  id = "select-subcategories" class = "selects" disabled="disabled">
  <option value="<?php
       $value =  $ad_details['subcategory'];
      $replaced_value = str_ireplace("&" , " & " , $value);
      echo $replaced_value; ?>" ><?php echo $replaced_value; ?></option>
</select>
<div id = "hidden-div-content">
<span class = "input-texts">Title<font class = "asterisk">*</font></span>
<input class = "texts-inputs clearables"  id = "title-input" placeholder="Please write a clear title for your item"
value="<?php echo $ad_details['title']; ?>" type="text" />

<div class = "tool-tips" id = "title-tooltip">Field must be between 10 and 80 characters</div>

<span id = "num_text_remaining"><font id = "text-count">80</font> <font id = "char">characters</font> left</span>
<span class = "input-texts" id = "description-text" >Description<font class = "asterisk">*</font></span>
<textarea id = "description-box" class = "clearables" name = "description" placeholder="Please provide a detailed description. you can mention as many details as possible. it will make your ad more attractive for buyers.">
<?php echo $ad_details['description']; ?></textarea>

<div class = "tool-tips" id = "description-tooltip">Field must be between 50 and 10000 characters</div>
<span class = "input-texts" id = "price-text">Price<font class = "asterisk">*</font></span>
<input type="checkbox" id="contact-for-price"  <?php
if(stripos($ad_details['price'] , 'for') > 2){
echo 'checked="checked"';
}
?> />

    <label for="contact-for-price" id = "contact-for-price-label">Contact for price</label>
<span id = "price-container"><div id = "price-div"><button id = "currency">&#8358;</button>
  <input type = "text" name = "price" id = "amount" placeholder="Enter price" autocomplete="off" value = "<?php
  if(!stripos($ad_details['price'] , 'price')){
  $price_replaced = (int)str_replace("," , "" , $ad_details['price']);
  echo $price_replaced;
  }
  else {
    echo null;
  }
  ?>" /></div>

<input type="checkbox" id="negotiable"  name = "negotiable" <?php if($ad_details['negotiable'] == 'true'){
echo "checked='checked'";

}?>>
    <label for="negotiable" id = "negotiable-label">Negotiable</label>
  <span id = "price-value">Price : <b>&#8358;</b><font id = "price-string"><?php
  if(!stripos($ad_details['price'] , 'price')){
  $price = $ad_details['price'];
  echo $price;
  }
  else {
    echo null;
  }
  ?></font></span></span>
  <div class = "tool-tips" id = "price-tooltip">Only numbers are allowed</div>

</div>
</div>
<div class="containers" id = "photo-containers">
  <div id = "progress-bar">
    <div id ="progress-bar-inside">

    </div>
    <span id = "progress-reader"></span>
  </div>
  <?php

$ad_photos = explode("," , $ad_details['photos']);

  ?>
<span id = "form-photos-text">Photos</span>
<span id = "text-about-photos"><font id = "bolded-photo-texts">Note that your photos cannot be changed</font>
  These photos ensures that your ad gets to Front page easily.</span>

    <div class = "tool-tips" id = "image-tooltip">first image size exceeds 5mb</div>
  <label for = "#" class = "image-labels" id = "image1-label" style ="background-image:url('/<?php echo my_images; ?>/<?php echo $ad_photos[0]; ?>')">
    </label>
    <label style ="background-image:url('/<?php echo my_images; ?>/<?php echo $ad_photos[1]; ?>')" for = "#" class = "image-labels" id = "image2-label">

  </label>
  <label for = "#" class = "image-labels" id = "image3-label" style ="background-image:url('/<?php echo my_images; ?>/<?php echo $ad_photos[2]; ?>')">

  </label>

  <span id = "picture-warning">First picture remains the  title picture, <font id = "image-note">Note also that images cannot be changed later</font></span>

</div>

<div id = "contact-container" class="containers">
  <span id = "form-contact-text">Contact information for your  ad</span>
  <span id = "text-about-contact">The contact details you provided in your account settings will be used.

  </span>
  <span id ="raw-response">



  </span>
  </div>

</div>
<button id = "submit-button" data-ad_id = "<?php echo $ad_details['ad_id'];?>">
Edit my ad
</button>
</form>
</fieldset>


 <?php


require_once("{$incs_dir}/footer.php");


    ?>


    </body>
</html>
