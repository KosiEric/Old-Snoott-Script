

var isOldPassword = function () {


    var firstPasswordInput = $('#current-password');
    var password = firstPasswordInput.value();
    var passwordExp = /^(\w{6,12})$/;
if(passwordExp.test(password)) {

    firstPasswordInput.css('border' , '1px solid lightblue');
    return true;
}

else {

    firstPasswordInput.css('border' , '1px solid #ff3333');
    return false;
}
}
var isPassword = function () {

    var secondPasswordInput = $('#new-password');
    var passwordAgain = secondPasswordInput.value();
    var passwordExp = /^(\w{6,12})$/;
if(passwordExp.test(passwordAgain)) {

    secondPasswordInput.css('border' , '1px solid lightblue');
    return true;
}

else {

    secondPasswordInput.css('border' , '1px solid #ff3333');
    return false;
}

}

var isSecondPassword = function () {

    var secondPasswordInput = $('#new-password-again');
    var passwordAgain = secondPasswordInput.value();
    var passwordExp = /^(\w{6,12})$/;
if(passwordExp.test(passwordAgain)) {

    secondPasswordInput.css('border' , '1px solid lightblue');
    return true;
}

else {

    secondPasswordInput.css('border' , '1px solid #ff3333');
    return false;
}


}

var isPasswordAgain =function () {
var firstPassword = $('#new-password').value();
    var secondPassword = $('#new-password-again').value();
if(isOldPassword() &&  isPassword() && isSecondPassword() && firstPassword == secondPassword) {
return true;

}

else {

$('#new-password-again').css('border' , '1px solid #ff3333');
return false;
}


}
var tryChangePassword = function (e){
  e.preventDefault();
    e.stopPropagation();
if(isPasswordAgain()){
  
var oldPassword = $('#current-password').value();
var newPassword = $('#new-password').value();

var data = JSON.stringify({"old-password" : oldPassword , "new-password" : newPassword});

var request;
if(window.XMLHttpRequest){

    request = new XMLHttpRequest();
}

else {

    request = new ActiveXObject("Microsoft.XMLHTTP");
}

request.onreadystatechange = function () {
    var state = request.readyState;
    var status = request.status;
    var statusText = request.statusText;

    if(state == 4 && status == 200){
                var response = JSON.parse(request.response);
                //var response = request.response;
             //   console.log(response);

                if(response.success == 1){

                    $('#password-response').html(response.error);
                    setTimeout(function () {

                  $('#password-response').html(' ');
                    } , 2500);
                                                             setTimeout(function() {
 $('#change-password-form').css("display" , "none");
                    $('#password-settings').css("backgroundImage" ,  "url(" +imageFolder+"drop-down.png)");
                   

                  } , 1500);
                }

                else {
 $('#password-response').html(response.error);
                    setTimeout(function () {

                  $('#password-response').html(' ');
                    } , 2500);

                }
    }

    else {

        console.log(JSON.stringify({"state" : state , "status" : status , "StatusText" : statusText}));
    }
}

        request.open('POST', '/processors/password.php', true);
        request.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
        $('#password-response').html('<i class="fa fa-circle-o-notch fa-spin" style="font-size:24px"></i>');

        request.send('data='+data);
} 
}
if(window.addEventListener){
window.addEventListener('load' , function () {
    var passswordForm = $('#change-password-form') , currentPassword = $('#current-password') , newPassword = $('#new-password') , 
    newPasswordAgain = $('#new-password-again');


     currentPassword.on('keyup' , isOldPassword);
     newPassword.on('keyup' , isPassword);
     newPasswordAgain.on('keyup' , isPasswordAgain);
    passswordForm.on('submit' , tryChangePassword);
});

}

else if(window.attachEvent){

    window.attachEvent('onload' , function () {
var passswordForm = $('#change-password-form') , currentPassword = $('#current-password') , newPassword = $('#new-password') , 
    newPasswordAgain = $('#new-password-again');


     currentPassword.on('keyup' , isOldPassword);
     newPassword.on('keyup' , isPassword);
     newPasswordAgain.on('keyup' , isPasswordAgain);
    passswordForm.on('submit' , tryChangePassword);

    });
}