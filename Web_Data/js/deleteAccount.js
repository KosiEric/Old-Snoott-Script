var tryDeleteAccount = function (e){

    e.preventDefault();
    e.stopPropagation();

var submitValue =  $('#delete-account-button').value();
var type;
if(submitValue.toLowerCase().indexOf('delete') >= 0){
    type = 0;
}

else {

    type = 1;
}

deleteButton = $('#delete-account-button');
var data = JSON.stringify({"type" : type});
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
             //   var response = request.response;
               //console.log(response);

                if(response.success == 1){
if(type == 0){
deleteButton.value('Activate account');
$('#delete-account-text').html('Activate account');
}

else {
deleteButton.value('Delete account');
$('#delete-account-text').html('Delete account');
}
                    $('#delete-response').html(response.error);
                    setTimeout(function () {

                  $('#delete-response').html(' ');
                    } , 2500);
                      setTimeout(function() {
 $('#delete-account-form').css("display" , "none");
                    $('#delete-account').css("backgroundImage" ,  "url(" +imageFolder+"drop-down.png)");


                  } , 1500);
                }

                else {
 $('#delete-response').html(response.error);
                    setTimeout(function () {

                  $('#delete-response').html(' ');
                    } , 2500);

                }
    }

    else {

        console.log(JSON.stringify({"state" : state , "status" : status , "StatusText" : statusText}));
    }
}

        request.open('POST', '/processors/delete.php', true);
        request.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
        $('#delete-response').html('<i class="fa fa-circle-o-notch fa-spin" style="font-size:24px"></i>');

        request.send('data='+data);
}

if(window.addEventListener){
window.addEventListener('load' , function (){

    var deleteForm = $('#delete-account-form') , deleteButton = $('#delete-account-button');


    deleteForm.on('submit' , tryDeleteAccount);

});
}

else if(window.attachEvent){

    window.attachEvent('onload' , function (){
 var deleteForm = $('#delete-account-form') , deleteButton = $('#delete-account-button');


    deleteForm.on('submit' , tryDeleteAccount);


    });
}
