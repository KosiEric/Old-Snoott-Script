<?php //echo "User = ".$_COOKIE['user'];?>
<form class="containers" action="" name="login" method="POST" accept-charset="utf-8" autocomplete="on" id="login" enctype="application/x-www-form-urlencoded">
    <p id="login-text">Snoott</p>
<input type="text" id="username" placeholder = "Phone, email or username" name ="username" class="inputs"  <?php 

if(isset($_SESSION["new_email"]) && !empty($_SESSION['new_email'])){
    $user = $_SESSION["new_email"];
    echo "value = '$user'";
}
?> />
    
    <input type="password" name="password" id ="password" placeholder = "Password" class ="inputs"/>
    <div id="login-response" class="responses"></div>
    <!--<input type="password" name="key" id="key" placeholder ="Key" class ="inputs" />-->
    <span id = "remember-me"> <input type="checkbox" checked ="checked" id ="remember" checked ="checked"/><label for = "remember">Remember me</label> </span>
    <input type="submit" name="Submit" value="Login" id ="login-button"  />
    <span id="forgot-password" onclick = "window.location.href='/pass';" title = "Recover your account">Forgot password?</span>
    
</form>
    <div id="new-signup">
    Don't have an account? <span id = "signup-link" onclick="showSignupForm();" title ='Create an account'>Sign up</span>
    </div>

