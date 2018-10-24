<?php

session_start();


if (!isset($_SESSION['search_text'])){


require_once 'index.php';

} else if (isset($_SESSION['search_text']) && isset($_SESSION['empty_result'])) {?>


<!DOCTYPE html>
  <html lang = 'en-us' dir = "ltr">
<head>

  <?php
    $page_description = "Snoott Search results";
  $page_keywords = "Snoott , Classified ad";

  //$page_title = " ";
  require_once($_SERVER['DOCUMENT_ROOT'].'/Web_Data/incs/site_data.php');
  $page_title = "Snoott • search results for ".$_SESSION['original_text'];

  require_once($incs_dir.'meta.php');

  ?>
  <link rel="stylesheet" type="text/css" href="<?php echo $css_dir."footer.css"?>" />
  <link rel="stylesheet" type="text/css" href="<?php echo $css_dir."home.css"?>" />
 <link rel="stylesheet" type="text/css" href="<?php echo $css_dir."search-result.css"?>" />


  <script type="text/javascript" language ="JavaScript" src="<?php  echo $js_dir?>search.js"></script>
  <script type="text/javascript" language ="JavaScript" src="<?php  echo $js_dir?>livestamp.js"></script>
<?php if (isset($_SESSION['search_text']) && $_SESSION['empty_result'] == 'false') { ?>
<script type="text/javascript" language ="JavaScript" src="<?php  echo $js_dir?>load_search.js"></script>

<?php  } ?>
    <?php

  require_once $incs_dir.'header_style.php';

  ?>

  <style type="text/css">

    body {
background-color: rgb(245, 248, 250);

}

  </style>
  </head>
  <body>

  <?php

  require_once $incs_dir.'header.php';
  require_once $incs_dir.'search.php';
function getTotalCategoryAds ($category) {
    global $conn;
    $text = $_SESSION['search_text'];
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

  <?php if (isset($_SESSION['search_text']) && $_SESSION['empty_result'] == 'true') { ?>

  <div id = "empty-result-div">Sorry, no results found for <span id = "search-result-text">"<?php  echo $_SESSION['search_text']; ?>"</span>
     in <span id = "search-result-state"><?php  echo $_SESSION['main_state']; ?></span></div>

  <?php } else { ?>

    <div id = "ads-main">
    <div id = "ads-container">

<div id = "ads-home-text">Search results for "<?php  echo $_SESSION['original_text'];?>" in <?php  echo $_SESSION['main_state'];?></div>



    </div></div>
<span id = "first-search-loader" data-start = "0" data-num-ads = "<?php echo NUM_ADS; ?>" data-state = "<?php echo $_SESSION['main_state'] ?>" data-text = "<?php  echo $_SESSION['original_text'] ?>"><i class = "fa fa-circle-o-notch fa-spin" data-loaded = "true"></i></span>

<?php  }?>




  <?php  } ?>


  <?php

  require_once $incs_dir.'footer.php';

  ?>
</body>
</html>
