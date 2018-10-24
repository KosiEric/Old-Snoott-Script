$(document).ready(function(){

$('#show_email_box_button').on('click' , function () {
    var originalValue = $(this).html();
    $(this).html('<i class="fa fa-circle-o-notch fa-spin" style="font-size:24px;border:none;"></i>');

$.post('/processors/confirm_email.php', {email: 'true'}, function(data, textStatus, xhr) {
    var post =  $.parseJSON(data);
    //console.log(post);
    //return null;
    if(post.success == '1'){
        $('#show_email_box_button').attr('disabled' , 'disabled');
        $('#show_email_box_button').html(originalValue);
        $('#verify_email_alert_text').html("E-mail verification link sent to " + post.email);

        setTimeout(function () {
 $('#verify_email_alert_box').fadeOut('slow');

        } , 2500);
       
    }

    else {
$('#show_email_box_button').html('Try again?');
        $('#verify_email_alert_text').html(post.error);

    }
    });

   // $('#show_email_box_button').attr('disabled' , 'disabled');

});

});