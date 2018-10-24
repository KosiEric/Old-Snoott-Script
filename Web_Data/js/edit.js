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
, border: '1px solid lightblue'
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
, border: '1px solid lightblue'
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

var isUsername = function () {

    var usernameInput = $('#username');
    var username = usernameInput.value();

    var usernameExp = /^(\w){6,12}$/;
    if (usernameExp.test(username)) {

        usernameInput.css('border', '1px solid lightblue');
        return true;
    }

    else {


        usernameInput.css('border', '1px solid #ff3333');
        return false;
    }


};
var isEmail = function () {

    var emailInput = $('#email');
    var email = emailInput.value();
    var emailExp = /^([a-zA-Z0-9_\-\.]+)@([a-zA-Z0-9_\-\.]+)\.([a-zA-Z]{2,5})$/;
    if (emailExp.test(email)) {




        emailInput.css('border', '1px solid lightblue');
        return false;



    }

    else {

        emailInput.css('border', '1px solid #ff3333');
        return false;

    }
}

var tryEditForm = function (e) {

    e.preventDefault();
    e.stopPropagation();
    var username = $('#username').value();
    var email = $('#email').value();
    var phone = $('#phone').value();
    data = JSON.stringify({"username" :  username , "email" : email , "phone" : phone});
    if (isUsername && isEmail && isPhone) {

        var request;


        if (window.XMLHttpRequest) {

            request = new XMLHttpRequest();
        }

        else {

            request = new ActiveXObject("Microsoft.XMLHTTP");
        }

        request.onreadystatechange = function () {
            var status = request.status;
            var state = request.readyState;
            var statusText = request.statusText;

            if (state === 4 && status === 200) {

                var response = JSON.parse(request.response);
                //var response = request.response;
                //console.log(response);

                if(response.success == 1){

                    $('#account-details-response').html(response.error);
                    setTimeout(function () {

                  $('#account-details-response').html(' ');
                    } , 2500);
                                         setTimeout(function() {
 $('#edit-account-details').css("display" , "none");
                    $('#account-settings').css("backgroundImage" ,  "url(" +imageFolder+"drop-down.png)");
                   

                  } , 1500);
                }

                else {
 $('#account-details-response').html(response.error);
                    setTimeout(function () {

                  $('#account-details-response').html(' ');
                    } , 2500);

                }
                
            }

              else {

        console.log(JSON.stringify({"state" : state , "status" : status , "StatusText" : statusText}));
    }

           



        };


        request.open('POST', '/processors/edit.php', true);
        request.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
        $('#account-details-response').html('<i class="fa fa-circle-o-notch fa-spin" style="font-size:24px"></i>');

        request.send('data='+data);

    }
}
if(window.addEventListener){
    window.addEventListener('load', function () {

        var formEditForm = $('#edit-account-details') , username = $('#username');
    email = $('#email'), phone = $('#phone');

    formEditForm.on('submit', tryEditForm);
    username.on('keyup', isUsername);
    email.on('keyup', isEmail);
    phone.on('keyup', isPhone);
    });
    
}

else if(window.attachEvent){
window.attachEvent('load', function () {

    var formEditForm = $('#edit-account-details'), username = $('#username');
    email = $('#email'), phone = $('#phone');

    formEditForm.on('submit', tryEditForm);
    username.on('keyup', isUsername);
    email.on('keyup', isEmail);
    phone.on('keyup', isPhone);
});
}