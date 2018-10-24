function showSignupForm() {

    if (animateLoader()) {

        document.getElementById('login-content').style.display = 'none';

        var containers = document.getElementsByClassName('containers');
        /* for(var j = 0; j < containers.length; ++j){

             containers[j].style.display = 'none';


         }
         */
        document.getElementById('reg-content').style.display = 'block';



    }



}
var showLoginForm = function() {


    if (animateLoader()) {
        var containers = document.getElementsByClassName('containers');
        /*  for(var j = 0; j < containers.length; ++j){

              containers[j].style.display = none;


          }

          */
        document.getElementById('reg-content').style.display = 'none';

        document.getElementById('login-content').style.display = 'block';



    }

}

var animateLoader = function() {



    var loaders = document.getElementsByClassName('loaders');

    for (var i = 0; i < loaders.length; ++i) {


        loaders[i].style.display = 'block';

    }


    var isThrough = false;
    var innerLoader = $('#inside-loader');

    innerLoader.css('width', '0%');


    var timer = window.setInterval(function() {

        var innerLoader = $('#inside-loader');

        var currentWidth = innerLoader.css('width');

        var widthParse = parseInt(currentWidth);

        if (widthParse == 99) {
            var newWidth = widthParse + 1;

            innerLoader.css('width', newWidth + "%");
            innerLoader.css({
                width: '0%',
                display: 'none'
            });
            var isThrough = true;
            window.clearInterval(timer);


        }
        var newWidth = widthParse + 3;
        innerLoader.css('width', newWidth + "%");






    }, 25);


    return true;


}
window.addEventListener('load', function() {
    if (document.getElementById('user-settings-header')) {

        var headerSettings = document.getElementById('user-settings-header');

        headerSettings.addEventListener('mouseover', function() {
            var headerNavigation = document.getElementById('hidden-settings-navigation');
            headerNavigation.style.display = 'block';
        });

        headerSettings.addEventListener('mouseleave', function() {
            var headerNavigation = document.getElementById('hidden-settings-navigation');
            headerNavigation.style.display = 'none';
        });

    }






})