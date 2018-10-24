
<!DOCTYPE html>
<html lang="en-us" dir="ltr">

<head>
    <?php  
$page_description = "Snoott user password reset";
$page_keywords = "Snoott , User , Account , Settings , Password";


//$page_title = " ";

require_once($_SERVER['DOCUMENT_ROOT'].'/site.php');

$page_title = 'Snoott account reset';

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
echo "<link rel= 'stylesheet' href = '{$css_dir}reset_password.css' type = 'text/css' />".PHP_EOL;
echo "<script type = 'text/JavaScript' src = '{$js_dir}reset_password.js' language = 'javascript'></script>";





      ?> 
 

    </head>

<body>
<div id = "password-confirmation-alert">

Your password has been saved successfully
<i class = "fa fa-remove" id = "remove-alert-icon"></i>
</div>

<?php require_once "$incs_dir/header.php"; ?>
<div id = "password_reset_text">Reset Password</div>
<form  id = "password_reset_box" name = "password_reset_box" method="POST" action="" accept-charset="utf-8" enctype="application/x-www-form-urlencoded">
    
    <span id  = "enter_your_email">Set your new account password</span>
    <input id = "username" type = "text" class = "inputs"  value = "<?php echo $GLOBALS['username']; ?>" disabled = "disabled"/>
    <input type = "password" id = "password" class = "inputs" />
    <input type = "password" id  = "password-again" class="inputs" />
    <div id = "server-response"></div>
    <button type = "submit" name = "submit"  id = "send-email">Save</button> 
</form>

<?php require_once "$incs_dir/footer.php"; ?>
</body>
</html>
