

    var isPhone = function () {


        var contactInput = $('#phone');
        var contact = contactInput.value();

        var contactExpOne = /^(\d{10})$/;

        var contactExpTwo = /^(\d{11})$/;

        if (contactExpOne.test(contact) && contact.toString().charAt(0) != '0') {

            var networks = [];
            networks[0] = 'Mtn';
            networks[1] = 'Airtel';
            networks[2] = 'Glo';
            networks[3] = 'Etisalat';
            networks[4] = 'Starcomms';
            networks[5] = 'Visafone';
            networks[6] = 'Multi-links';
            networks[7] = "Smile";
            networks[8] = "ZoomMobile";
            networks[9] = "Ntel";

            var networkImages = [];
            networkImages[0] = 'mtn.jpg';
            networkImages[1] = 'airtel.png';
            networkImages[2] = 'glo.png';
            networkImages[3] = 'etisalat.jpg';
            networkImages[4] = 'starcomms.jpg';
            networkImages[5] = 'visafone.png';
            networkImages[6] = 'multilinks.jpg';
            networkImages[7] = 'smile.png';
            networkImages[8] = 'zoom.jpg';
            networkImages[9] = 'ntel.png';

            var firstThreeNumbers = contact.toString().substring(0, 3);
            var firstFourNumbers = contact.toString().substring(0, 4);
            var userNetwork = null;

            switch (firstThreeNumbers) {
                //Mtn  
                case "703":
                case "706":
                case "803":
                case "806":
                case "801":
                case "813":
                case "814":
                case "816":
                case "903":
                case "906":
                case "810":
                    userNetwork = networks[0];
                    break;
                // Airtel  
                case "701":
                case "708":
                case "802":
                case "808":
                case "812":
                case "902":
                case "907":
                    userNetwork = networks[1];
                    break;
                //Glo  
                case "705":
                case "805":
                case "807":
                case "811":
                case "815":
                case "905":
                    userNetwork = networks[2];
                    break;
                //Etisalat  
                case "809":
                case "817":
                case "818":
                case "909":
                case "908":
                    userNetwork = networks[3];
                    break;
                //Starcomms  

                case "819":
                    userNetwork = networks[4];
                    break;
                //Visafone  

                case "704":

                    userNetwork = networks[5];
                    break;
                case "709":
                    userNetwork = networks[6];
                    break;
                case "702":
                    userNetwork = networks[7];
                    break;
                case "707":
                    userNetwork = networks[8];
                    break;
                case "804":
                    userNetwork = networks[9];

            }

            switch (firstFourNumbers) {

                case "7028":
                case "7029":
                    userNetwork = networks[4];
                    break;
                case "7025":
                case "7026":
                    userNetwork = networks[5]
                    break;
                case "7027":
                    userNetwork = networks[6];
            }
            if (userNetwork == null) {
                $('#first-country-code-wrapper').css('border', '1px solid #ff3333');
                return false;

            }

            else {


                var networkImage = null;

                switch (userNetwork) {

                    case networks[0]:
                        networkImage = networkImages[0];
                        break;

                    case networks[1]:
                        networkImage = networkImages[1];
                        break;

                    case networks[2]:
                        networkImage = networkImages[2];
                        break;

                    case networks[3]:
                        networkImage = networkImages[3];
                        break;

                    case networks[4]:
                        networkImage = networkImages[4];
                        break;

                    case networks[5]:
                        networkImage = networkImages[5];
                        break;

                    case networks[6]:
                        networkImage = networkImages[6];
                        break;

                    case networks[7]:
                        networkImage = networkImages[7];
                        break;

                    case networks[8]:
                        networkImage = networkImages[8];
                        break;

                    case networks[9]:
                        networkImage = networkImages[9];
                        break;

                    default:

                        networkImage = 'fone.png';
                        break;
                }
                var wrapper = $('#first-country-code-wrapper');
                wrapper.css({ backgroundImage: 'url(' + imageFolder + networkImage + ')'
, border: '1px solid #10bbb3'
                });
                return true;

            }


        }

        else if (contactExpTwo.test(contact) && contact.toString().charAt(0) == '0') {
            var networks = [];
            networks[0] = 'Mtn';
            networks[1] = 'Airtel';
            networks[2] = 'Glo';
            networks[3] = 'Etisalat';
            networks[4] = 'Starcomms';
            networks[5] = 'Visafone';
            networks[6] = 'Multi-links';
            networks[7] = "Smile";
            networks[8] = "ZoomMobile";
            networks[9] = "Ntel";

            var networkImages = [];
            networkImages[0] = 'mtn.jpg';
            networkImages[1] = 'airtel.png';
            networkImages[2] = 'glo.png';
            networkImages[3] = 'etisalat.jpg';
            networkImages[4] = 'starcomms.jpg';
            networkImages[5] = 'visafone.png';
            networkImages[6] = 'multilinks.jpg';
            networkImages[7] = 'smile.png';
            networkImages[8] = 'zoom.jpg';
            networkImages[9] = 'ntel.png';

            var firstFourNumbers = contact.toString().substring(0, 4);
            var firstFiveNumbers = contact.toString().substring(0, 5);
            var userNetwork = null;

            switch (firstFourNumbers) {
                //Mtn  
                case "0703":
                case "0706":
                case "0803":
                case "0806":
                case "0801":
                case "0813":
                case "0814":
                case "0816":
                case "0903":
                case "0906":
                case "0810":
                    userNetwork = networks[0];
                    break;
                // Airtel  
                case "0701":
                case "0708":
                case "0802":
                case "0808":
                case "0812":
                case "0902":
                case "0907":
                    userNetwork = networks[1];
                    break;
                //Glo  
                case "0705":
                case "0805":
                case "0807":
                case "0811":
                case "0815":
                case "0905":
                    userNetwork = networks[2];
                    break;
                //Etisalat  
                case "0809":
                case "0817":
                case "0818":
                case "0909":
                case "0908":
                    userNetwork = networks[3];
                    break;
                //Starcomms  

                case "0819":
                    userNetwork = networks[4];
                    break;
                //Visafone  

                case "0704":

                    userNetwork = networks[5];
                    break;
                case "0709":
                    userNetwork = networks[6];
                    break;
                case "0702":
                    userNetwork = networks[7];
                    break;
                case "0707":
                    userNetwork = networks[8];
                    break;
                case "0804":
                    userNetwork = networks[9];

            }

            switch (firstFiveNumbers) {

                case "07028":
                case "07029":
                    userNetwork = networks[4];
                    break;
                case "07025":
                case "07026":
                    userNetwork = networks[5]
                    break;
                case "07027":
                    userNetwork = networks[6];
            }
            if (userNetwork == null) {

                $('#first-country-code-wrapper').css({ border: '1px solid #ff3333',
                    backgroundImage: 'url(' + imageFolder + 'fone.png)'
                });
                return false;

            }

            else {

                var networkImage = null;

                switch (userNetwork) {

                    case networks[0]:
                        networkImage = networkImages[0];
                        break;

                    case networks[1]:
                        networkImage = networkImages[1];
                        break;

                    case networks[2]:
                        networkImage = networkImages[2];
                        break;

                    case networks[3]:
                        networkImage = networkImages[3];
                        break;

                    case networks[4]:
                        networkImage = networkImages[4];
                        break;

                    case networks[5]:
                        networkImage = networkImages[5];
                        break;

                    case networks[6]:
                        networkImage = networkImages[6];
                        break;

                    case networks[7]:
                        networkImage = networkImages[7];
                        break;

                    case networks[8]:
                        networkImage = networkImages[8];
                        break;

                    case networks[9]:
                        networkImage = networkImages[9];
                        break;

                    default:

                        networkImage = 'fone.png';
                        break;
                }
                var wrapper = $('#first-country-code-wrapper');
                wrapper.css({ backgroundImage: 'url(' + imageFolder + networkImage + ')'
, border: '1px solid #10bbb3'
                });
                return true;

            }


        }

        else {

            $('#first-country-code-wrapper').css({ border: '1px solid #ff3333',
                backgroundImage: 'url(' + imageFolder + 'fone.png)'
            });
            return false;
        }
    }

    var isUsername = function (){
    
     var usernameInput = $('#username');
    var username = usernameInput.value();

    var usernameExp = /^(\w){6,12}$/;
    if(usernameExp.test(username)) {

        usernameInput.css('border' , '1px solid #10bbb3');
        return true;
    }

    else {


        usernameInput.css('border' , '1px solid #ff3333');
        return false;
    }
}
var isLoginPassword = function () {

    var password = $('#password');
    var passwordExp = /^(\w{6,12})$/;
    if (passwordExp.test(password.value())) {
        
        password.css('border', '1px solid #10bbb3');
        return true;
    }

    else {

        password.css('border', '1px solid #ff3333');
        return false;
    }


}

var isSignupUsername = function () {

    var usernameInput = $('#signup-username');
    var username = usernameInput.value();

    var usernameExp = /^(\w){6,12}$/;
    if(usernameExp.test(username)) {

        usernameInput.css('border' , '1px solid #10bbb3');
        return true;
    }

    else {


        usernameInput.css('border' , '1px solid #ff3333');
        return false;
    }


}

var isSignupPassword = function () {
    
     var password = $('#signup-password');
    var passwordExp = /^(\w{6,12})$/;
    if (passwordExp.test(password.value())) {

        password.css('border', '1px solid #10bbb3');
        return true;
    }

    else {

        password.css('border', '1px solid #ff3333');
        return false;
    }

}

var isEmail = function () {

    var emailInput = $('#email');
    var email = emailInput.value();
    var emailExp = /^([a-zA-Z0-9_\-\.]+)@([a-zA-Z0-9_\-\.]+)\.([a-zA-Z]{2,5})$/;
    if (emailExp.test(email)) {




        emailInput.css('border', '1px solid #10bbb3');
        return true;



    }

    else {

        emailInput.css('border', '1px solid #ff3333');
        return false;

    }
}
var isLoginEmail = function () {

    var emailInput = $('#username');
    var email = emailInput.value();
    var emailExp = /^([a-zA-Z0-9_\-\.]+)@([a-zA-Z0-9_\-\.]+)\.([a-zA-Z]{2,5})$/;
    if (emailExp.test(email)) {




        emailInput.css('border', '1px solid #10bbb3');
        return true;



    }

    else {

        emailInput.css('border', '1px solid #ff3333');
        return false;

    }
}

var isUsername = function (){
    
     var usernameInput = $('#username');
    var username = usernameInput.value();

    var usernameExp = /^(\w){6,12}$/;
    if(usernameExp.test(username)) {

        usernameInput.css('border' , '1px solid #10bbb3');
        return true;
    }

    else {


        usernameInput.css('border' , '1px solid #ff3333');
        return false;
    }
}
var isLoginPassword = function () {

    var password = $('#password');
    var passwordExp = /^(\w{6,12})$/;
    if (passwordExp.test(password.value())) {
        
        password.css('border', '1px solid #10bbb3');
        return true;
    }

    else {

        password.css('border', '1px solid #ff3333');
        return false;
    }


}

var isSignupUsername = function () {

    var usernameInput = $('#signup-username');
    var username = usernameInput.value();

    var usernameExp = /^(\w){6,12}$/;
    if(usernameExp.test(username)) {

        usernameInput.css('border' , '1px solid #10bbb3');
        return true;
    }

    else {


        usernameInput.css('border' , '1px solid #ff3333');
        return false;
    }


}

var isSignupPassword = function () {
    
     var password = $('#signup-password');
    var passwordExp = /^(\w{6,12})$/;
    if (passwordExp.test(password.value())) {

        password.css('border', '1px solid #10bbb3');
        return true;
    }

    else {

        password.css('border', '1px solid #ff3333');
        return false;
    }

}

var isEmail = function () {

    var emailInput = $('#email');
    var email = emailInput.value();
    var emailExp = /^([a-zA-Z0-9_\-\.]+)@([a-zA-Z0-9_\-\.]+)\.([a-zA-Z]{2,5})$/;
    if (emailExp.test(email)) {




        emailInput.css('border', '1px solid #10bbb3');
        return true;



    }

    else {

        emailInput.css('border', '1px solid #ff3333');
        return false;

    }
}

var isSecondPassword = function () {
    var password = $('#password-again');
    var passwordExp = /^(\w{6,12})$/;
    if (passwordExp.test(password.value())) {

        password.css('border', '1px solid #10bbb3');
        return true;
    }

    else {

        password.css('border', '1px solid #ff3333');
        return false;
    }


}

    var isPassword = function() {

    var firstPassword = $('#signup-password').value();
    var secondPassword = $('#password-again').value();
if(isSignupPassword() && isSecondPassword() && firstPassword == secondPassword) {
return true;

}

else {

$('#password-again').css('border' , '1px solid #ff3333');
return false;
}

}

var confirmLogin = function () {

    if ((isUsername() || isLoginEmail()) && isLoginPassword()) {

        return true;
    }
    else {

        return false;
    }
}

var tryLogin = function (e) {

    e.stopPropagation();
    e.preventDefault();

    if (confirmLogin()) {

        var request, LoginButton, serverResponse;
        loginButton = $('#login-button');

        var loginForm = $('#login');

        var username = $('#username').value(), password = $('#password').value(), serverResponse = $('#login-response');

        var data = JSON.stringify({ "username": username, "password": password });
        console.log(data);
        if (window.XMLHttpRequest) {

            request = new XMLHttpRequest();
        }

        else {

            request = new ActiveXObject("Microsoft.XMLHTTP");
        }



        request.addEventListener('readystatechange', function () {

            var status = this.status;
            var state = this.readyState;

            if (status == 200 && state == 4) {


                var response = JSON.parse(request.response);
                // console.log(request.response);
                //document.getElementById('login-button').disabled = false;
                 if (response.success == 1) {

                    // document.getElementById('signup-button').disabled = false;
                    loginButton.css('backgroundImage', 'none');

                    loginButton.attr('value', response.error);
                    //serverResponse.html('');
                    //serverResponse.css({ display: 'block', opacity: 1 });

                    // serverResponse.html(response.error);

                    //serverResponse.css('opacity' , 1);
                    loginButton.css('height', '32px');


                    var counter = 32;
                    var timer = setInterval(function () {
                        counter = counter - 4;
                        if (counter > 6) {
                            loginButton.css('height', counter + 'px');
                            // console.log(signupButton.css('height'));

                        }
                        else {


                            // var currentPage = window.location.href;
                            window.location.href = '/profile';

                            window.clearInterval(timer);
                        }




                    }, 500);

                }


                else {

                    document.getElementById('login-button').disabled = false;
                    loginButton.attr('value', 'Login');
                    loginButton.css('backgroundImage', 'none');
                    serverResponse.html(' ');
                    serverResponse.css({ display: 'block', opacity: 1 });

                    serverResponse.html(response.error);

                    serverResponse.css('opacity', 1);
                    var counter = 1;
                    var timer = setInterval(function () {
                        counter = counter - 0.1;
                        if (counter > 0.1) {
                            serverResponse.css('opacity', counter);


                        }
                        else {

                            serverResponse.html(' ');
                            serverResponse.css({ dispaly: 'none', opacity: 1 });
                            window.clearInterval(timer);
                        }




                    }, 750);







                }


            }

            else {

                console.log("State : " + state + " Status : " + status);
            }
        });

        request.open('POST', '/processors/login.php', true);
        request.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
        loginButton.attr('disabled', 'disabled');
        loginButton.attr('value', ' ');
        loginButton.css('backgroundImage', 'url(' + imageFolder + 'spin.gif');

        request.send('data=' + data);


    }

}



var confirmSignup = function () {

    if (isSignupUsername() && isPassword() && isEmail() && isPhone()) {

        return true;
    }
    else {

       return false;
    }
}




trySignup = function (e) {

    e.stopPropagation();
    e.preventDefault();

    if (confirmSignup()) {

        var request, signupButton, serverResponse;
        signupButton = $('#signup-button');

        var signupForm = $('#signup');

        var username = $('#signup-username').value(), password = $('#signup-password').value(), email = $('#email').value(),
        phone = $('#phone').value(), serverResponse = $('#signup-response');

        var data = JSON.stringify({ "username": username, "password": password, "email": email, "phone": phone });
        console.log(data);
        if (window.XMLHttpRequest) {

            request = new XMLHttpRequest();
        }

        else {

            request = new ActiveXObject("Microsoft.XMLHTTP");
        }



        request.addEventListener('readystatechange', function () {

            var status = this.status;
            var state = this.readyState;

            if (status == 200 && state == 4) {


          var response = JSON.parse(request.response);
  //var response = request.response;
  //console.log(response);
  //return null;
                if (response.success == 1) {

                    // document.getElementById('signup-button').disabled = false;
                    signupButton.css('backgroundImage', 'none');

                    signupButton.attr('value', response.error);
                    //serverResponse.html('');
                    //serverResponse.css({ display: 'block', opacity: 1 });

                    // serverResponse.html(response.error);

                    //serverResponse.css('opacity' , 1);
                    signupButton.css('height', '32px');


                    var counter = 32;
                    var timer = setInterval(function () {
                        counter = counter - 4;
                        if (counter > 6) {
                            signupButton.css('height', counter + 'px');
                           // console.log(signupButton.css('height'));

                        }
                        else {


                            var currentPage = window.location.href;
                            window.location.href = currentPage;

                            window.clearInterval(timer);
                        }




                    }, 500);

                }


                else {

                    document.getElementById('signup-button').disabled = false;
                    signupButton.attr('value', 'Sign up');
                    signupButton.css('backgroundImage', 'none');
                    serverResponse.html(' ');
                    serverResponse.css({ display: 'block', opacity: 1 });

                    serverResponse.html(response.error);

                    serverResponse.css('opacity', 1);
                    var counter = 1;
                    var timer = setInterval(function () {
                        counter = counter - 0.1;
                        if (counter > 0.1) {
                            serverResponse.css('opacity', counter);


                        }
                        else {

                            serverResponse.html(' ');
                            serverResponse.css({ dispaly: 'none', opacity: 1 });
                            window.clearInterval(timer);
                        }




                    }, 750);







                }


            }

            else {

                console.log("State : " + state + " Status : " + status);
            }
        });

        request.open('POST', '/processors/signup.php', true);
        request.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
        signupButton.attr('disabled', 'disabled');
        signupButton.attr('value', ' ');
        signupButton.css('backgroundImage', 'url(' + imageFolder + 'spin.gif');

        request.send('data=' + data);


    }


}

    if (window.addEventListener) {
        window.addEventListener('load', function () {

            var signupForm = $('#signup'), loginForm = $('#login'), username = $('#username'), LoginPassword = $('#password'), signupUsername = $('#signup-username'), SignupPassword = $('#signup-password'), email = $('#email'),
        phone = $('#phone'), passwordAgain = $('#password-again');

            username.on('keyup', function () {

                if(isUsername() || isLoginEmail()) {
                    
                }
            });
            LoginPassword.on('keyup', isLoginPassword);
            signupUsername.on('keyup', isSignupUsername);
            SignupPassword.on('keyup', isSignupPassword);
            email.on('keyup', isEmail);
            phone.on('keyup', isPhone);
            passwordAgain.on('keyup', isPassword);

            loginForm.on('submit', tryLogin);
            signupForm.on('submit', trySignup);
        });


    }

    else if (window.attachEvent) {

        window.attachEvent('onload', function () {

           
            var username = $('#username'), LoginPassword = $('#password'), signupUsername = $('#signup-username'), SignupPassword = $('#signup-password'), email = $('#email'),
        phone = $('#phone'), passwordAgain = $('#password-again');
           
        username.on('keyup', isUsername);
            LoginPassword.on('keyup', isLoginPassword);
            signupUsername.on('keyup', isSignupUsername);
            SignupPassword.on('keyup', isSignupPassword);
            email.on('keyup', isEmail);
            phone.on('keyup', isPhone);
            passwordAgain.on('keyup', isPassword);


        });
    }


   