<?php
session_start();
error_reporting(0);



?>
<!DOCTYPE html>
<html lang="en-us" dir="ltr" contenteditable = "false">

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
$page_description = "Snoott user terms policy";
$page_keywords = "Snoott , User , Account , Settings , Session";


//$page_title = " ";
require_once($_SERVER['DOCUMENT_ROOT'].'/Web_Data/incs/site_data.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/Web_Data/incs/config.php');
$page_title = SITE_TITLE." • About us";

require_once($incs_dir.'meta.php');

?>
    <link rel="stylesheet" type="text/css" href="<?php  echo $css_dir?>about.css" />

    <link rel="stylesheet" type="text/css" href="<?php  echo $css_dir?>footer.css" />
    <?php



require_once("{$incs_dir}header_style.php");



    ?>
<style type = 'text/css'>
    a[href='#']{
        
        color : inherit;
        text-decoration : none;
    } 
</style>
    
    </head>

    <body>
<?php
require_once("{$incs_dir}header.php");

  //  print_r($_SESSION['user_details']);

    ?>

    <div id ="about-container">
<span id = "about-header">About Us</span>

<span class = "about-texts"> Snoott.com is Nigeria's fastest growing Classified ad site for Universities & Tertiary institutions. </span>
<span id = "line"></span>
<span class = "about-headers">FAQ</span>

<span class = "about-headers">Will Snoott show the identity of senders?</span>
   <span class = "about-texts"> Snoott will display the identity of registered users only.</span>
<span class = "about-headers">Is Snoott a hacker?!</span>
   <span class = "about-texts"> Snoott doesn't steal data but websites and apps impersonating Snoott could do that.</span>
<span class = "about-headers">Can Snoott visitors view my messages?</span>
  <span class = "about-texts">  They can't as long as you don't send messages to them.</span>
<span class = "about-headers">Is there a Snoott mobile app?</span>
    <span class = "about-texts">No,  the official Snoott app will soon be ready on Google Play and App Store</span>
<span class = "about-headers">Can I respond to messages?</span>
    <span class = "about-texts">You can respond to messages that are sent to you by registered users.</span> 
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


         <?php require_once("{$incs_dir}footer.php");?>
    </body>
</html>
