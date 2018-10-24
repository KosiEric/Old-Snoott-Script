$(document).ready(function () {

var tryChangePassword = function(e){
    e.preventDefault();
    e.stopPropagation();

    if(isPassword()){
var password = $('#password').val();
var username = $('#username').val();
var data = JSON.stringify({"password" : password  , "username" : username});
       var sendEmail = $('#send-email');
    sendEmail.attr("disabled" , "disabled");
    sendEmail.html('<i class="fa fa-spinner fa-spin" style="font-size:24px"></i>');

       $('#send-email').html()
        $.post('/processors/reset_password.php', {data: data}, function(data, textStatus, xhr) {
        var response = JSON.parse(data);
//console.log(response);
//console.log(data);
//return;
if(response.success == 1){

sendEmail.html("Saved");
$('#password-confirmation-alert').slideDown('slow', function() {
    $('#remove-alert-icon').click(function() {
$('#password-confirmation-alert').slideUp('slow' , function () {

    window.location.href = '/account';
});

    });
var timeOut = setTimeout(function() {
$('#password-confirmation-alert').slideUp('slow' , function () {

    window.location.href = '/account';
});


}, 4000);

});



}




else {

   sendEmail.removeAttr('disabled');
   $('#server-response').html(response.error);
}
                    });
    }
}
var isFirstPassword = function() {

    var firstPasswordInput = $('#password');
    var password = firstPasswordInput.val();
    var passwordExp = /^(\w{6,12})$/;
if(passwordExp.test(password)) {

    firstPasswordInput.css('border' , '1px solid #10bbb3');
    return true;
}

else {

    firstPasswordInput.css('border' , '1px solid #ff3333');
    return false;
}
}

var isSecondPassword = function() {

    var firstPasswordInput = $('#password-again');
    var password = firstPasswordInput.val();
    var passwordExp = /^(\w{6,12})$/;
if(passwordExp.test(password)) {

    firstPasswordInput.css('border' , '1px solid #10bbb3');
    return true;
}

else {

    firstPasswordInput.css('border' , '1px solid #ff3333');
    return false;
}
}
var isPassword = function() {

    var firstPassword = $('#password').val();
    var secondPassword = $('#password-again').val();
    //console.log(firstPassword == secondPassword);
if(isFirstPassword() && isSecondPassword() && firstPassword == secondPassword) {
return true;

}

else {

$('#password-again').css('border' , '1px solid #ff3333');
return false;
}

}


$('#password_reset_box').on('submit' , tryChangePassword);
$('#password').on('keyup' , isFirstPassword);
$('#password-again').on('keyup' , isPassword);

});