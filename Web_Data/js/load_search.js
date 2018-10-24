$(document).ready(function () {
var start = $('#first-search-loader').attr("data-start"); 
var start = $('#first-search-loader').attr('data-start');
var numAds = Number($('#first-search-loader').attr('data-num-ads'));
var next = Number(start) + numAds;

//alert(numAds);
var next = Number(start) + numAds;
$('#first-search-loader').attr('data-loaded' , 'false');
$.post('/processors/load_search.php', {start: start}, function(data, textStatus, xhr) {
    if(String(data).indexOf('<a') >= 0) {

$('#first-search-loader').attr('data-start' , next);
        $('#first-search-loader').css('display' , 'none');
    $('#ads-container').append(data);
    setTimeout(function () {

$('#first-search-loader').attr('data-loaded' , 'true');

    } , 1500);
    }

    else {
$('#first-search-loader').html('No data');
     setTimeout(function () {

$('#first-search-loader').attr('data-loaded' , 'true');

    } , 1500);
   

    }
});

$(window).scroll(function(event) {
      if($(window).scrollTop() == ($(document).height() - $(window).height())  &&
      String($('#first-search-loader').text()).toLowerCase() != 'no data' && $('#first-search-loader').attr('data-loaded') == 'true') {
    $('#first-search-loader').attr('data-loaded' , 'false');
$('#first-search-loader').css('display' , 'block');
var start = $('#first-search-loader').attr('data-start');
var numAds = Number($('#first-search-loader').attr('data-num-ads'));
//alert(numAds);
var next = Number(start) + numAds;
$.post('/processors/load_search.php', {start : start}, function(data, textStatus, xhr) {
  

  if(String(data).indexOf('<a') >= 0){
$('#ads-container').append(data);
$('#first-search-loader').attr('data-start' , next);
$('#first-search-loader').css('display' , 'none');

setTimeout(function () {

$('#first-search-loader').attr('data-loaded' , 'true');
} , 2500);
//alert("Next : " + $('#post-span').attr('data-ad-last'));
  }

  else {

$('#first-search-loader').text('No data');
  }
});


        }
    });


});


