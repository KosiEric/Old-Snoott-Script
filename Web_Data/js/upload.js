var isImage = function () {

    var imageFile = $('#user-image').value() , imageResponse = $('#image-response');
    if(imageFile == ''){

        return false;
    }
    else {

        var lastIndexOfDot =imageFile.toString().lastIndexOf('.');
        var format = imageFile.toString().substring(lastIndexOfDot + 1);

        if(format == 'jpg' || format == 'png' || format == 'jpeg'){

if (document.getElementById('user-image').size <= 5120000) {

imageResponse.html(imageFile);
    return true;

}

else {
imageResponse.html("File exceeds maximum of 5mb");
return false;
}
        }


    else {
imageResponse.html('Invalid image format');
return false;

    }
}

}
var tryUpload = function (e) {

    if(isImage()){

        if(window.FormData){

            e.preventDefault();
            e.stopPropagation();

            var fileInput = document.getElementById('user-image');

var fileLength = fileInput.files.length;

var data = new FormData();

var i = 0;
data.append('image' , fileInput.files[0]);

var request;
if(window.XMLHttpRequest){
request = new XMLHttpRequest();


}

else {

    request = new ActiveXObject("Microsoft.XMLHTTP");
}

request.upload.addEventListener('progress' , function(e) {
if(e.lengthComputable){
var percent = Math.round((e.loaded / e.sent) * 100);
if(!isNaN(percent)){
$('#image-response').html("loading... " + percent + '%');

}
}
});

request.upload.addEventListener('load' , function(e) {
$('#image-response').html(null);

});

request.onreadystatechange =   function (e) {

 var state = request.readyState;
    var status = request.status;
    var statusText = request.statusText;

    if(state == 4 && status == 200){
        //console.log(request.reponse);
           var response = JSON.parse(request.response);
            //  var response = request.response;
           //   console.log(response);
//return null;
                if(response.success == 1){
           //         alert("Yes");
$('#user-image').value(null);
                    $('#image-response').html(response.error);
                    setTimeout(function () {

                  $('#image-response').html(' ');

                     } , 2000);
                     setTimeout(function() {
 $('#account-image').css("display" , "none");
                    $('#picture-add').css("backgroundImage" ,  "url(" +imageFolder+"drop-down.png)");


                  } , 1500);

                }

                else {
             //       alert("No");
 $('#image-response').html(response.error);
                    setTimeout(function () {

                  $('#image-response').html(' ');
                    } , 2500);

                }
    }

    else {

        console.log(JSON.stringify({"state" : state , "status" : status , "StatusText" : statusText}));
    }
}

request.open('POST' , '/processors/upload.php' , true);
request.setRequestHeader('Cache-control' , 'no-cache');

//document.getElementById('upload-progress').style.display = 'block';
 $('#image-response').html('<i class="fa fa-circle-o-notch fa-spin" style="font-size:24px"></i>');

request.send(data);

        }




    }

    else {
        e.preventDefault();
        e.stopPropagation();
    }
}

if(window.addEventListener){

window.addEventListener('load' , function () {

var uploadForm = $('#account-image') , imageFile = $('#user-image');


uploadForm.on('submit' , tryUpload);
imageFile.on('change' , isImage);

});
}

else if(window.attachEvent){
window.attachEvent('onload' , function (){


});

}
