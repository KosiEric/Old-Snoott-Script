var sub = {};
sub['Home&Furnitures'] = ["Furniture" , "Home Accessories" , "Home Appliances" , "Kitchen & Dining" , "Kitchen Appliances"];
sub["Electronics&Video"] = ["Audio and Music Equipment" , "Cameras, Video Cameras and Accessories" , "Computer Accessories" ,
"Computer Hardware" , "TV & DVD Equipment" , "Video Game Consoles" , "Video Games"
];
sub["Phones&Tablets"] = ["Accessories" , "Mobile Phones" , "Tablets"];
sub["laptops&computers"] = ["Laptops" , "Desktop" , "Mini Laptop"];
sub["fashion&clothes"] = ["Clothing & Shoes" , "Watches" , "Jewelry" , "Accessories"];
sub["Hostels&Lodges"] = ["Hostels" , "Lodges"];
sub["Books&Archive"] = ["Text Books"  , "Inspirational books" , "Imspirational CD's" , "Marvel" , "Religious" , "Musical"];


function changeSubCategoryList () {

  var List = document.getElementById("select-categories");
     var subCat = document.getElementById("select-subcategories");

var hiddenContents = $('#hidden-div-content');
     var selCar = List.options[List.selectedIndex].value;
     var noCategory = "---No category choosen---";

     if(selCar == ''){
       $('#select-subcategories').attr("disabled" , "disabled");
$('#select-subcategories').css({"background-color": "rgb(236, 238, 239)" , "cursor" :"not-allowed"});
       var c = document.createElement("option");
       c.text = noCategory;
 c.value = "";
        var i =0;
subCat.innerHTML = "";
subCat.options.add(c, 0);
   }

   else {
     $('#select-subcategories').removeAttr('disabled');
$('#select-subcategories').css({"background-color" : "#fff" , "cursor" : "pointer"});
     while (subCat.options.length) {
         subCat.remove(0);
     }
     var dropDown = sub[selCar];
     if (dropDown) {
         var i;
         for (i = 0; i < dropDown.length; i++) {
             var car = new Option(dropDown[i], i);
             subCat.options.add(car);
         }


     }
}

var subCat = document.getElementById("select-subcategories");
var selectedValue = subCat.options[subCat.selectedIndex].text;
if(selectedValue == noCategory){
hiddenContents.slideUp('slow');
subCat.setAttribute('disabled' , 'disabled');

$('#submit-button').css('display' ,'none');
}
else {
  hiddenContents.slideDown('slow');
  $('#submit-button').css('display' ,'block');
  $('#select-subcategories').removeAttr('disabled');
}
}
function readURL(input , label) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                label.css("background-image"  ,  "url("+e.target.result+")");
            }

            reader.readAsDataURL(input.files[0]);
        }
    }

    function isImageSize (elemID) {
if(document.getElementById(elemID).size <= 5120000){
  return true;
}
else
{
  return false;
}
    }

    function isImageType (elemID){
      var imageFileInput = document.getElementById(elemID);
      var imageFile = imageFileInput.value;
      var lastIndexOfDot =imageFile.toString().lastIndexOf('.');
      var format = String(imageFile).substring(lastIndexOfDot + 1);


      if(format == 'jpg' || format == 'png' || format == 'jpeg'){
return true;
    }

    else {
      return false;
    }
  }

$(document).ready(function() {

  $(window).bind('beforeunload', function(){
      return 'Are you sure you want to leave?';
    });
  if(window.FormData){

    $('#hidden-div-content').css("display" , "none");
    $('#submit-button').css("display" , "none");
  }
   var old_price = $('#amount').val();
    if(old_price.length >1 ){
    $('#amount').val(parseInt(old_price));
}
if (document.getElementById('contact-for-price').checked) {
$('#price-container').css('display' , 'none');

}

if(2) {
  $('.image-labels').css('backgroundImage' , 'url("")');
  $('.imageFiles').val(null);
}
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

$('#image1').on("change" , function() {

  inp = document.getElementById('image1');
  readURL(inp , $('#image1-label'));
if(isImageType('image1')){
  $('#image1-camera').css("visibility" , "hidden");
}
else {
  $('#image1-camera').css("visibility" , "visible");

}
});

$('#image2').on("change" , function() {

  inp = document.getElementById('image2');
  readURL(inp , $('#image2-label'));
if(isImageType('image2')){
  $('#image2-camera').css("visibility" , "hidden");

}
else {
  $('#image2-camera').css("visibility" , "visible");

}
});

$('#image3').on("change" , function() {

  inp = document.getElementById('image3');
  readURL(inp , $('#image3-label'));
if(isImageType('image3')){
  $('#image3-camera').css("visibility" , "hidden");

}
else {
  $('#image3-camera').css("visibility" , "visible");

}
});/*
$('#image4').on("change" , function() {

  inp = document.getElementById('image4');
  readURL(inp , $('#image4-label'));
if(isImageType('image4')){
  $('#image4-camera').css("visibility" , "hidden");
}
else {
  $('#image4-camera').css("visibility" , "visible");

}
});

$('#image5').on("change" , function() {

  inp = document.getElementById('image5');
  readURL(inp , $('#image5-label'));
if(isImageType('image5')){
  $('#image5-camera').css("visibility" , "hidden");

}
else {
  $('#image5-camera').css("visibility" , "visible");

}
});

*/
function isSelected () {
  var List = document.getElementById("select-categories");
     var subCat = document.getElementById("select-subcategories");
     subSelected = subCat.options[subCat.selectedIndex].text;

var hiddenContents = $('#hidden-div-content');
     var selCar = List.options[List.selectedIndex].value;
     var noCategory = "---No category choosen---";

     if(selCar == '' || subSelected == noCategory){
       return false;
}
else {
  return true;
}
}
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


function isPicture1() {
if(isImageType('image1') && isImageSize('image1')){
  $('#image-tooltip').css("display" , "none");

  return true;
}
else {
  $('#image-tooltip').html("error in photo 1");
$('#image-tooltip').css("display" , "block");
  return false;
}

}
function isPicture2() {
if(isImageType('image2') && isImageSize('image2')){
  $('#image-tooltip').css("display" , "none");

  return true;
}
else {
  $('#image-tooltip').html("error in photo 2");
$('#image-tooltip').css("display" , "block");
  return false;
}

}
function isPicture3() {
if(isImageType('image3') && isImageSize('image3')){
  $('#image-tooltip').css("display" , "none");

  return true;
}
else {
  $('#image-tooltip').html("error in photo 3");
$('#image-tooltip').css("display" , "block");
  return false;
}

}

$('#image3-label').on("mousemove" , function() {

  $('#image3-camera').css("visibility" , "visible");

});
$('#image3-label').on("mouseleave" , function() {

  inp = document.getElementById('image3');
if(isImageType('image3')){

  $('#image3-camera').css("visibility" , "hidden");
}

});
$('#image2-label').on("mousemove" , function() {

  $('#image2-camera').css("visibility" , "visible");

});
$('#image2-label').on("mouseleave" , function() {

  inp = document.getElementById('image2');
if(isImageType('image2')){

  $('#image2-camera').css("visibility" , "hidden");
}

});
$('#image1-label').on("mousemove" , function() {

  $('#image1-camera').css("visibility" , "visible");

});
$('#image1-label').on("mouseleave" , function() {

  inp = document.getElementById('image1');
if(isImageType('image1')){

  $('#image1-camera').css("visibility" , "hidden");
}

});
$('#clear-fields').on('click' , function () {
  document.getElementById('ad-form').reset();

  document.getElementById('contact-for-price').checked = false;
  $('#price-container').css("display" , "block");
  $('#amount').val(null);
  $('#price-string').html(null);

  changeSubCategoryList();
  $('.image-labels').css('background-image' , 'none');
  $('.imageFiles').val(null);
  $('.label-camera').css("visibility" , "visible");

  });

$('#ad-form').on('submit' , function (e){
//e.preventDefault();

if($('#opera-warning').css('display') == 'block') {

var screenheight = window.screen.availHeight;

newScroll = Math.round((24/100) * screenheight);
console.log(newScroll);
window.scrollTo(0 , newScroll);

}
$(window).off('beforeunload');
// && isPicture1() && isPicture2() && isPicture3() && isPicture4() && isPicture5()
if(isSelected() && isTitle() && isDescription() && isPrice() && isPicture1() && isPicture2() && isPicture3()){
  //alert("it is");
  if($('#opera-warning').css('display') == 'block') {

var screenheight = window.screen.availHeight;

newScroll = Math.round((95/100) * screenheight);
console.log(newScroll);
window.scrollTo(0 , newScroll);

}
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


var jsonData = {category : category , subCategory : subCategory , title : title ,
description : description , price : price , negotiable : negotiable
};
rawData = JSON.stringify(jsonData);
console.log(rawData);
var jsonArray = ["category"  , "subCategory" , "title" , "description" , "price" , "negotiable"];
if(window.FormData){
  e.preventDefault();
  e.stopPropagation();
  $('#form-field').prop('disabled', 'disabled');

  picture1 = document.getElementById('image1').files[0];
  picture2 = document.getElementById('image2').files[0];
  picture3 = document.getElementById('image3').files[0];
  //picture4 = document.getElementById('image4').files[0];
  //picture5 = document.getElementById('image5').files[0];

var request;
var data;

data = new FormData();

for (var i = 0; i < jsonArray.length;  ++i) {
  data.append(jsonArray[i] ,  jsonData[jsonArray[i]]);
}
data.append('file[]' , picture1);
data.append('file[]' , picture2);
data.append('file[]' , picture3);
//data.append('file[]' , picture4);
//data.append('file[]' , picture5);
if(window.XMLHttpRequest){
  request = new XMLHttpRequest();
}
else {
  request = new ActiveXObject("Microsoft.XMLHTTP");
}

request.upload.addEventListener('progress' , function (e){
  if(e.lengthComputable){
    var ratio = Math.round((e.loaded / e.total) * 100);

     var percentage = ratio + " %";
      $('#progress-bar-inside').css("width" , ratio + "%");
      $('#progress-reader').html(percentage);
  }
});
request.upload.addEventListener('load' , function () {
  $('#progress-bar-inside').css("width" ,  "0%");
  $('#progress-reader').html(null);
  $('#progress-bar').css("display" , "none");
  
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


  }, 1000);

  });

});

request.onreadystatechange = function () {
var status = this.status;
var state = this.readyState;
var statusText = this.statusText;

if(status == 200 && state == 4 && statusText == "OK"){
//var response = request.response;
//console.log(response);
var response = JSON.parse(request.response);
//return null;
if(response.success == 1){
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


  }, 1000);

  });
}

else {
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
}

else {

  console.log(JSON.stringify({"status " : status , "state " : state , "statusText" : statusText}));
}

}


request.open("POST" , "/processors/ad_with_javascript.php" , true);
request.setRequestHeader("Cache-control" , "no-cache");
$('#progress-bar').css("display" , "block");
request.send(data);

}

else{
    e.preventDefault();
    e.stopPropagation();
  $.post('/processors/submit_without_javascript.php', {data: rawData} , function(response, textStatus, xhr) {
if(response == "ok") {
  document.getElementById('ad-form').submit();
}

}) }



}

else {
  e.preventDefault();
  e.stopPropagation();
}
}

);
});
