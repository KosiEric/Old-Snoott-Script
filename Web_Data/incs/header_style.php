<?php  

if(isset($_SESSION['user_details'])){
    
   echo  "<link rel='stylesheet' type='text/css' href='{$css_dir}logged_header.css' />";
 
}

else {
    echo  "<link rel='stylesheet' type='text/css' href='{$css_dir}non_logged_header.css' />";
 
}

?>