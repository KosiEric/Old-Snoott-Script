
$(document).ready(function() {

  /*$(window).bind('beforeunload', function(){
      return 'Are you sure you want to leave?';
    }); */
   var old_price = $('#amount').val();
    if(old_price.length >1 ){
    $('#amount').val(parseInt(old_price));
}
if (document.getElementById('contact-for-price').checked) {
$('#price-container').css('display' , 'none');
}

$('.image-labels').on('click' , function () {
  var background = String($(this).css('background-image'));
  var firstQuote = (background.indexOf("\""))?(background.indexOf("\"")):(background.indexOf("'"));
  var lastQuote = (background.lastIndexOf("\""))?(background.lastIndexOf("\"")):(background.lastIndexOf("'"));
  var url = background.substring(firstQuote  + 1, lastQuote);
  $('#ad-image').attr('src', url);
  $('#ad-image-displayer').fadeIn('slow', function() {
    var randSeconds = Math.floor(Math.random() * 6);
    var timer = setTimeout(function () {

      $('.image-loader').css("display" , "none");
      $('#ad-image').css("display" , "block");
    }, randSeconds * 1000)

    $('#remove-large-icon').click(function() {
      $('#ad-image-displayer').fadeOut('slow' , function () {
          $('.image-loader').css("display" , "inline-block");
          $("#ad-image").css("display" , "none");
      });

    })
  });

})
var titleLength = $('#title-input').val().length;
var remaing = 80 - titleLength;
if(titleLength == 1) {
  $('#char').html("character");
}
$('#text-count').html(remaing);
   //document.getElementById('select-categories').options[0].setAttribute('selected' , 'selected');
  var title = $('#title-input');
  var description = $('#description-box');

  var descriptionPlaceholder = description.attr('placeholder');
var titlePlaceholder  = title.attr('placeholder');
var contactForPrice = $('#contact-for-price');
var price = $('#amount');
title.on("keyup" , function(e) {
    var allowedLength = 80;
    var textLength = $(this).val().length;
    var mathValue = allowedLength - textLength;
    $('#text-count').html("<b>"+mathValue+"</b>");

if(mathValue <= 0){
$("#char").html("characters");
var first80Chars = String($(this).val()).substring(0 , 79);
$(this).val(first80Chars);

}
else if(mathValue == 1){

  $("#char").html("character");
}
else {
  $("#char").html("characters");
}
});
title.on('focus' , function () {
  $(this).removeAttr('placeholder');
  $('#title-tooltip').css('display' , 'inline-block');

});
title.on('blur' , function (){

  $(this).attr('placeholder' , titlePlaceholder);
  $('#title-tooltip').css('display' , 'none');

});

$('#amount').on('focus' , function() {

  $('#price-tooltip').css('display' , 'block');
});

$('#amount').on('blur' , function() {

  $('#price-tooltip').css('display' , 'none');
});

description.on('focus' , function () {
description.removeAttr('placeholder');
$('#description-tooltip').css('display' , 'inline-block');
});
description.on('blur' , function () {

description.attr('placeholder' , descriptionPlaceholder);

$('#description-tooltip').css('display' , 'none');
})

contactForPrice.on('click' , function() {

  if(document.getElementById('contact-for-price').checked){
    $('#price-container').hide();
    $('#price-tooltip').css('display' , 'none');
    $('#amount').val(null);
  }

  else {
    $('#price-container').show();


  }
});



price.on('keyup' , function() {
var priceValue = Number($(this).val());
if(!isNaN(priceValue)){

  $('#price-string').html(priceValue.toLocaleString());
}
else {
  $('#price-string').html(null);
}
});

function trim(x) {
    return x.replace(/^\s+|\s+$/gm,'');
}

function isTitle () {

  var title = $('#title-input').val();
  $('#title-input').val(trim(title));
  var titleLength = title.length;
  if(titleLength < 10 || titleLength > 80){
    $('#title-tooltip').css("display" , "block");
    return false;
  }
  else {
    $('#title-tooltip').css("display" , "none");
    return true;
  }
}

function isDescription (){

  var description = $('#description-box').val();
  $('#description-box').val(trim(description));
  var descriptionLength = description.length;
  if(descriptionLength < 50 || descriptionLength > 10000){
    $('#description-tooltip').css("display" , "block");

    return false;
  }
  else {

      $('#description-tooltip').css("display" , "none");
    return true;
  }
}

function isPrice() {

  if(document.getElementById('contact-for-price').checked){
  $('#price-tooltip').css('display' , 'none');

    return true;
  }
  else {
    if(isNaN(trim(document.getElementById('amount').value)) || document.getElementById('amount').value == '' ||
    $('#price-string').text() == ""){
    $('#price-tooltip').css('display' , 'block');
      return false;

  }
  else {
    $('#price-tooltip').css('display' , 'none');
      return true;

  }

}

}



$('#clear-fields').on('click' , function () {
  $('.clearables').val(null);
  document.getElementById('contact-for-price').checked = false;
  $('#price-container').css("display" , "block");
  $('#amount').val(null);
  $('#price-string').html(null);



  });

$('#ad-form').on('submit' , function (e){
e.preventDefault();
e.stopPropagation();
$(window).off('beforeunload');
// && isPicture1() && isPicture2() && isPicture3() && isPicture4() && isPicture5()
if(isTitle() && isDescription() && isPrice()){
  var List = document.getElementById("select-categories");
     var subCat = document.getElementById("select-subcategories");
var category = List.options[List.selectedIndex].value;
var subCategory = subCat.options[subCat.selectedIndex].text;
var title = $('#title-input').val();
var description = $('#description-box').val();
var price = (document.getElementById('contact-for-price').checked)?"Contact for price":$('#price-string').text();
var negotiable;
if(document.getElementById('contact-for-price').checked) {
negotiable = 'false';
}
else if(document.getElementById('negotiable').checked){
  negotiable = 'true';
}
else {
  negotiable = 'false';
}
var id = $('#submit-button').attr('data-ad_id');

var jsonData = JSON.stringify({"category" : category , subCategory : subCategory , title : title ,
description : description , price : price , negotiable : negotiable , id : id
});
console.log(jsonData);

  //$('#form-field').prop('disabled', 'disabled');



//var response = request.response;
//console.log(response);
var submitValue = $('#submit-button').html();
$('#submit-button').html('<i class="fa fa-circle-o-notch fa-spin"></i>');
$.post('/processors/edit-ad.php', {data:jsonData}, function(reply, textStatus, xhr) {
var response = JSON.parse(reply);

  if(response.success == 1){
    $('#submit-button').html('Ad posted');
     $('#ad-posted-alert').prepend(response.error);
    $('#ad-posted-alert').slideDown('slow', function() {
        $('#remove-alert-icon').click(function() {
    $('#ad-posted-alert').slideUp('slow' , function () {

        window.location.href = '/profile';
    });

        });
    var timeOut = setTimeout(function() {
    $('#ad-posted-alert').slideUp('slow' , function () {

        window.location.href = '/profile';
    });


    }, 3000);

    });
  }

  else {
    $('#submit-button').html(submitValue);
    $('#form-field').removeProp('disabled');
    $('#ad-posted-alert').prepend(response.error);
   $('#ad-posted-alert').slideDown('slow', function() {
       $('#remove-alert-icon').click(function() {
   $('#ad-posted-alert').slideUp('slow');

       });
   var timeOut = setTimeout(function() {
   $('#ad-posted-alert').slideUp('slow');


   }, 3000);

   });
  }
});
//return null;

}





}



);
});
