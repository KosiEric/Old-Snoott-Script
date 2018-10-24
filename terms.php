<?php
session_start();
error_reporting(0);



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
$page_description = "Snoott user terms policy";
$page_keywords = "Snoott , User , Account , Settings , Session";


//$page_title = " ";
require_once($_SERVER['DOCUMENT_ROOT'].'/Web_Data/incs/site_data.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/Web_Data/incs/config.php');
$page_title = SITE_TITLE." $dot Terms & Conditions";

require_once($incs_dir.'meta.php');

?>
    <link rel="stylesheet" type="text/css" href="<?php  echo $css_dir?>terms.css" />

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

<div id = "terms-policy-container">

<span id = "terms-header">Terms of usage</span>

<span class = "terms-texts">All users must comply with the terms and conditions on this page </span>

<span class = "terms-headers">Public Use</span>
<span class = "terms-texts">
All users should commit to ethics and values and should refrain from insult and abuse of the site. </span>
<span class = "terms-headers">Privacy Policy</span>
<span class = "terms-texts">
All users have to read the privacy policy linked to in the footer and their use of the website implicates agreement to the policy. </span>
<span class = "terms-headers">Denial of Access</span>

<span class = "terms-texts">Snoott has the right to block any user from accessing the website or using it's services in general. </span>
<span class = "terms-headers">Impersonation</span>
<span class = "terms-texts">
Impersonation by name or subdomain is not allowed and Snoott has the right to take adequate actions. </span>
<span class = "terms-headers">Inactive Accounts</span>
<span class = "terms-texts">
Snoott has the right to remove inactive accounts under the duration that Snoott sees adequate. </span>
<span class = "terms-headers">Removal of Messages and Accounts</span>
<span class = "terms-texts">
Snoott has the right to remove any message or account with the justification that the website management sees adequate. </span>
<span class = "terms-headers">Information</span>
<span class = "terms-texts">
Snoott has the right to use the information input by users with agreement to the privacy policies. 

<span class = "terms-headers">E-mail</span>
<span class = "terms-texts">
Snoott has the right to e-mail users with what Snoott sees adequate with the option to unsubscribe from notification e-mails 
<span class = "terms-headers">Modifications of Terms and Conditions</span>
<span class = "terms-texts">
We have the right to modify terms and conditions if needed and whenever adequate </span>
<span class = "terms-headers">Limits of Responsibility</span>

<span class = "terms-texts">All communicated content on the website is the responsibility of their owners and Snoott is not responsible for its content or any damage that could result from this content or the use of any of the site's services. </span>
<span class = "terms-headers">Contact us</span>

<span class = "terms-texts">You can contact us using the "Contact Us" page.  </span>

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
