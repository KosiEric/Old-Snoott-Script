$(document).ready(function () {
var category = $("#first-loader-span").attr("data-category");
//var state = $('#post-span').attr('data-state');
var dataObject = { category : category , state : "*"};
data = JSON.stringify(dataObject);
$.post('/processors/category-ads.php', {data: data}, function(data, textStatus, xhr) {

$('#ads-container').append(data);
if(String(data).indexOf('<a') < 0) {
$('#no-data').css('display' , 'block');
}

else {
   $('#no-data').css('display' , 'none');
    $('#filter-container').css('display' , 'block');
}
$('#first-loader-span').css('display' ,'none');
setTimeout(function () {

$('#confirm-load').attr('loaded' , 'true');
} , 2500);
});

$('#search-filter').on('change' , function() {
var states = document.getElementById('search-filter');
if(document.getElementById('post-span')) {
    $('#post-span').text(null);
}

$('#confirm-load').attr('loaded' , 'false');
var state = states.options[states.selectedIndex].text;
$('.ad-user-links').css('display' , 'none');
$('#first-loader-span').css('display' ,'block');
$('#no-data').css('display' , 'none');
$('#post-span').attr({'data-ad-last' : '10' , 'data-state' : state});

var category = $("#first-loader-span").attr("data-category");
//var state = $('#post-span').attr('data-state');
var dataObject = {state : state , category : category};
data = JSON.stringify(dataObject);
$.post('/processors/category-ads.php', {data: data}, function(data, textStatus, xhr) {

$('#ads-container').append(data);
if(String(data).indexOf('<a') < 0) {
$('#no-data').css('display' , 'block');
}

else {
   $('#no-data').css('display' , 'none');
   // $('#filter-container').css('display' , 'block');
}
$('#first-loader-span').css('display' ,'none');
setTimeout(function () {

$('#confirm-load').attr('loaded' , 'true');
} , 2500);


$('#first-loader-span').css('display' ,'none');
});

});


$(window).scroll(function(event) {
      if($(window).scrollTop() == ($(document).height() - $(window).height())  &&
       document.getElementById('post-span') && $('#confirm-load').attr('loaded') == 'true') {
    $('#confirm-load').attr('loaded' , 'false');
$('#first-loader-span').css('display' , 'block');
var last = $('#post-span').attr('data-ad-last');
state = $('#post-span').attr('data-state');
var numAds = Number($('#first-loader-span').attr('data-num-ads'));
//alert(numAds);
var next = Number(last) + numAds;
category = $('#post-span').attr('data-category');
var state = $('#post-span').attr('data-state');
var dataObject  = {next : last , num_ads : numAds , category : category , state : state};
var data = JSON.stringify(dataObject);
console.log(data);
$.post('/processors/load-more-category.php', {data : data}, function(data, textStatus, xhr) {
  
$('#first-loader-span').css('display' ,'none');
  if(String(data).indexOf('<a') >= 0){
$('#ads-container').append(data);
$('#post-span').attr('data-ad-last' , next);
$('#post-loader').attr('class' , null);

setTimeout(function () {

$('#confirm-load').attr('loaded' , 'true');
} , 2500);
//alert("Next : " + $('#post-span').attr('data-ad-last'));
  }

  else {

$('#post-span').text('No data');
  }
});


        }
    });
})