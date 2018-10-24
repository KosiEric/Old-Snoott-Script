 <div id = "non-logged-header-container" class = "main-header-containers">
        <div id = "drop-header-container"><a href = "/" id = "main-menu-link"><i class = "fa fa-home" id = "menu-home"></i></a> <i class = "fa fa-bars" 
  id = "menu-bar" ></i></div>
 
        <a id="first-off-header-div" class = "non-logged-header-divs" onclick="window.location.href='/account';" href = "/account">
            <i class="fa fa-user-circle" style="font-size:20px;"></i>
        Login
        </a>
        <a id="second-off-header-div" class = "non-logged-header-divs" onclick="window.location.href='/contact';"  href = "/contact">
            
            <i class="fa fa-envelope" aria-hidden="true"></i>
Contact us
        </a>
               <a id="third-off-header-div"  class = "non-logged-header-divs" onclick="window.location.href='/sell';"  href = "/sell">
      <!--<span id = "header-plus"><i class="fa fa-bullhorn"></span>--></i><i class="fa fa-bullhorn"></i>Sell your item
        </a>
        
        <a id="user-settings-header" class = "non-logged-header-divs" onclick="window.location.href='/settings';" href = "/settings">
        <i class="fa fa-gear"></i> Settings
         
             </a>
<a id="user-link-header" href = "/" class = "logged-header-divs" onclick="window.location.href='/';">
        

             </a>
       </div>

    

   
 <script>

 
jQuery(document).ready(function() {
  
   jQuery('#menu-bar').on('click' , function () {

if(document.getElementById('non-logged-header-container')){
   
jQuery('.non-logged-header-divs').toggleClass('block-elements');

    }
});
 }); 
  </script>
  
  
    
    
  