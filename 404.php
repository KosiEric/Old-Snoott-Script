<?php
session_start();
$GLOBALS['warning'] = "Error 404, Page Not Found<br />"
?>
<!DOCTYPE html>
<html lang="en-us" dir="ltr">

<head>
  <?php
$page_description = "Snoott 404 page not found";
$page_keywords = "Snoott , User , Account , Error , Session";


//$page_title = " ";

require_once($_SERVER['DOCUMENT_ROOT'].'/Web_Data/incs/site_data.php');

$page_title = 'Snoott - 404 page not found';

require_once($incs_dir.'meta.php');

require_once($incs_dir.'config.php');

?>
    <link rel="stylesheet" type="text/css" href="<?php  echo $css_dir?>footer.css" />



    <?php



require_once("{$incs_dir}header_style.php");



    ?>
<style type="text/css">











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
 @media only screen and (max-width:836px)  {

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
text-align: center;
    display: block;
    border : 0px solid grey;
    width : 90%;
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
  margin-top : 20px;
  -webkit-transition: background-color ease-in;
  transition : background-color 2s;
  margin-bottom: 60px;
   }
#home-button:hover {
  background-color: #c9302c;
}
.fa-home{
  color : #fff;
  margin-right : 5px;
}
}



</style>




    </head>

    <body>
<?php    require_once("{$incs_dir}header.php"); ?>

   <div id = "warning-box">

<i id = "warning-icon" class="fa fa-warning" style="font-size:56px"></i>

<p id = "warning-text"><?php echo $GLOBALS['warning']; ?></p>
<button id = "home-button" onclick="window.location.href= '/';">
    <i class = "fa fa-home"></i>Go to homepage</button>
   </div>
         <?php



  //  print_r($_SESSION['user_details']);
  
  
  

    ?>
<?php require_once("{$incs_dir}/footer.php");


    ?>
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

    </body>
</html>
