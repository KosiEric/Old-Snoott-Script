
        <form action="" class="containers" name="signup" method="POST" accept-charset="utf-8" autocomplete="on" id="signup" enctype="application/x-www-form-urlencoded">
    <p id="signup-text">Snoott</p>
             <input type="text" id="signup-username" placeholder = "Username" name ="signup-username" class="inputs"  />
            <div id = "first-country-code-wrapper" class="inputs"> <span class = "country-code">+234</span> <input type="text" name="phone" id ="phone" placeholder = "Phone" class ="reg-contacts"/></div>
    
            <input type="email" name="email" id ="email" placeholder = "E-mail" class ="inputs" />
    
         
   

    <input type="password" name="password" id ="signup-password" placeholder = "Password" class ="inputs"/>
    
    <input type="password" name="password-again" id="password-again" placeholder ="Password again" class ="inputs" />
   <div id="signup-response" class="responses"></div>
             <input type="submit" name="Submit" value="Sign up" id ="signup-button" />
    <span id="accept-terms">By signing up, you agree to <a href = "/terms/" id="terms-link">our Terms</a> & <a href = "/privacy/" id="terms-link"> Privacy Policy.</a> </span>
    
</form>
    <div id="new-login">
    Already have an account? <span id = "login-link" onclick="showLoginForm();">Log in</span>
    </div>
