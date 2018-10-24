<?php
session_start();
error_reporting(1);



?>
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
$page_description = "Snoott user privacy policy";
$page_keywords = "Snoott , User , Account , Settings , Session";


//$page_title = " ";
require_once($_SERVER['DOCUMENT_ROOT'].'/Web_Data/incs/site_data.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/Web_Data/incs/config.php');
$page_title = SITE_TITLE." ".$dot." Contact us";

require_once($incs_dir.'meta.php');

?>
    <link rel="stylesheet" type="text/css" href="<?php  echo $css_dir?>contact.css" />

    <link rel="stylesheet" type="text/css" href="<?php  echo $css_dir?>footer.css" />
     
    <?php



require_once("{$incs_dir}header_style.php");



    ?>

    
    </head>

    <body>
<?php
require_once("{$incs_dir}header.php");

  //  print_r($_SESSION['user_details']);

    ?>
<div id = "main-contact">
<div id = "contact-container" class = "contact-containers">
<span id = "contact-header">Contact Us</span>

<span class = "contact-text">To contact us by e-mail for non-support requests:

    <span id = "support-email">Support@Snoott.com</span>
Or through social networks below :)
</span>
</div>

<div id = "contact-container" class = "contact-containers">
<span id = "contact-header">Our Office</span>
<span class = "contact-text">Port Harcourt International Airport Omagwa, Rivers State, Nigeria.  
</span>
</div>
</div>
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


         <?php  require_once("{$incs_dir}footer.php");?>
    </body>
</html>
