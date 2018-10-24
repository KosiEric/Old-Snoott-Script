<?php session_start(); 

if(!isset($_SESSION['user_details'])){

    header('Location:/');
}
?>
<!DOCTYPE html>
<html lang="en-us" dir="ltr">

<head>
    <?php  
$page_description = "Login And Registration Page";
$page_keywords = "Login , Registration , User , Account , Verification ";


//$page_title = " ";
require_once($_SERVER['DOCUMENT_ROOT'].'/Web_Data/incs/site_data.php');
$page_title = SITE_TITLE." / Sign out of Snoott";

require_once($incs_dir.'meta.php');

?><link rel="stylesheet" type="text/css" href="<?php  echo $css_dir?>footer.css" />
    
    <link rel="stylesheet" type="text/css" href="<?php  echo $css_dir?>logout.css" />
 
    
      <script  type="text/javascript" language ="JavaScript" src="<?php  echo $js_dir?>jquery.js"></script>
     <script type = "text/JavaScript" language = "javaScript" src = "<?php echo $js_dir?>logout.js"></script>
     <?php  
    

require_once("{$incs_dir}header_style.php");
    
    
    
    ?>

     </head>
         <body>
         <?php  require_once("{$incs_dir}header.php");?>
       
        
         <div id = "logout-div">
<span id = "logout-text">Log out of Snoott?</span>
<div id = "logout-button-container">
<button id = "logout-cancel" class = "logut-buttons">Cancel</button>
       
<button id = "logout-ok" class = "logut-buttons">Log out</button>
</div>
<span id = "sign-in">You can always sign back in at any time. </span>
         </div>
         <?php  require_once("{$incs_dir}footer.php");?>
    </body>
</html>