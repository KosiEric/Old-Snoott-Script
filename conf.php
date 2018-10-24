<?php  
require_once $_SERVER['DOCUMENT_ROOT'].'/Web_Data/incs/config.php';
mb_internal_encoding("UTF-8");
ob_start();
session_start();
if(isset($_GET['token']) AND !empty($_GET['token'])){

$token = $_GET['token'];

$token_len = mb_strlen($token);

if($token_len <= 30){

header("Location :/");

}

else {
$conn = mysqli_init();

if(mysqli_real_connect($conn , HOST , USER , PASSWORD , DB)){
$token = mysqli_real_escape_string($conn , $token);

$sql = "SELECT * FROM email_verification WHERE token = '{$token}'";
if($run = mysqli_query($conn , $sql)){
$query_array = mysqli_fetch_assoc($run);
$user = $query_array['username'];
$_GLOBALS['the_email'] = $query_array['email']; 
//print_r($query_array);
    if(empty($query_array)){

        header("Location:/");
    }

    else {
$user = $query_array['username'];

$query = "UPDATE users SET email_verified = 1 WHERE username = '{$user}';";
$query.="DELETE FROM email_verification WHERE token = '{$token}';";
if($run = mysqli_multi_query($conn , $query)){
if(isset($_SESSION['user_details']) && !empty($_SESSION['user_details'])){

    $_SESSION['user_details']['email_verified'] = '1';
}
}

    }
}

}

}

}
if(!isset($_GET['token'])){
  header('Location: /');
}
?>
<!DOCTYPE html>
<html lang="en-us" dir="ltr">

<head>
    <?php  
$page_description = "Snoott user E-mail confirmation";
$page_keywords = "Snoott , User , Account , Settings";


//$page_title = " ";

require_once($_SERVER['DOCUMENT_ROOT'].'/Web_Data/incs/site_data.php');

$page_title = ucfirst($user).' E-mail confirmation';

require_once($incs_dir.'meta.php');

?>
    <link rel="stylesheet" type="text/css" href="<?php  echo $css_dir?>footer.css" />
    

    
<style type="text/css">
  
  body {
  background-color: #f5f8fa;
  }
</style>
    <script type="text/javascript" language ="JavaScript" src="<?php  echo $js_dir?>jquery.js"></script>
    
  
<?php 
echo "<link rel= 'stylesheet' href = '{$css_dir}conf.css' type = 'text/css' />".PHP_EOL;
echo "<script type = 'text/JavaScript' src = '{$js_dir}conf.js' language = 'javascript'></script>";





      ?> 
 

    </head>

<body>
<div id = "email-confirmation-alert">

Your E-mail address (<strong style="font-weight: bold;"><?php echo $_GLOBALS['the_email']; ?></strong>) has been confirmed succesfully.
<i class = "fa fa-remove" id = "remove-alert-icon"></i>
</div>
<?php require_once "{$incs_dir}footer.php"; ?>
</body>
</html>
