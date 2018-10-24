$(document).ready(function () {

var isEmail = function (emailAddress) {

    var emailInput = emailAddress;
    var email = emailInput.val();
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

var isUsername = function (user){
    
     var usernameInput = user;
    var username = usernameInput.val();

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

var isRealLogin = function (e) {

e.preventDefault();
e.stopPropagation();
if(isUsername($('#email')) || isEmail($('#email'))){
    var sendEmail = $('#send-email');
    sendEmail.attr("disabled" , "disabled");


   var  originalValue = sendEmail.html();
var typeOfDetail = (isUsername($('#email')))?'username':'email';

sendEmail.html('<i class="fa fa-spinner fa-spin" style="font-size:24px"></i>');
var stringArray = ["a" , "b" , "c" , "d" , "e" , "f" , "g" , "h" , "i" , "j" , "k" , "l" , "m" , "n" , "o" , "p" , "q" , "r"
, "s" , "t" , "u" , "v" , "w" , "x" , "y" , "z" , "0" , "1" , "2" , "3" , "4" , "5" , "6" , "7" , "8" , "9"
];
var email = $('#email').val();
//console.log(typeOfDetail);
var numLength = stringArray.length;

//var i = 0;
/*var letters = "";
var  numStrings = 7;

for (var i =0; i < numStrings; ++i){

    letters+=stringArray[Math.floor(Math.random() * numLength)];
}
*/
var webData = JSON.stringify({"email" : email , "type" : typeOfDetail});

$.post('/processors/recover_password.php', {data: webData}, function(dat, textStatus, xhr) {
var response = JSON.parse(dat);
if(response.success == 1){

    sendEmail.html('Sent');
$('#server-response').html(response.error);

var timer = setTimeout(function () {
$('#password_recovery_text').hide();
$('#password_recovery_box').slideUp('slow', function() {
    window.location.href = '/';
});

} , 3000);
}


else {
$('#server-response').html(response.error);

sendEmail.html(originalValue);
sendEmail.removeAttr('disabled');

}

});

}

else {

    return false;
}
}

$('#password_recovery_box').on('submit' , isRealLogin);
$('#email').on('keyup' , function () {

    if(isUsername($('#email')) || isEmail($('#email'))){
        return true;
    }
});

});