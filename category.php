<?php  
error_reporting(false);
$category_array = Array ("Home&Furnitures" , "Electronics&Video" , "Phones&Tablets" , "laptops&computers" , "fashion&clothes" ,"Books&Archive" , "Hostels&Lodges");

if(isset($_GET['token'])) {
    $token = $_GET['token'];
    $str_rep = str_replace("_" , "&", $token);
    $real_name = str_replace("_" , " & ", $token);
    if(!in_array($str_rep ,  $category_array , false)){
       
      require_once $_SERVER['DOCUMENT_ROOT'].'/index.php';  
    } else { $category = $str_rep; ?>

<?php session_start(); ?>
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
$page_description = "Snoott HomePage";
$page_keywords = "Snoott , Random images , Quotes and Videos";

//$page_title = " ";
require_once($_SERVER['DOCUMENT_ROOT'].'/Web_Data/incs/site_data.php');
$page_title = "Snoott • ".$real_name;

require_once($incs_dir.'meta.php');

?>

<link rel="stylesheet" type="text/css" href="<?php echo $css_dir."footer.css"?>" />
<link rel="stylesheet" type="text/css" href="<?php echo $css_dir."home.css"?>" />
<style type="text/css">
    #no-data {
        display: none;
    }

</style>
<script type="text/javascript" language ="JavaScript" src="<?php  echo $js_dir?>search.js"></script>
 <script type="text/javascript" language ="JavaScript" src="<?php  echo $js_dir?>livestamp.js"></script>

 <script type="text/javascript" language ="JavaScript" src="<?php  echo $js_dir?>category.js"></script>
<?php

require_once $incs_dir.'header_style.php';

?>
</head>
    <body>

<?php

require_once $incs_dir.'header.php';

?>
<?php
$conn = mysqli_init();
require_once $incs_dir.'search.php';

?>



<div id = "ads-main">
<div id = "ads-container">
<div id = "ads-home-text">Ads in <?php echo $real_name;?></div>
<div id = "filter-container"><span id = "select-statement"> Select ad region</span>
<select class ="search-boxes category-filter" id ="search-filter" onchange="checkDropDown()" class="search-regions">
            
               <option value="" selected="selected">State or Region</option>
                                <option value="Abia">Abia state</option>
     <option value="Abuja">F.C.T Abuja</option>
                <option value="Adamawa" class="options">Adamawa state</option>
                <option value="Anambra" class="options">Anambra state</option>
                <option value="Akwa Ibom" class="options">Akwa Ibom state</option>
                <option value="Bauchi" class="options">Bauchi state</option>
                <option value="Bayelsa" class="options">Bayelsa state</option>
                <option value="Benue" class="options">Benue state</option>
                <option value="Borno" class="options">Borno state</option>
                <option value="Cross River" class="options">Cross River state</option>
                <option value="Delta" class="options">Delta state</option>
                <option value ="Ebonyi" class="options">Ebonyi state</option>
                <option value="Edo" class="options">Edo state</option>
                <option value="Ekiti" class="options">Ekiti state</option>
                <option value="Enugu" class="optionst">Enugu state</option>
                <option value="Gombe" class="options">Gombe state</option>
                <option value="Imo" class="options">Imo state</option>
                <option value="Jigawa" class="options">Jigawa state</option>
                 <option value="Kaduna" class="options">Kaduna state</option>
<option value="Kano" class="options">Kano state</option>
<option value="Katsina"  class="options">Katsina state</option>
<option value="Kebbi" class="options">Kebbi state</option>
<option value="Kogi" class="options">Kogi state</option>
<option value="Kwara" class="options">Kwara state</option>
<option value="Lagos" class="options">Lagos state</option>
<option value="Nassarawa" class="options">Nassarawa state</option>
<option value="Niger" class="options">Niger state</option>
<option value="Ogun" class="options">Ogun state</option>
<option value="Ondo" class="options">Ondo state</option>
<option value="Osun" class="options">Osun state</option>
<option value="Oyo" class="options">Oyo state</option>
<option value="Plateau" class="options">Plateau state</option>
<option value="Rivers" class="options">Rivers state</option>
<option value="Sokoto" class="options">Sokoto state</option>
<option value="Taraba" class="options">Taraba state</option>
<option value="Yobe" class="osptions">Yobe state</option>
<option value="Zamfara" class="options">Zamfara state</option>        
            </select>

</div>
<?php  
function getTotalCategoryAds ($category) {
    global $conn;
if(mysqli_real_connect($conn , DB_HOST , USERNAME , PASS , DATABASE)) {
    $category = mysqli_real_escape_string($conn, $category);
     $sql = "SELECT COUNT('ad_id') FROM ads WHERE category = '{$category}'";
        if($query = mysqli_query($conn , $sql)) {
        $result_array = mysqli_fetch_all($query , MYSQLI_NUM);
        return $result_array[0][0];

        }
}
}

?>
</div>
</div>

<span data-num-ads = "<?php  echo NUM_ADS; ?>" data-category = "<?php echo $category; ?>" id = "first-loader-span"> <i id = "first-loader" class = "fa fa-circle-o-notch fa-spin"></i></span>
<span id = "no-data">No results found</span>
<?php if(getTotalCategoryAds($category) > NUM_ADS) { ?>
<span data-category = '<?php echo $category; ?>' data-state = "*" id = "post-span" data-ad-last = "10"><i id = "post-loader" ></i> </span>
<span id = "confirm-load" loaded = "false"></span>

<?php } ?>
<?php

require_once $incs_dir.'footer.php';

?>


    </body>
</html>


<?php } } ?>