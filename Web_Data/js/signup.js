let imageFolder = "/images/";
var handleSignup = function (e) {
e.preventDefault();
e.stopPropagation();

/*var fullnameInput = $('#fullname') 
, stateDropDown = $('#state') ,  addressInput = $('#address') ,
 contactInput = $('#contact')
,secondContactInput = $('#second-contact'),usernameInput = $('#username') , emailInput = $('#email') , firstPasswordInput = $('#password') , 
passwordAgainInput = $('#password-again'),profileInput = $('#profile') , checkInput = $('#checker');

var fullname = fullnameInput.value() , state = stateDropDown.options[stateDropDown.selectedIndex].value , 
address = addressInput.value() ,contact = contactInput.value(), secondContact = secondContactInput.value() , username = usernameInput.value()
,email = emailInput.value() , password = firstPasswordInput.value() , passwordAgain = passwordAgainInput.value();
;    
*/


}



var isName = function () {
    var fullnameInput = $('#fullname');
    var fullname = fullnameInput.value();
    
    var nameRegExp = /^[a-zA-Z ]*$/;
    if(nameRegExp.test(fullname) && fullname.length > 3 && fullname.indexOf(' ') > 0 && fullname.indexOf(' ') != fullname.length - 1) {
$('#fullname').css('border' , '2px solid lightblue');
        return true;
    }

    else {

$('#fullname').css('border' , '2px solid #ff3333');
return false;
    }
}

var isState = function () {
var stateDropDown = $('#state');
var state = document.getElementById('state').options[document.getElementById('state').selectedIndex].value;
if(state != 'Select') {
stateDropDown.css('border' , '2px solid lightblue');
return true;
}
else {
stateDropDown.css('border' , '2px solid #ff3333');

    return false;
}
}

var  isAddress = function () {

var addressInput = $('#address');

var address = addressInput.value();

if(address.length < 30) {
addressInput.css('border' , '2px solid #ff3333');
return false;
}

else {

    addressInput.css('border' , '2px solid lightblue');
    return true;
}

}

var isFirstContact = function () {

    var contactInput = $('#contact');
    var contact = contactInput.value();

    var contactExpOne = /^(\d{10})$/;
    
    var contactExpTwo = /^(\d{11})$/;

    if(contactExpOne.test(contact) && contact.toString().charAt(0) != '0') {

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

switch(firstThreeNumbers) {
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

switch(firstFourNumbers) {

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
if(userNetwork == null) {
$('#first-country-code-wrapper').css('border' , '2px solid #ff3333');
return false;

}

else {


var networkImage = null;

switch(userNetwork) {

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

    default :

    networkImage = 'fone.png';
    break;
}
var wrapper = $('#first-country-code-wrapper');
wrapper.css({backgroundImage : 'url('+imageFolder+networkImage+')'
, border : '2px solid lightblue'
});
return true;

}


    }

    else if(contactExpTwo.test(contact) && contact.toString().charAt(0) == '0') {
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

switch(firstFourNumbers) {
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

switch(firstFiveNumbers) {

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
if(userNetwork == null) {
    
$('#first-country-code-wrapper').css({border : '2px solid #ff3333' ,
backgroundImage : 'url('+imageFolder+'fone.png)'});
return false;

}

else {

var networkImage = null;

switch(userNetwork) {

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

    default :

    networkImage = 'fone.png';
    break;
}
var wrapper = $('#first-country-code-wrapper');
wrapper.css({backgroundImage : 'url('+imageFolder+networkImage+')'
, border : '2px solid lightblue'
});
return true;

}


    }

    else {

$('#first-country-code-wrapper').css({border : '2px solid #ff3333',
backgroundImage : 'url('+imageFolder+'fone.png)'
});
return false;
    }
}




var isSecondContact = function(e) {

var contactInput = $('#second-contact');
    var contact = contactInput.value();

    var contactExpOne = /^(\d{10})$/;
    
    var contactExpTwo = /^(\d{11})$/;

    if(contactExpOne.test(contact) && contact.toString().charAt(0) != '0') {

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

switch(firstThreeNumbers) {
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

switch(firstFourNumbers) {

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
if(userNetwork == null) {
$('#first-country-code-wrapper').css('border' , '2px solid #ff3333');
return false;

}

else {


var networkImage = null;

switch(userNetwork) {

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

    default :

    networkImage = 'fone.png';
    break;
}
var wrapper = $('#second-country-code-wrapper');
wrapper.css({backgroundImage : 'url('+imageFolder+networkImage+')'
, border : '2px solid lightblue'
});
return true;

}


    }

    else if(contactExpTwo.test(contact) && contact.toString().charAt(0) == '0') {
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

switch(firstFourNumbers) {
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

switch(firstFiveNumbers) {

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
if(userNetwork == null) {
    
$('#second-country-code-wrapper').css({border : '2px solid #ff3333' ,
backgroundImage : 'url('+imageFolder+'fone.png)'});
return false;

}

else {

var networkImage = null;

switch(userNetwork) {

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

    default :

    networkImage = 'fone.png';
    break;
}
var wrapper = $('#second-country-code-wrapper');
wrapper.css({backgroundImage : 'url('+imageFolder+networkImage+')'
, border : '2px solid lightblue'
});
return true;

}


    }

    else {

$('#second-country-code-wrapper').css({border : '2px solid #ff3333',
backgroundImage : 'url('+imageFolder+'fone.png)'
});
return false;
    }
}

var isContact = function (e) {

let firstContact = $('#contact').value();
let secondContact = $('#second-contact').value();
if(isFirstContact() && isSecondContact() && firstContact != secondContact) {
return true;

}

else {
$('#second-country-code-wrapper').css({border : '2px solid #ff3333',
backgroundImage : 'url('+imageFolder+'fone.png)'
});
return false;

}

}


var firstFormIsFilled = function(e) {
var stateDropDown = $('#state');
var state = document.getElementById('state').options[document.getElementById('state').selectedIndex].value;

    if(isName() && isState() && isAddress()  && isFirstContact() && isContact()) {

        var continueButton = $('#continue-button');

        continueButton.html('<img src = '+imageFolder+'spin.gif width = "auto" height="32px" />');
        var timeout = setTimeout(function () {
$('#first-form').css('display' , 'none');
$('#second-form').css('display' , 'block');
$('#back-div').css('display' , 'block');
        }, 2000);
    }
}
var goBack = function () {
var continueButton = $('#continue-button');

    $('#back-div').css('backgroundImage' , 'url('+imageFolder+'spin.gif)');

    var timeout = setTimeout(function() {
$('#second-form').css('display' , 'none');
$('#back-div').css('display' , 'none');
$('#first-form').css('display' , 'block');
$('#back-div').css('backgroundImage' , 'url('+imageFolder+'back.png)');
continueButton.html('Continue &#9658;');
    }, 2000);
}

var isUsername = function () {

    var usernameInput = $('#username');
    var username = usernameInput.value();

    let usernameExp = /^(\w){6,12}$/;
    if(usernameExp.test(username)) {

        usernameInput.css('border' , '2px solid lightblue');
        return true;
    }

    else {


        usernameInput.css('border' , '2px solid #ff3333');
        return false;
    }
}

var isEmail = function (){
var emailInput = $('#email');
var email = emailInput.value();
var emailExp = /^([a-zA-Z0-9_\-\.]+)@([a-zA-Z0-9_\-\.]+)\.([a-zA-Z]{2,5})$/;
if(emailExp.test(email)) {

   
        

emailInput.css('border' , '2px solid lightblue');
return false;

    
    
}

else {

emailInput.css('border' , '2px solid #ff3333');
return false;

}
}

var isFirstPassword = function() {

    var firstPasswordInput = $('#password');
    var password = firstPasswordInput.value();
    var passwordExp = /^(\w{6,12})$/;
if(passwordExp.test(password)) {

    firstPasswordInput.css('border' , '2px solid lightblue');
    return true;
}

else {

    firstPasswordInput.css('border' , '2px solid #ff3333');
    return false;
}
}

var isSecondPassword = function () {

    var secondPasswordInput = $('#password-again');
    var passwordAgain = secondPasswordInput.value();
    var passwordExp = /^(\w{6,12})$/;
if(passwordExp.test(passwordAgain)) {

    secondPasswordInput.css('border' , '2px solid lightblue');
    return true;
}

else {

    secondPasswordInput.css('border' , '2px solid #ff3333');
    return false;
}


}

var isPassword = function() {

    var firstPassword = $('#password').value();
    var secondPassword = $('#password-again').value();
if(isFirstPassword() && isSecondPassword() && firstPassword == secondPassword) {
return true;

}

else {

$('#password-again').css('border' , '2px solid #ff3333');
return false;
}

}

var isFile = function () {
    let profileInput = $('#profile');
let profile = profileInput.value();

if(profile.length == 0) {

    profileInput.css('border' , '2px solid #ff3333');
    return false;
}

else {

    profileInput.css('border' , '1px solid lightblue');
    return false;
}
}
window.addEventListener('load' , function (e) {

    var form = $('#signup-form');

    form.on('submit' , handleSignup);

var fullnameInput = $('#fullname') 
, stateDropDown = $('#state') ,  addressInput = $('#address') ,
 contactInput = $('#contact')
,secondContactInput = $('#second-contact'),usernameInput = $('#username') , emailInput = $('#email') , firstPasswordInput = $('#password') , 
passwordAgainInput = $('#password-again'),profileInput = $('#profile') , checkInput = $('#checker') ,continueButton = $('#continue-button') ,
submitButton = $('#submit-button');    

fullnameInput.on('keyup' , isName);
stateDropDown.on('change' , isState);
addressInput.on('keyup' , isAddress);
contactInput.on('keyup' , isFirstContact);
secondContactInput.on('keyup' , isContact);
continueButton.on('click' , firstFormIsFilled);
$('#back-div').on('click' , goBack);
usernameInput.on('keyup' , isUsername);
emailInput.on('keyup' , isEmail);
firstPasswordInput.on('keyup' , isFirstPassword);
passwordAgainInput.on('keyup' , isPassword);


});

