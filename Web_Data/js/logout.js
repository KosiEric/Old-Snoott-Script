$(document).ready(function () {
     $('#logout-div').css('margin-top' , '100px');
$('#logout-div').fadeIn('4000', function() {
   
});
$('#logout-ok').on('click',  function(event) {
    $.post('/processors/logout.php', {logout: true}, function(data, textStatus, xhr) {
       if(data){

        location.href = '/';
       }
    });
});

$('#logout-cancel').on('click' , function () {
location.href= '/profile';

});
});