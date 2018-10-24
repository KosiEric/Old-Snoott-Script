<?php session_start();
if(isset($_SESSION['user_details'])) {
  header('Location:/logout');
}

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
$page_description = "Login And Registration Page";
$page_keywords = "Login , Registration , User , Account , Verification ";


//$page_title = " ";
require_once($_SERVER['DOCUMENT_ROOT'].'/Web_Data/incs/site_data.php');
$page_title = SITE_TITLE." User account";

require_once($incs_dir.'meta.php');

?>
    <link rel="stylesheet" type="text/css" href="<?php  echo $css_dir?>account.css" />
 
    <link rel="stylesheet" type="text/css" href="<?php  echo $css_dir?>footer.css" />
     <?php  
    

require_once("{$incs_dir}header_style.php");
    
    
    
    ?>

    <script type="text/javascript" language ="JavaScript" src="<?php  echo $js_dir?>snoott.js">

</script>

<script type="text/javascript" language ="JavaScript" src="<?php  echo $js_dir?>functions.js">

</script>
    
<script type="text/javascript" language ="JavaScript" src="<?php  echo $js_dir?>switch_account_type.js">

</script>   
    <link rel="stylesheet" type="text/css" href="<?php  echo $css_dir?>login.css" />
      <link rel="stylesheet" type="text/css" href="<?php  echo $css_dir?>signup.css" />
    <script  type="text/javascript" language ="JavaScript" src="<?php  echo $js_dir?>account.js">

    </script>
</head>

    <body contenteditable = "false">

        <div id="outside-loader" class= "loaders">
        <div id="inside-loader"  class= "loaders">
        
        </div>
        </div>
         <?php  
    

require_once("{$incs_dir}header.php");
    
    
    
    ?>


       <div id="login-content">
    <?php  
    

require_once("{$incs_dir}login.php");
    
    
    
    ?>

       </div>

        <div id="reg-content">
        
        <?php require_once("{$incs_dir}signup.php");

?>

           
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
        
        
        
        
         <?php   require_once("{$incs_dir}footer.php");?>
    </body>
</html>