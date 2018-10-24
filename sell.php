
<?php

session_start();




$GLOBALS['warning'] = null;;
if(isset($_SESSION['user_details'])){
foreach ($_SESSION['user_details'] as $details){
$num = 0;
  if($details == ''){
     $num =1;
$GLOBALS['warning'] = 'You must complete your profile to continue';
require_once $_SERVER['DOCUMENT_ROOT'].'/Web_Data/incs/sell_error.php';
     break;
    exit();
  }
 
}
 if($num == 0) {

    require_once $_SERVER['DOCUMENT_ROOT'].'/Web_Data/incs/sell.php';

  } 

}

else if(!isset($_SESSION['user_details'])) {

$GLOBALS['warning']  = 'Login not found';
require_once $_SERVER['DOCUMENT_ROOT'].'/Web_Data/incs/sell_error.php';

}


?>
