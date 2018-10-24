<!DOCTYPE html>
<html lang="en-us" dir="ltr">

<head>
    <?php
$page_description = "Snoott authentication failed";
$page_keywords = "Snoott , User , Account , Settings , Sell";


//$page_title = " ";

require_once($_SERVER['DOCUMENT_ROOT'].'/Web_Data/incs/site_data.php');

$page_title = $GLOBALS['warning'];

require_once($_SERVER['DOCUMENT_ROOT'].'/Web_Data/incs/meta.php');

require_once($_SERVER['DOCUMENT_ROOT'].'/Web_Data/incs/config.php');

?>
    <link rel="stylesheet" type="text/css" href="<?php  echo $css_dir?>footer.css" />



    <?php



require_once($incs_dir."header_style.php");



    ?>
<style type = "text/css">

body {
background: #141d26;
}

#warning-box{
padding-top : 30px;
width : 50%;
margin : 80px auto;
height : 170px;
// border : 1px solid rgba(220 , 220 , 220 , 0.6);
background-color : #fff;
padding : 30px;
background-color : inherit;
}
#warning-icon {

display: block;
width : 100px;
margin : 20px auto;
color : #fff;
}

#non-logged-header-container,#logged-header-container {
background: rgba(0,0,0,.075);
}

#logged-header-container .logged-header-divs{
color : #10bbb3;
}

#non-logged-header-container .non-logged-header-divs,.fa {
color : #10bbb3;
}
#non-logged-header-container .fa , #logged-header-container .fa{
color :rgba(255 , 255 , 255 , .7);
}
#site-footer {
    
    position : fixed;
    bottom : 0;
  left : 0;
  right : 0;
  width : 0;
  display: none;
    
}

#warning-text{
color :#fff;
font-size: 40px;
display: block;
margin : 10px auto;
text-align: center;
}
.non-logged-header-divs , .logged-header-divs{
background:none;
}

#home-button{
color: #fff;
background-color: #d9534f;
border : 1px solid #d9534f;
height : 30px;
display : block;
margin-left : auto;
margin-right : auto;
font-size : 14px;
border-radius : 5px;
cursor: pointer;
margin-top : 30px;
-webkit-transition: background-color ease-in;
transition : background-color 2s;
}
#home-button:hover {
background-color: #c9302c;
}
.fa-home{
color : #fff;
margin-right : 5px;
}
a#settings-link {
    
    color : #fff;
    text-decoration : none;
    font-family : Cairo;
    font-size : 16px;
}

</style>
<script type = "text/javascript" language = "Javascript">

window.onload = function (){
  var button = document.getElementById('home-button');
   button.onclick = function () {
     window.location.href = '/settings';
   }
}
</script>



    </head>

    <body> <div id = "warning-box">

  <i id = "warning-icon" class="fa fa-warning" style="font-size:56px"></i>

  <p id = "warning-text"><?php echo $GLOBALS['warning']; ?></p>
  <a href = "/settings" id = "settings-link"><button id = "home-button"><i class = "fa fa-gear" onclick="window.location.href = '/settings"></i>Complete profile</button></a>
     </div>
         <?php


require_once($_SERVER['DOCUMENT_ROOT'].'/Web_Data/incs/header.php');

  //  print_r($_SESSION['user_details']);

    ?>
<?php require_once($incs_dir.'footer.php');


    ?>


    </body>
</html>
