$(document).ready(function () {

$.post('/processors/home-ads.php', {data: 'data'}, function(data, textStatus, xhr) {
    console.log(data);
$('#ads-container').append(data);
if(String(data).indexOf('<a') < 0) {
$('#empty-response').css('display' , 'block');    
}
$('#first-loader-span').css('display' ,'none');
setTimeout(function () {

$('#confirm-load').attr('data-loaded' , 'true');
} , 2500);
});


});

$(window).scroll(function(event) {
      if($(window).scrollTop() == ($(document).height() - $(window).height())  &&
       document.getElementById('post-span') && $('#confirm-load').attr('data-loaded') == 'true') {
    $('#confirm-load').attr('data-loaded' , 'false');
$('#post-loader').attr('class' , 'fa fa-circle-o-notch fa-spin');
var last = Number($('#post-span').attr('data-ad-last'));

var numAds = Number($('#first-loader-span').attr('data-num-ads'));
//alert(numAds);
var next = Number(last) + numAds;
//alert(next);
var dataObject  = {next : last , num_ads : numAds};
var data = JSON.stringify(dataObject);

$.post('/processors/load-more-home.php', {data : data}, function(data, textStatus, xhr) {
  if(String(data).indexOf('<a') >= 0){
$('#ads-container').append(data);
$('#post-span').attr('data-ad-last' , next);

$('#post-loader').attr('class' , null);
$('#first-loader-span').css('display' ,'none');
setTimeout(function () {

$('#confirm-load').attr('data-loaded' , 'true');
} , 2500);

//alert("Next : " + $('#post-span').attr('data-ad-last'));
  }

  else {

$('#post-span').text('No data');
  }
});


        }
    })
