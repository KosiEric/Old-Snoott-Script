<?php 
ob_end_flush();
error_reporting(false); ?>
<meta charset="utf-8" />
<meta name='copyright' content='Snoott Inc.' />
<meta name='language' content='EN' />
<meta name='robots' content='index,follow' />
<meta name='owner' content='Snoott' />
<meta name='url' content='https://www.Snoott.com' />
<meta name='identifier-URL' content='https://www.Snoott.com' />
<meta name='directory' content='submission' />
<meta name='category' content='Business , Classified Ad site  for Nigeria Tertialy institutions'/>
<meta name='coverage' content='Nigeria'/>
<meta name='distribution' content='Nigeria'/>
<meta name='rating' content='General'/>
<meta name='target' content='all'/>
<meta name='HandheldFriendly' content='True'/>
<meta name='MobileOptimized' content='360'/>
<meta http-equiv='Expires' content='0' />
<meta http-equiv='Pragma' content='no-cache' />
<meta http-equiv='Cache-Control' content='no-cache' />
<meta http-equiv='imagetoolbar' content='no' />
<meta http-equiv='x-dns-prefetch-control' content='off' />
<meta name='Classification' content='E-commerce' />
<meta name='subject' content="Nigeria's No.1 Classified Ad site For Tartiary institutions" />
<meta name="author" content = "Code from the other side" />
<meta name="description" content="<?php echo $page_description; ?>" />
   
<link rel="stylesheet" type="text/css" href="<?php  echo $css_dir?>search.css" />
 
 <?php  /*
 <script type="text/javascript" language ="JavaScript" src="<?php  echo $js_dir?>moment.js"></script>
  
  <script type="text/javascript" language ="JavaScript" src="<?php  echo $js_dir?>jquery.js"></script>
  <script type="text/javascript" language ="JavaScript" src="<?php  echo $js_dir?>important.js"></script>
  
  */ ?>
    <meta name="keywords" content="<?php echo $page_keywords; ?>" />
            <title><?php echo $page_title; ?></title>
            <style type="text/css">
            ::-webkit-scrollbar-track {
      background-color: #b46868;
  } /* the new scrollbar will have a flat appearance with the set background color */

  ::-webkit-scrollbar-thumb {
      background-color: rgba(0, 0, 0, 0.2);
  } /* this will style the thumb, ignoring the track */

  ::-webkit-scrollbar-button {
      background-color: #7c2929;
  } /* optionally, you can style the top and the bottom buttons (left and right for horizontal bars) */

  ::-webkit-scrollbar-corner {
      background-color: black;
  }
            </style>
            
            <script type="text/javascript" src = "<?php  echo $js_dir?>jquery.js" language = "JavaScript"></script>
<meta name = "viewport" content = "width=device-width,initial-scale=1.0,maximum-scale=1.0,user-scalable=no" />
<link rel="icon" type="image/png" href="<?php  echo $img_dir?>flash.png" id = "favicon" />
<script type="text/JavaScript">
   
   
       webAddress = window.location.href;
       
       if(String(webAddress).indexOf('.com') != String(webAddress).lastIndexOf(".")){
           
           window.location.href = '/404';
       } 
       
   
   </script>

<?php

header("Cache-control:no-cache");?>
<link rel="stylesheet" type="text/css" href="<?php  echo $css_dir?>offline.css" />
<link rel="stylesheet" type="text/css" href="<?php  echo $css_dir?>ad.css" />
<script type="text/javascript" src = "<?php  echo $js_dir?>offline.js" language = "JavaScript"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" /> 
<!--<link rel="stylesheet" href="<?php echo $css_dir ?>font-awesome.css" />-->

<link href='https://fonts.googleapis.com/css?family=Cairo' rel='stylesheet' /> 

<script type="text/JavaScript">

window.addEventListener('onclick' , function (e) {
        
        e.preventDefault();
    });
    
window.open = function (e) {
    e.preventDefault();
}    

window.open = false;
$(window).on('load' , function () {
 var initLength =    document.querySelectorAll("a[href='#']").length;
    
    if (initLength == 0) {
        timer = setInterval(function() {
            window.addEventListener('onclick' , function (e) {
        
        e.preventDefault();
    })
            adLinks = document.querySelectorAll("a[href='#']");
            adLinksLength = adLinks.length
            if(adLinksLength > 0) {
                //alert('i don catch am');
        for (var x = 0; x < adLinks.length; x++) {
            adLinks[x].removeAttribute('href');
        }        
            window.clearInterval(timer)    
            }
            
            
            
        } , 500)
        
    }
    
    else {
        
        adLinks = document.querySelectorAll("a[href='#']");
        for (var x = 0; x < adLinks.length; x++) {
            adLinks[x].removeAttribute('href');
        }
        
    }
});
</script>
<?php

//require_once("{$incs_dir}style.php");?>

<style type="text/css">

    body {

  padding:  0px;
  margin : 0px;
}

* {

    outline: none;
}
a[href='#']{
        
        color : inherit;
        text-decoration : none;
    } 
</style>

        
    
