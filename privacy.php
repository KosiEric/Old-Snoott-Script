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
$page_description = "Snoott user privacy policy";
$page_keywords = "Snoott , User , Account , Settings , Session";


//$page_title = " ";
require_once($_SERVER['DOCUMENT_ROOT'].'/Web_Data/incs/site_data.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/Web_Data/incs/config.php');
$page_title = SITE_TITLE." $dot Privacy Policy";

require_once($incs_dir.'meta.php');

?>
    <link rel="stylesheet" type="text/css" href="<?php  echo $css_dir?>privacy.css" />

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

<div id = "privacy-policy-container">

<span id = "privacy-header">Privacy Policy</span>

<span class = "privacy-texts">We understand your fears and concerns regarding the privacy of your data on the internet. We have prepared this policy to help you understand the nature of the data we collect from your when visiting Snoott and how we use this personal data.</span>

<span class = "privacy-headers">Navigation</span>
<span class = "privacy-texts">
We didn't design this website to collect your personal data from your computer while browsing this site. But will only use the data you provided with you being aware and your personal desire.
</span>
<span class = "privacy-headers">IP</span>
<span class = "privacy-texts">
At any time you visit any website on the internet including this website, the hosting server will record your internet protocol (IP) and the date and time of your visit and the type of the browser that you use and the URL of any website which referred you to this site on the web and the website may record it for different purposes.</span>
<span class = "privacy-headers">Network Surveys</span>

<span class = "privacy-texts">The surveys that we conduct on our network allows us to collect specific data like the data collected from you regarding your view and feeling about our website. Your responses are of great concern and an area of appreciation as it helps us to improve our site and you have the full freedom and choice to provide data related to your name and other data.</span>
<span class = "privacy-headers">Links to External Sites</span>
<span class = "privacy-texts">
Our website may contain links to other sites in the internet or advertisements from other sites like Google AdSense and we are not considered responsible for the data collection methods of these websites. You can find the confidentiality policies and the content of these websites that can be accessed through any link on this site. We may be assisted by third party advertising companies for the reason of displaying ads when you visit our website. These companies have the right to use information about your visit to this website and other websites (excluding the name, address or email or phone). This is to provide ads about products or services that you care about.</span>
<span class = "privacy-headers">Disclosure of Information</span>
<span class = "privacy-texts">
We will always maintain your privacy and the confidentiality of your personal data that we get. We will never disclose the this information unless there is a law requirement or with good intention if we feel that this procedure is required or wanted to meet legal requirements. Or to defend or protect the ownership rights of this website or other parties benefiting from this site.</span>
<span class = "privacy-headers">Required Data to do the necessary procedures from your side</span>
<span class = "privacy-texts">
When we need any data from you. We will ask you for your consent. As this data will help us contact you and satisfy your orders whenever possible. We will never sell the data you provide to any third party as part of personal marketing without your prior and written consent unless t was a part of bulk data used for statistics and research and it won't contain any data to identify you.</span>
<span class = "privacy-headers">When Contacting Us</span>
<span class = "privacy-texts">
We will consider all data provided by you confidential. The forms on our network require data that can help us improve our site. We will use data provided by you to answer all of your questions, observations, or orders through this site or other sites belonging to this site.</span>
Disclosure of Information to Third Parties
<span class = "privacy-texts">
We will not sell, trade, rent or disclose any information to any third party out of this website or sites out of our network and we will only disclose information when ordered by a legal or organizational entity.</span>
<span class = "privacy-headers">Modification of Data Confidentiality and Privacy Policy</span>
<span class = "privacy-texts">
We have the right to modify the items and conditions of data confidentiality and privacy policy if needed and when adequate</span>
<span class = "privacy-headers">Contacting Us</span>
<span class = "privacy-texts">
You can contact us using the methods described in the "Contact Us" page</span>
<span class = "privacy-headers">Finally</span>

<span class = "privacy-texts">Your concerns and fears regarding data confidentiality and privacy is a highly valuable thing to us. We hope that we will address these concerns by this policy.</span>

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
