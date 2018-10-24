
<!DOCTYPE html>
<html lang="en-us" dir="ltr">

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
$page_description = "Sell your item on Snoott";
$page_keywords = "sell , Campus , Online , Best";


//$page_title = " ";

require_once($_SERVER['DOCUMENT_ROOT'].'/Web_Data/incs/site_data.php');

$page_title = 'Sell your item on Snoott';

require_once($_SERVER['DOCUMENT_ROOT'].'/Web_Data/incs/meta.php');

require_once($_SERVER['DOCUMENT_ROOT'].'/Web_Data/incs/config.php');

?>
    <link rel="stylesheet" type="text/css" href="<?php  echo $css_dir?>footer.css" />


    <?php



require_once($_SERVER['DOCUMENT_ROOT'].'/Web_Data/incs/header_style.php');



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


echo "<link rel= 'stylesheet' href = '{$css_dir}sell.css' type = 'text/css' />".PHP_EOL;
echo "<script type = 'text/JavaScript' src = '{$js_dir}sell.js' language = 'javascript'></script>";



    ?>
    <script type="text/javascript" language ="JavaScript" src="<?php  echo $js_dir?>timeago.js"></script>

    <script type="text/javascript" language ="JavaScript" src="<?php  echo $js_dir?>validation.js"></script>



    </head>

    <body>


         <?php


require_once($_SERVER['DOCUMENT_ROOT'].'/Web_Data/incs/header.php');


    ?>
    <div id = "ad-posted-alert">

          <i class = "fa fa-remove" id = "remove-alert-icon"></i>
 
    </div>

    <fieldset id ="form-field">

<form action="" method="post" enctype = "multipart/form-data" accept-charset="utf-8" id = "ad-form" name = "adpost-form">
  
<span id =  "opera-warning">Opera mini users are required to disable "Data Saving Mode"  or Switch to another browser  for better user experience.</span>
  <div id = "form-container" class="containers"><button id = "clear-fields">clear all fields</button>
    <!--Matt Bradley was born <span id="birth">on June 18, 1987</span>.-->
<!--<time class="timeago" datetime="Tue 12 Sep 2017 12:29:49 am" title="Tue 12 Sep 2017 12:29:49 am"></time>-->
<span id = "submit-ad-text">Submit your Ad</span>


<span class = "input-texts">Category<font class = "asterisk">*</font></span>
<select name = "category" id = "select-categories" class = "selects" onchange="changeSubCategoryList();">
      <option value = "" selected="selected">---Choose a category---</option>
      <option value = "Home&Furnitures">Home , Furniture</option>
      <option value = "Electronics&Video">Electronics & Video</option>
      <option value = "Phones&Tablets">Phones & Tablet</option>
      <option value = "laptops&computers">laptops & Computers</option>
      <option value = "fashion&clothes">Fashion & Clothes</option>
      <option value = "Books&Archive">Books & Archive</option>
      <option value = "Hostels&Lodges">Hostels & Lodges</option>
    </select>
<span class = "input-texts">Subcategory<font class = "asterisk">*</font></span>
<select name = "subCategory"  id = "select-subcategories" class = "selects" disabled="disabled">
  <option value="">-No category choosen--</option>
</select>
<div id = "hidden-div-content">
<span class = "input-texts">Title<font class = "asterisk">*</font></span>
<input class = "texts-inputs" id = "title-input" placeholder="Please write a clear title for your item" name="title"
value = '<?php if(isset($_SESSION['new_ad']) && !empty($_SESSION['new_ad']['title'])){
  echo $_SESSION['new_ad']['title'];
} ?>' />

<div class = "tool-tips" id = "title-tooltip">Field must be between 10 and 80 characters</div>

<span id = "num_text_remaining"><font id = "text-count">80</font> <font id = "char">characters</font> left</span>
<span class = "input-texts" id = "description-text" >Description<font class = "asterisk">*</font></span>
<textarea id = "description-box" name = "description" placeholder="Please provide a detailed description. you can mention as many details as possible. it will make your ad more attractive for buyers.">
<?php if(isset($_SESSION['new_ad']) && !empty($_SESSION['new_ad']['description'])){
  echo $_SESSION['new_ad']['description'];
}
else {
  echo null;
  } ?>
</textarea>

<div class = "tool-tips" id = "description-tooltip">Field must be between 50 and 10000 characters</div>
<span class = "input-texts" id = "price-text">Price<font class = "asterisk">*</font></span>
<input type="checkbox" id="contact-for-price" name="contact-for-price" <?php
if(isset($_SESSION['new_ad']) && !empty($_SESSION['new_ad']['price']) && stripos($_SESSION['new_ad']['price'] , 'price') > 2){
echo 'checked="checked"';
}
?> />

    <label for="contact-for-price" id = "contact-for-price-label">Contact for price</label>
<span id = "price-container"><div id = "price-div"><button id = "currency">&#8358;</button>
  <input type = "text" name = "price" id = "amount" placeholder="Enter price" autocomplete = "off" value = "<?php
  if(isset($_SESSION['new_ad']) && !empty($_SESSION['new_ad']['price']) && !stripos($_SESSION['new_ad']['price'] , 'price')){
  $price_replaced = (int)str_replace("," , "" , $_SESSION['new_ad']['price']);
  echo $price_replaced;
  }
  else {
    echo null;
  }
  ?>" /></div>

<input type="checkbox" id="negotiable"  name = "negotiable" checked>
    <label for="negotiable" id = "negotiable-label">Negotiable</label>
  <span id = "price-value">Price : <b>&#8358;</b><font id = "price-string"><?php
  if(isset($_SESSION['new_ad']) && !empty($_SESSION['new_ad']['price']) && !stripos($_SESSION['new_ad']['price'] , 'price')){
  $price = $_SESSION['new_ad']['price'];
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
<span id = "form-photos-text">Photos</span>
<span id = "text-about-photos"><font id = "bolded-photo-texts">Adding photos to your ads will attract 5X more clients.</font>
  Accepted formats are .jpg, .gif and .png. Max allowed size for uploaded files is 5 MB.
  Photos with contact details are not permitted.</span>

    <div class = "tool-tips" id = "image-tooltip">first image size exceeds 5mb</div>
  <input type = "file" name = "image1" name = "file[]" id = "image1" class = "imageFiles" accept="image/jpeg,image/gif,image/png" />
  <label for = "image1" class = "image-labels" id = "image1-label">
    <i class="fa fa-camera label-camera" id = "image1-camera"></i>
  </label>
  <input type = "file" name = "image2" id = "image2" name = "file[]" class = "imageFiles" accept="image/jpeg,image/gif,image/png" />
  <label for = "image2" class = "image-labels" id = "image2-label">
    <i id = "image2-camera" class="fa fa-camera label-camera"></i>

  </label>
  <input type = "file" name = "image3" id = "image3" class = "imageFiles" name = "file[]"  accept="image/jpeg,image/gif,image/png"/>
  <label for = "image3" class = "image-labels" id = "image3-label">
    <i class="fa fa-camera label-camera" id = "image3-camera"></i>

  </label>
  <?php  /*
  <input type = "file" name = "image4" id = "image4" class = "imageFiles"  name = "file[]" accept="image/jpeg,image/gif,image/png"/>
  <label for = "image4" class = "image-labels" id = "image4-label">
    <i class="fa fa-camera label-camera" id = "image4-camera"></i>

  </label>
  <input type = "file" name = "image5" id = "image5" class = "imageFiles" name = "file[]"  accept="image/jpeg,image/gif,image/png"/>
  <label for = "image5" class = "image-labels" id = "image5-label">
    <i class="fa fa-camera label-camera" id = "image5-camera"></i>

  </label>
*/ ?>
  <span id = "picture-warning">First picture is the display picture, <font id = "image-note">Note also that images cannot be changed later</font></span>

</div>

<div id = "contact-container" class="containers">
  <span id = "form-contact-text">Contact information for your  ad</span>
  <span id = "text-about-contact">The contact details you provided in your account settings will be used.

  </span>
  <span id ="raw-response">
    <?php
$image = MY_IMAGES;
define('UPLOAD_FOLDER' , $_SERVER['DOCUMENT_ROOT']."/$image/" , false);
ob_start();

if(!isset($_SESSION['user_details'])){
    $report_array =  "Login session expired";
    echo $report_array;

}
class createAd {


     public $ID;
     public $category;
     public $subCategory;
     public $title;
     public $price;
     public $negotiable;
     public $description;

    public function isReady () {
      if(!empty($_SESSION['new_ad'])){
foreach ($_SESSION['new_ad'] as $post) {

  if(!isset($post) OR  empty($post)){
    return false;
  }
  else {
    foreach ($_FILES as $file) {
      if(!isset($file) OR empty($file)){

        return false;
      }

      else {
        return true;
      }
    }
  }
}

}
else {
  return false;
}
}

public function generateID () {

  $letters = Array("A" , "B" , "C" , "D" , "E" , "F" , "G" , "H" ,  "I" , "J" , "K" ,"L" ,"M" ,"N" ,"O" ,"P" ,"Q" ,"R" ,"S" , "T" ,
"U" ,"V" ,"W" ,"X" ,"Y" ,"Z" ,"a" ,"b" ,"c" ,"d" ,"e" ,"f" ,"g" ,"h" ,"i" ,"j" ,"k" ,"l" ,"m" ,"n" ,"o" ,
"p" ,"q" ,"r" ,"s" ,"t" ,"u" ,"v" ,"w" ,"x" ,"y" ,"z" ,"0" ,"1" ,"2" ,"3" ,"4" ,"5" ,"6" ,"7" ,"8"
, "9" , "-" , "_");

$random_string = "";
$string_length = count($letters);
for($i = 0; $i < 15; $i++) {
$random_string.= $letters[rand(0 , $string_length-1)];

}

return $random_string;
}

public function setValues () {
  $this->category = $_SESSION['new_ad']['category'];
  $this->subCategory = $_SESSION['new_ad']['subCategory'];
  $this->title = strip_tags(ucfirst($_SESSION['new_ad']['title']));
  $this->description = strip_tags(ucfirst($_SESSION['new_ad']['description']));
$this->price = $_SESSION['new_ad']['price'];
$this->negotiable = $_SESSION['new_ad']['negotiable'];
  return true;


}
public function  isToken () {

   $token = $this->generateID();
    $this->ID = $token;
    //return ($token == $this->token);
    $conn = mysqli_init();
$user = $_SESSION['user_details']['username'];
    if(mysqli_real_connect ($conn , HOST , USER , PASSWORD , DB )){

        $query = "SELECT ad_id FROM ads WHERE ad_id = '{$token}'";
        if($run = mysqli_query($conn , $query)) {

            $num_rows = mysqli_num_rows($run);

            if($num_rows == 0){
                 return true;

            }

            else {

                $this->isToken();

            }
        }
    }

}
private function getExtension ($filename) {
  $lastIndexOfDot = strrpos($filename, '.');
  $extension = substr($filename, $lastIndexOfDot);
  return $extension;
}

public function getDatabaseImages() {
$image_string = "";
$i = 0;
  foreach($_FILES as $file => $key){
  $i = $i + 1;
  if($i < 3){
    $image_string.=$this->ID.'_photo'.$i.$this->getExtension($key['name']).',';
  }
else {
  $image_string.=$this->ID.'_photo'.$i.$this->getExtension($key['name']);

}

}
  return $image_string;

}
public function getFirstImage () {
    $image_string = "";
$i = 0;
  foreach($_FILES as $file => $key){
  $i = $i + 1;
  if($i == 1){
    $image_string.=$this->ID.'_photo'.$i.$this->getExtension($key['name']);
    break;
  }

}
  return $image_string;

}

private function insertToDatabase () {
  $date_stamp = date('h:i:s a');
  $today = date('D d M Y');
  $now = $today.' '.$date_stamp;
  $time = time();
  $ad_id = $this->ID;
  $username = $_SESSION['user_details']['username'];
  $category = $this->category;
  $subCategory = $this->subCategory;
  $active = 1;
  $activated = 1;
  $first_image = $this->getFirstImage();
  $photos = $this->getDatabaseImages();
  $conn = mysqli_init();
  if(mysqli_real_connect($conn , HOST , USER , PASSWORD , DB)){
  $title = mysqli_real_escape_string($conn , $this->title);
  $description = mysqli_real_escape_string($conn , $this->description);
  $price = mysqli_real_escape_string($conn , $this->price);
  $negotiable  = mysqli_real_escape_string($conn , $this->negotiable);

  $sql = "INSERT INTO ads(`ad_id` , `views` ,`username` , `date_created` , `time_created` , `date_updated` , `time_updated` , `category` ,
  `subcategory` , `title` , `description` , `price` , `negotiable` , `first_photo` ,  `photos` , `active` , `activated`) VALUES
  ('{$ad_id}' , '0' , '{$username}' , '{$now}' , '{$time}' , '{$now}' , '{$time}' , '{$category}' , '{$subCategory}' , '{$title}'
    , '{$description}' , '{$price}' , '{$negotiable}' , '{$first_image}' , '{$photos}' , '{$active}' , '{$activated}')";
    if($query = mysqli_query($conn , $sql)){
      return true;
    }

    else {
      return false;
    }

  }


}



private function changePhotoName($i , $filename){
$image_string = "";
$image_string.=$this->ID.'_photo'.$i.$this->getExtension($filename);
return $image_string;
}

public function isFileSize ($filesize , $size){

  if($filesize > $size){

    return false;
  }

  else {

    return true;
  }


}

public function isFileType ($filename , $type){
$image_array = Array ("png" , "jpg" , "jpeg");
$video_array = Array("mp4" , "3gp");
$target_dir = UPLOAD_FOLDER;
$target_file = $target_dir . basename($filename);
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
if(strtolower($type) == 'image'){

  if(in_array($imageFileType , $image_array)){

return true;
  }

  else {

    return false;
  }


}

elseif (strtolower($type) == 'video'){

  if(in_array($imageFileType , $video_array)){

    return true;
  }
  else {

    return false;
  }
}
}

private function uploadFile($i ,  $filename , $tmp_name){
$filename = $this->changePhotoName($i , $filename);
$dir = UPLOAD_FOLDER.$filename;

if(move_uploaded_file($tmp_name , $dir)){
//rename(PROFILE_FOLDER.$file['name'], PROFILE_FOLDER.$profile)
return true;
}

else {

  return false;
}

}

private function  isImage ($tmp_name) {

  $image_size = getimagesize($tmp_name);
  if($image_size !== false){

return true;
  }

  else {

    return false;
  }
}

public function check () {

  foreach ($_FILES as $file=> $key) {
  print_r($key['name']);
  }
}


public function Processor () {

if($this->isReady()){
  if($this->setValues()){
    if($this->isToken()){
      $i = 0;
      $uploaded = false;
      foreach($_FILES as $file => $key) {
$i = $i + 1;
if($this->isImage($key['tmp_name'])) {
  if($this->isFileType($key['name'] , 'image')){
    if($this->isFileSize($key['size'], 5120000)){
      $filename = $this->changePhotoName($i , $key['name']);
  $dir = UPLOAD_FOLDER.$filename;

if(move_uploaded_file($key['tmp_name'] , $dir)){

  if($i == 3){
    if($this->insertToDatabase()){
      $_SESSION['new_ad'] = null;
    return '<meta http-equiv="refresh" content="2;/profile">' ;

    }

    else {
      return 'Server failed to respond' ;

    }
    }
}
else {
  $uploaded = false;
  return "Photo {$i} failed to upload";


  }
  }
  else {

    return  "photo {$i} exceed max 5mb.";

  }
  }

  else {

    return "photo {$i} is not an image";


  }
}

else {
  return  "photo {$i} is not an image";


}
      }
    }
  }
}

}

}



$createAd = new createAd;
echo $createAd->Processor();

    ?>


  </span>
  </div>

</div>
<button id = "submit-button">
Post my ad
</button>
</form>
</fieldset>


 <?php


require_once($_SERVER['DOCUMENT_ROOT'].'/Web_Data/incs/footer.php');


    ?>

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
