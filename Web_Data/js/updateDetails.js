
var tryUpdateForm = function (e){

    e.preventDefault();
    e.stopPropagation();
    if(isFullname()){

        var fullname = $('#fullname').value();
var universities = document.getElementById('universities');
var university = universities.options[universities.selectedIndex].text;
var states = document.getElementById('profile-region');
var state = states.options[states.selectedIndex].text;
var data = JSON.stringify({"fullname" : fullname , "state" : state , "university" : university});
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
               //console.log(response);
//return null;
                if(response.success == 1){

                    $('#update-response').html(response.error);
                    setTimeout(function () {

                  $('#update-response').html(' ');
                    } , 2500);
                    setTimeout(function() {
 $('#profile-settings-form').css("display" , "none");
                    $('#profile-dropdown').css("backgroundImage" ,  "url(" +imageFolder+"drop-down.png)");
                   

                  } , 1500);
                }

                else {
 $('#update-response').html(response.error);
                    setTimeout(function () {

                  $('#update-response').html(' ');
                    } , 2500);

                }
    }

    else {

        console.log(JSON.stringify({"state" : state , "status" : status , "StatusText" : statusText}));
    }
}

        request.open('POST', '/processors/details.php', true);
        request.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
        $('#update-response').html('<i class="fa fa-circle-o-notch fa-spin" style="font-size:24px"></i>');

        request.send('data='+data);
} 

}



var isFullname = function (){
var fullname = $('#fullname');
var universities = document.getElementById('universities');
var uniLength = universities.options.length;
if(uniLength == 0){

    $('#profile-region').css('border' , '1px solid #ff3333');
    return false;
}

else {
 $('#profile-region').css('border' , '1px solid lightblue');
var fullnameInput = $('#fullname') , university = universities.options[universities.options.selectedIndex].text;

    var fullname = fullnameInput.value();
    
    var nameRegExp = /^[a-zA-Z ]*$/;
    if(nameRegExp.test(fullname) && fullname.length > 3 && fullname.indexOf(' ') > 0 && fullname.indexOf(' ') != fullname.length - 1) {
$('#fullname').css('border' , '1px solid lightblue');
        return true;
    }

    else {

$('#fullname').css('border' , '1px solid #ff3333');
return false;
    }

}

}

if(window.addEventListener){

    window.addEventListener('load' , function (){
var updateForm = $('#profile-settings-form') , fullname = $('#fullname');

updateForm.on('submit' , tryUpdateForm);
fullname.on('keyup' , isFullname);


    });
}
else if (window.attachEvent){

    window.attachEvent('onload' , function (){
var updateForm = $('#profile-settings-form') , fullname = $('#fullname');

updateForm.on('submit' , tryUpdateForm);
fullname.on('keyup' , isFullname);

    });
}