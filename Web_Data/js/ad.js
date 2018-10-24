   function isEmail(email ) {
var emailInput = email;
var email = emailInput.val();
var emailExp = /^([a-zA-Z0-9_\-\.]+)@([a-zA-Z0-9_\-\.]+)\.([a-zA-Z]{2,5})$/;
if(emailExp.test(email)) {




emailInput.css('border' , '1px solid skyblue');
return true;



}

else {

emailInput.css('border' , '1px solid #ff3333');
return false;

}

   }

   function isName (name, error) {
    var fullnameInput = name;
    var fullname = fullnameInput.val();

    var nameRegExp = /^[a-zA-Z ]*$/;
    if(nameRegExp.test(fullname) && fullname.length > 3 && fullname.indexOf(' ') > 0 && fullname.indexOf(' ') != fullname.length - 1) {
name.css('border' , '1px solid skyblue');
error.css('display' , 'none');
        return true;
    }

    else {

name.css('border' , '1px solid #ff3333');
$('#email-fullname-warning').css('display' , 'block');
return false;
    }
}

function isMessage(message , warning) {

  if(message.val().length < 20 || message.val().length > 5000) {
    warning.css('display' , 'block');
    message.css('border' , '1px solid #ff3333');
   return false;
  }

  else {
    warning.css('display' , 'none');
    message.css('border' , '1px solid skyblue');
   return true;
  }
}

 function isPhone (phone) {
   var imageFolder = "/images/";
    var contactInput = phone;
    var contact = contactInput.val();

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
phone.css('border' , '1px solid #ff3333');
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
phone.css({'background-image'  : 'url('+imageFolder+networkImage+')'
, 'border' : '1px solid skyblue'
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

phone.css({'border' : '1px solid #ff3333' ,
'background-image' : 'url('+imageFolder+'telephone.png)'});
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

    networkImage = 'telephone.png';
    break;
}

phone.css({'background-image' : 'url('+imageFolder+networkImage+')'
, 'border' : '1px solid skyblue'
});
return true;

}


    }

    else {

phone.css({'border' : '1px solid #ff3333',
'background-image' : 'url('+imageFolder+'telephone.png)'
});
return false;
    }
}




function showZoom(){
  var url = $('#ad-image').attr('src');
  $('#overlay').css({"background-image" : "url('"+url+"')" , "background-size" : "cover"});

  $('#overlay').css({"display" : "inline-block"});

}

function hideZoom () {
  $('#overlay').css({"display" : "none" , "background-size" : null});
}
function zoomIn(event){

  var url = $('#ad-image').attr('src');
  $('#overlay').css("background-image" , "url('"+url+"')");

  $('#overlay').css({"display" : "inline-block"});

  var element = document.getElementById("overlay");
   //element.style.display = "inline-block";
   var img = document.getElementById("ad-image");
//- img.offsetLeft;
// - img.offsetTop;
var posX = event.offsetX ? (event.offsetX) : event.pageX - img.offsetLeft;
var posY = event.offsetY ? (event.offsetY) : event.pageY - img.offsetTop;
element.style.backgroundPosition=(-posX*2)+"px "+(-posY*4)+"px";

 }

 function zoomOut() {
  var element = document.getElementById("overlay");
  element.style.display = "none";
}
$(document).ready(function() {

$('#ad_poster_link').on('mouseenter' , function () {
    var randomNumber = Math.floor(Math.random() * 6);
    $('#poster-profile-loader').css('display' , 'inline-block');
    var timer = setTimeout(function () {

      $('#poster-profile-loader').css('display' , 'none');
      $('#short-poster-profile-details').slideDown('4000', function() {
       $(this).on('mouseleave' , function() {
         $(this).slideUp('4000');
       })
      });
    } , randomNumber * 1000);
  })
  var adPhotosArray = $("#photostorage").attr("data-ad-images").split(",");
  var adImageFolder = "/posts_images/";
  var photos = {0 : adPhotosArray[0] , 1 : adPhotosArray[1] , 2 : adPhotosArray[2] , 3: adPhotosArray[3] , 4 : adPhotosArray[4] }
  $('#photo-front').click (function() {
  //  showZoom();
    $('.small-ad-images').css('border' , 'none');

  var currentImage = $(this).attr("data-current-image");
  var imageNumber = Number(currentImage);
  var totalImages =  Number($('.small-ad-images').length);
  if(imageNumber == totalImages - 1) {
    var next = 0;
    var imageID = String('small-image-'+Number(next+1));
   
    document.getElementById(imageID).style.border = "1px solid skyblue";

    $('#ad-image').attr("src" , adImageFolder+photos[next]);
    $('.photo-shifter').attr('data-current-image' , '0');
  }
  else {
    var next = imageNumber + 1;
    var imageID = String('small-image-'+Number(next+1));
   // console.log(imageID);

    document.getElementById(imageID).style.border = "1px solid skyblue";

    $('#ad-image').attr("src" , adImageFolder+photos[next]);
    $('.photo-shifter').attr('data-current-image' , String(next));

  }

});
$('#photo-back').click (function() {
  //showZoom();
var currentImage = $(this).attr("data-current-image");
var imageNumber = Number(currentImage);
var totalImages =  Number($('.small-ad-images').length);
 
$('.small-ad-images').css('border' , 'none');
if(imageNumber == 0) {
  var next = totalImages -1;
  $('#ad-image').attr("src" , adImageFolder+photos[next]);
  $('.photo-shifter').attr('data-current-image' , String(next));

  var imageID = String('small-image-'+Number(next+1));
   console.log(imageID);
  document.getElementById(imageID).style.border = "1px solid skyblue";
}
else {

  var next = imageNumber - 1;

  var imageID = String('small-image-'+Number(next+1));
  console.log(imageID);
  document.getElementById(imageID).style.border = "1px solid skyblue";
  $('#ad-image').attr("src" , adImageFolder+photos[next]);
  $('.photo-shifter').attr('data-current-image' , String(next));

}


});

$('#ad-image').on('click' , function () {
  $('#ad-image-displayer').fadeIn('slow', function() {
    var randSeconds = Math.floor(Math.random() * 6);
    var timer = setTimeout(function () {

      $('.image-loader').css("display" , "none");
        var url = $('#ad-image').attr("src");

$('#ad-image-zoom').attr("src" , url);
      $('#ad-image-zoom').css("display" , "block");


      $("#overlay").hide();
    }, randSeconds * 1000)

    $('#remove-large-icon').click(function() {
      $('#ad-image-displayer').fadeOut('slow' , function () {
          $('.image-loader').css("display" , "inline-block");
          $("#ad-image-zoom").css("display" , "none");


          });
      });

    })
  });

$('.small-ad-images').on('click' , function () {
var imageNumber = $(this).attr('data-image-num');
var currentImage = $(this).attr('data-current-image');
$('#ad-image').attr("src" , "/posts_images/"+currentImage);
$('.photo-shifter').attr("data-current-image" , imageNumber);
$('.small-ad-images').css('border' , 'none');
$(this).css('border' , '1px solid skyblue');
});
$('#span-contact-details').on('click' , function () {
var type = $(this).attr('data-drop');
if(type == "down"){
  $('#contact-details-div').slideDown('slow');
  $('#up-or-down').attr('class' , 'fa fa-chevron-up');
  $(this).attr('data-drop' , 'up');
  $('#show-text').html("hide contact details");
}
else {
  $('#contact-details-div').slideUp('slow');
  $('#up-or-down').attr('class' , 'fa fa-chevron-down');
  $(this).attr('data-drop' , 'down');
  $('#show-text').html("show contact details");
}
});

$('#LikeOrDislike').on('click' , function () {
  var action  = $(this).attr('data-action');
  var username = $(this).attr('data-username');
  var id = $(this).attr('data-id');
  var dataObject = {username : username , id : id , action : action}
  var data = JSON.stringify(dataObject);
  var new_like = (action == "like")?Number($('#number-of-likes').text()) + 1:Number($('#number-of-likes').text()) - 1;
    $(this).attr('disabled', 'disabled');
  $.post('/processors/like.php', {data: data}, function(res, textStatus, xhr) {
    //console.log(res);
    //return null;
    var response = JSON.parse(res);
      if(response.success == 1){
    //  $('#LikeOrDislike').removeAttr('disabled');
      //$('#LikeOrDislike').html(response.error);
      var title = (response.error == "dislike")?"Dislike":"Like";
      $('#LikeOrDislike').attr({'data-action' : response.error , 'title' : title});

       $('#number-of-likes').text(new_like);
       if(response.error =="dislike"){
         $('#like-icon').attr('class' , 'fa fa-check');
         $('#LikeOrDislike').css('background-color' , 'rgb(64, 128, 255)');
         $('#LikeOrDislike').on('mouseenter' , function () {
           $(this).css("border"  , "1px solid rgb(64, 128, 255)");
         });

       }
       else {
         $('#LikeOrDislike').css("background-color" , "#4267b2");
         $('#like-icon').attr('class' , 'fa fa-thumbs-up');
$('#LikeOrDislike').on('mouseenter' , function () {
  $(this).css("border" , "#4267b2");
});

       }

}

else {
  $('#LikeOrDislike').removeAttr('disabled');
  //$('#LikeOrDislike').html(response.error);
  $('#LikeOrDislike').attr('data-action' , response.error);

}
  });

});
$('#LikeOrDislike').on('mouseleave' , function() {
  $(this).css('border' , 'none');
});
$('#FavoriteOrUnfavorite').on('mouseleave' , function() {
  $(this).css('border' , 'none');
});

$('#FavoriteOrUnfavorite').on('click' , function () {
  var action  = $(this).attr('data-action');

  var username = $(this).attr('data-username');
  var id = $(this).attr('data-id');
  var dataObject = {username : username , id : id , action : action}
  var data = JSON.stringify(dataObject);
  var new_like = (action == "favorite")?Number($('#count-of-favorites').text()) + 1:Number($('#count-of-favorites').text()) - 1;
    $('#FavoriteOrUnfavorite').attr('disabled', 'disabled');
  $.post('/processors/favorite.php', {data: data}, function(res, textStatus, xhr) {
    var response = JSON.parse(res);
      if(response.success == 1){
      //$('#FavoriteOrUnfavorite').removeAttr('disabled');
      //$('#LikeOrDislike').html(response.error);
      var title = (response.error == "unfavorite")?"unFavorite":"Favorite";
      $('#FavoriteOrUnfavorite').attr({'data-action' : response.error , 'title' : title});

       $('#count-of-favorites').text(new_like);
       if(response.error =="unfavorite"){
         $('#favorite-icon').attr('class' , 'fa fa-check');
         $('#FavoriteOrUnfavorite').css('background-color' , 'rgb(64, 128, 255)');
         $('#FavoriteOrUnfavorite').on('mouseenter' , function () {
           $(this).css("border"  , "1px solid rgb(64, 128, 255)");
         });
       }
       else {
         $('#favorite-icon').attr('class' , 'fa fa-star');
         $('#FavoriteOrUnfavorite').css("background-color" , "#4267b2")
$('#FavoriteOrUnfavorite').on('mouseenter' , function () {
  $(this).css("border" , "#4267b2");
});

       }

}

else {
  $('#FavoriteOrUnfavorite').removeAttr('disabled');
  //$('#LikeOrDislike').html(response.error);
  $('#FavoriteOrUnfavorite').attr('data-action' , response.error);

}
  });

});
$('#message-fullname').on('keyup' , function () {
  isName($('#message-fullname') , $('#message-fullname-warning'));
});
$('#message-message').on('keyup' , function () {
  isMessage($('#message-message') , $('#message-message-warning'));
});
$('#message-phone').on('keyup' , function () {
  isPhone($('#message-phone'));
});

$('#message-email').on('keyup' , function () {
  isEmail($('#message-email'))
});
$('#send-message-hide-div').on('click' , function () {
  var dataSent = $(this).attr('data-already-sent');
  if(dataSent == "false") {
    if($('#send-message-form').css('display') == 'none') {
      $('#send-message-form').slideDown('slow');
    }
    else {
      $('#send-message-form').slideUp('slow');
    }
  }
});

$('#send-message-form').on('submit' , function (e) {
e.preventDefault();

  if(isName($('#message-fullname') , $('#message-fullname-warning')) && isEmail($('#message-email')) && isPhone($('#message-phone'))
&& isMessage($('#message-message') , $('#message-message-warning'))) {
    $("#form-field").attr("disabled" , "disabled");
  var message = $('#message-message').val();
  var to = $('#send-message-button').attr('data-to');
  var fullname = $('#message-fullname').val();
  var  from = $('#message-email').val();
  var phone = ($('#message-phone').val().length == 11)?$('#message-phone').val(): "0" + String($('#message-phone').val());
  var id = $('#send-message-button').attr('data-id');
  var username = $('#send-message-button').attr('data-username');
  var sendText = $('#message-send-text').text();
  //$('#send-message-form').attr('disabled' , 'disabled');
  var data = JSON.stringify({from : from , username : username , message : message , to : to , fullname : fullname , message : message , phone : phone , id : id});
//console.log(data);
//$('#offline-checker').css('display' , 'none');
    $('#message-send-text').text(null);
    $('#send-message-icon').attr("class" , "fa fa-spinner fa-spin");

    $.post('/processors/send_message.php', {data : data}, function(resp, textStatus, xhr) {
        
   //console.log(JSON.parse(resp));
   //return false;
    var response = JSON.parse(resp);

    if(response.success == 1) {

      $('#message-send-text').text(response.error);
      $('#send-message-hide-div').attr('data-already-sent' , 'true');
      $('#send-message-icon').attr("class" , "fa fa-check");
      $('#send-message-button').attr("title" , "Message sent");
      setTimeout(function () {

        $('#send-message-form').slideUp('slow');
      } , 2000);

    }

    else {

$('#message-send-text').html(response.error);
$('#send-message-icon').attr('class' , 'fa fa-sign-in');
$('#form-field').removeAttr('disabled');
    }


  });


  }
});
$('#flag-button').on('click' , function () {
  var action  = $(this).attr('data-action');

  var username = $(this).attr('data-username');
  var id = $(this).attr('data-id');
  var dataObject = {username : username , id : id , action : action}
  var data = JSON.stringify(dataObject);
  var new_flag = (action == "flag")?Number($('#num-flags').text()) + 1:Number($('#num-flags').text()) - 1;
      $(this).attr('disabled', 'disabled');
  $.post('/processors/flag.php', {data: data}, function(res, textStatus, xhr) {
    //console.log(res);
    //return null;
    var response = JSON.parse(res);
      if(response.success == 1){
      //$('#flag-button').removeAttr('disabled');
      //$('#LikeOrDislike').html(response.error);
      var title = (response.error == "unflag")?"unFlag":"Flag";
      $('#flag-button').attr({'data-action' : response.error , 'title' : title});

       $('#num-flags').text(new_flag);
       if(response.error =="unflag"){
         $('#flag-icon').attr('class' , 'fa fa-check');


       }
       else {
         $('#flag-icon').attr('class' , 'fa fa-flag');


       }

}

else {
  $('#flag-button').removeAttr('disabled');
  //$('#LikeOrDislike').html(response.error);
  $('#flag-button').attr('data-action' , response.error);

}
  });

});

$('#activate-ad-button').on('click' , function () {

  var action = $(this).attr('data-action');

  var new_action = (action == "activate")?"deactivate":"activate";
  $(this).attr('disabled', 'disabled');
  var id = $(this).attr('data-id');
  var dataObject = {action : action , id : id};
  var data = JSON.stringify(dataObject);

    $.post('/processors/activateAd.php', {data: data} , function(resp, textStatus, xhr) {

  var response = JSON.parse(resp);
  if(response.success == 1) {
    $('#activate-ad-button').attr("data-action" , new_action);
//$('#activate-ad-button').removeAttr('disabled');

    if(new_action == 'deactivate') {
      $('#activate-ad-button').attr("title" , "Deactivate this ad");
     $('#activate-ad-button').text("Close ad");
     $('#edit-ad-link').html("Edit This Ad");
     $('#edit-ad-link').attr('href', '/edit-ad/'+id);
     $('#active').html('Available <i class = "fa fa-check-circle" id = "check-active-icon-sold"></i>');
     $('#check-active-icon-sold').css('color' , 'green');
    }
    else {
         $('#active').html('Unavailable <i class = "fa fa-check-circle" id = "check-active-icon-sold"></i>');
         $('#check-active-icon-sold').css('color' , 'black');
        $('#activate-ad-button').attr("title" , "Activate this ad");
        $('#activate-ad-button').text("Activate ad");
        $('#edit-ad-link').html("Ad closed");
        $('#edit-ad-link').attr('href', '#');
        //document.getElementById('edit-ad-link').
    }

  }
  else {
    $('#activate-ad-button').removeAttr('disabled');
    $('#activate-ad-button').text(response.error);
  }

  });

});
$('#renew-ad-button').on('click' , function () {
var id =$(this).attr('data-id');
var dataObject = {id : id};
var data = JSON.stringify(dataObject);
$(this).attr("disabled" , "disabled");
$.post('/processors/renewAd.php', {data : data} , function(resp, textStatus, xhr) {



if(resp.success == 1) {
  $('#renew-ad-button').text(resp.error);
  $('#renew-ad-button').attr("title" , resp.error);
  }
else {
$('#renew-ad-button').removeAttr('disabled');
}
});
})
});
