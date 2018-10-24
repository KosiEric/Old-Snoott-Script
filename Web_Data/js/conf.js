$(document).ready(function () {

$('#email-confirmation-alert').slideDown('slow', function() {
    $('#remove-alert-icon').click(function() {
$('#email-confirmation-alert').slideUp('slow' , function () {

    window.location.href = '/';
});

    });
var timeOut = setTimeout(function() {
$('#email-confirmation-alert').slideUp('slow' , function () {

    window.location.href = '/';
});


}, 3000);

});
});
