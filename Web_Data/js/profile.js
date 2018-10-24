$(document).ready(function () {

    $('#user-profile-image').on('click' , function (){

        $('#large-profile-image-container').fadeIn('slow', function() {
            $('#cancel-large-image').on('click' , function (){
 $('#large-profile-image-container').fadeOut('slow');

            });
        });
    });
    $('#ads-toggle').on('click' , function () {

      $(this).css("background-color" , "rgba(210, 210, 210, 0.4)");
       $('#favorites-toggle').css("background-color" , "#fff");
$('#post-loader').text(null);
     $("#ads-main").css("display" , "block");
     $("#favorites-ads-container").css("display" , "none");

    });
    $('#favorites-toggle').on('click' , function () {
      $('#post-loader').html(null);
      $(this).css("background-color" , "rgba(210, 210, 210, 0.4)");
       $('#ads-toggle').css("background-color" , "#fff");
        $("#ads-main").css("display" , "none");
       $("#favorites-ads-container").css("display" , "block");

    });

});


    $(window).scroll(function(event) {
      if($(window).scrollTop() == ($(document).height() - $(window).height()) && document.getElementById('post-span') 
        && $('#confirm-load').attr('data-loaded') == 'true') {
       // alert('scrolled');
      $('#confirm-load').attr('data-loaded' , 'false');
        if($('#ads-main').css("display") == "block") {
          
         var adLast = $('#post-span').attr("data-ad-last");
         var adNext = adLast + 10;
         var username = $('#post-span').attr("data-username");
         var dataObject = {last : adLast , username : username};
         var data = JSON.stringify(dataObject);
         if(String($("#post-loader").text()).toLowerCase() != "no data") {
         $('#post-loader').attr("class" , "fa fa-circle-o-notch fa-spin");
         $.post('/processors/load-ads.php', {data:data}, function(data, textStatus, xhr) {


           if(String(data).indexOf('<a') >= 0) {

             $('#post-loader').attr("class" , null);
$('#ads-container').append(data);

$('#post-span').attr('data-ad-last', adNext);
setTimeout(function () {

$('#confirm-load').attr('data-loaded' , 'true');
} , 2500);

           }
           else {

           $('#post-loader').attr("class" , null);
$('#post-loader').html("No data");

           }
         });
         }
         else {

         }
        }

        else if($("#favorites-ads-container").css("display") == "block") {
        
          var adLast = Number($('#post-span').attr("data-favorites-last"));
          var adNext = adLast + 10;
        // alert(adNext);
          var username = $('#post-span').attr("data-username");
          var dataObject = {last : adLast , username : username};
          var data = JSON.stringify(dataObject);
          if(String($("#post-loader").text()).toLowerCase() != "no data") {
          $('#post-loader').attr("class" , "fa fa-circle-o-notch fa-spin");
          $.post('/processors/load-favorites.php', {data:data}, function(data, textStatus, xhr) {


            if(String(data).indexOf('<a') >= 0) {

              $('#post-loader').attr("class" , null);
          $('#favorites-ads-container').append(data);
          $('#post-span').attr('data-favorites-last', adNext);
         setTimeout(function () {

$('#confirm-load').attr('data-loaded' , 'true');
} , 2500);
            }
            else {

              $('#post-loader').attr("class" , null);
          $('#post-loader').html("No data");

            }
          });
          }
          else {

          }
        }

      }
      else if($('#post-span')) {

      }
    });
