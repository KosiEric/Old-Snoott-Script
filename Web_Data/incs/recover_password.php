
<!DOCTYPE html>
<html lang="en-us" dir="ltr">

<head>
    <?php  
$page_description = "Snoott user E-mail confirmation";
$page_keywords = "Snoott , User , Account , Settings";


//$page_title = " ";

require_once($_SERVER['DOCUMENT_ROOT'].'/site.php');

$page_title = 'Snoott account recovery';

require_once($_SERVER['DOCUMENT_ROOT'].'/Web_Data/incs/meta.php');

?>

    <link rel="stylesheet" type="text/css" href="<?php  echo $css_dir?>footer.css" />
    
<link rel="stylesheet" type="text/css" href="<?php  echo $css_dir?>non_logged_header.css" />
    
    
<style type="text/css">
  
  body {
  background-color: #f5f8fa;
  }
</style>
    <script type="text/javascript" language ="JavaScript" src="<?php  echo $js_dir?>jquery.js"></script>
    
  
<?php 
echo "<link rel= 'stylesheet' href = '{$css_dir}recover_password.css' type = 'text/css' />".PHP_EOL;
echo "<script type = 'text/JavaScript' src = '{$js_dir}recover_password.js' language = 'javascript'></script>";





      ?> 
 

    </head>

<body>
<?php require_once("{$incs_dirWeb_Data}header.php"); ?>
<div id = "password_recovery_text">Forgot Password</div>
<form  id = "password_recovery_box" name = "password_recovery_box" method="POST" action="" accept-charset="utf-8" enctype="application/x-www-form-urlencoded">
    
    <span id  = "enter_your_email">Enter your email or username</span>
    <input class = "inputs" id = "email" type = "text" />
    <div id = "server-response"></div>
    <button type = "submit" name = "submit"  id = "send-email">Send</button> 
</form>

<?php require_once("{$incs_dir}footer.php");?>
</body>
</html>
