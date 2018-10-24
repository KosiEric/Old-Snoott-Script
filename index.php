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
$page_title = SITE_TITLE." $dot free Classified Ads for Students";

require_once($incs_dir.'meta.php');

?>

<link rel="stylesheet" type="text/css" href="<?php echo $css_dir."footer.css"?>" />
<link rel="stylesheet" type="text/css" href="<?php echo $css_dir."home.css"?>" />

<link rel="stylesheet" type="text/css" href="<?php echo $css_dir."footer-ad.css"?>" />
<script type="text/javascript" language ="JavaScript" src="<?php  echo $js_dir?>search.js"></script>
 <script type="text/javascript" language ="JavaScript" src="<?php  echo $js_dir?>livestamp.js"></script>

 <script type="text/javascript" language ="JavaScript" src="<?php  echo $js_dir?>home.js"></script>
<style type="text/css">
    
    body {
        background-color: rgb(245, 248, 250);    

    }
    @media only screen and (max-width: 449px) {
#post-span {
    margin-bottom : 100px;
    margin-bottom: 0px;
}
}
</style>
<?php

require_once $incs_dir.'header_style.php';

?>
</head>
    <body>

<?php

require_once $incs_dir.'header.php';

?>
<?php

require_once $incs_dir.'search.php';

?>



<div id = "ads-main">
<div id = "ads-container">
<div id = "ads-home-text">Latest ads</div>

</div>
</div>

<span data-num-ads = "<?php  echo NUM_ADS; ?>" id = "first-loader-span"><i id = "first-loader" class = "fa fa-circle-o-notch fa-spin"></i></span>
<?php if(getTotalAds() > NUM_ADS) { ?>
<span id = "post-span" data-ad-last = "10"><i id = "post-loader" ></i> </span>
<span id = "empty-response">No data</span>
<span id = "confirm-load" data-loaded = "false"></span>
<?php } ?>
<?php

require_once $incs_dir.'footer-ad.php';
require_once $incs_dir.'footer.php';

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
