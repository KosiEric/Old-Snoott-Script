<?php  

if(isset($_SESSION['user_details'])){
    
    require_once($_SERVER['DOCUMENT_ROOT'].'/Web_Data/incs/logged_header.php');
}

else {
    require_once($_SERVER['DOCUMENT_ROOT'].'/Web_Data/incs/non_logged_header.php');

}

?>