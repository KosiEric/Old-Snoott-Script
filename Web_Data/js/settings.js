if(window.addEventListener){

    window.addEventListener('load', function () {
        var editContainer = $('#account-settings'), passwordContainer = $('#password-settings'),
        imageContainer = $('#picture-add'), deleteContainer = $('#delete-account')
       , editForm = $('#edit-account-details'), passwordForm = $('#change-password-form'),
       imageForm = $('#account-image'), deleteForm = $('#delete-account-form'),
       settingsDropdowns = document.getElementsByClassName('settings-dropdowns');

        editContainer.on('click', function () {
            var editForm = $('#edit-account-details');

            for (var j = 0; j < settingsDropdowns.length; ++j) {

                settingsDropdowns[j].style.backgroundImage = 'url(' + imageFolder + 'drop-down.png)';

            }

            var forms = document.getElementsByClassName('hidden-forms');
            for (var i = 1; i < forms.length; ++i) {

                forms[i].style.display = 'none';
            }

            //    alert(editForm.css('display'));
            if (editForm.css('display') == 'block') {

                editContainer.css('backgroundImage', 'url(' + imageFolder + 'drop-down.png)');
                editForm.css('display', 'none');
            }

            else {
                editForm.css('display', 'block');
                editContainer.css('backgroundImage', 'url(' + imageFolder + 'drop-up.png)');


            }
        });

        passwordContainer.on('click', function () {
            var passwordForm = $('#change-password-form');


            for (var j = 0; j < settingsDropdowns.length; ++j) {

                settingsDropdowns[j].style.backgroundImage = 'url(' + imageFolder + 'drop-down.png)';

            }

            var forms = document.getElementsByClassName('hidden-forms');
            for (var i = 0; i < forms.length; ++i) {
                if (i === 1) {

                    continue;
                }
                forms[i].style.display = 'none';

            }

            //    alert(editForm.css('display'));
            if (passwordForm.css('display') == 'block') {

                passwordContainer.css('backgroundImage', 'url(' + imageFolder + 'drop-down.png)');
                passwordForm.css('display', 'none');
            }

            else {
                passwordForm.css('display', 'block');
                passwordContainer.css('backgroundImage', 'url(' + imageFolder + 'drop-up.png)');


            }
        });

        imageContainer.on('click', function () {

            var imageForm = $('#account-image');

            for (var j = 0; j < settingsDropdowns.length; ++j) {

                settingsDropdowns[j].style.backgroundImage = 'url(' + imageFolder + 'drop-down.png)';

            }


            var forms = document.getElementsByClassName('hidden-forms');
            for (var i = 0; i < forms.length; ++i) {
                if (i === 2) {

                    continue;
                }
                forms[i].style.display = 'none';
            }

            //    alert(editForm.css('display'));
            if (imageForm.css('display') == 'block') {

                imageContainer.css('backgroundImage', 'url(' + imageFolder + 'drop-down.png)');
                imageForm.css('display', 'none');
            }

            else {
                imageForm.css('display', 'block');
                imageContainer.css('backgroundImage', 'url(' + imageFolder + 'drop-up.png)');


            }
        });


        deleteContainer.on('click', function () {
            var deleteForm = $('#delete-account-form');


            for (var j = 0; j < settingsDropdowns.length; ++j) {

                settingsDropdowns[j].style.backgroundImage = 'url(' + imageFolder + 'drop-down.png)';

            }

            var forms = document.getElementsByClassName('hidden-forms');
            for (var i = 0; i < forms.length; ++i) {
                if (i === 3) {

                    continue;
                }
                forms[i].style.display = 'none';

            }

            //    alert(editForm.css('display'));
            if (deleteForm.css('display') == 'block') {

                deleteContainer.css('backgroundImage', 'url(' + imageFolder + 'drop-down.png)');
                deleteForm.css('display', 'none');
            }

            else {
                deleteForm.css('display', 'block');
                deleteContainer.css('backgroundImage', 'url(' + imageFolder + 'drop-up.png)');


            }
        });



        var profileToggle = $('#profile-toggle'), accountToggle = $('#account-toggle'), accountMain = $('#settings-drop-down-container'),
    profileMain = $('#profile-settings'), profileContainer = $('#profile-dropdown'), profileForm = $('#profile-settings-form');

        profileToggle.on('click', function () {

            profileToggle.css('backgroundColor', 'inherit');
            accountToggle.css('backgroundColor', '#fff');
            accountMain.css('display', 'none');
            profileMain.css('display', 'block');

        });

        accountToggle.on('click', function () {

            profileToggle.css('backgroundColor', '#fff');
            accountToggle.css('backgroundColor', 'inherit');
            accountMain.css('display', 'block');
            profileMain.css('display', 'none');

        });

        profileContainer.on('click', function () {
            var profileForm = $('#profile-settings-form');


            for (var j = 0; j < settingsDropdowns.length; ++j) {

                settingsDropdowns[j].style.backgroundImage = 'url(' + imageFolder + 'drop-down.png)';

            }

            var forms = document.getElementsByClassName('hidden-forms');
            for (var i = 0; i < forms.length; ++i) {
                if (i === 4) {

                    continue;
                }
                forms[i].style.display = 'none';

            }

            //    alert(editForm.css('display'));
            if (profileForm.css('display') == 'block') {

                profileContainer.css('backgroundImage', 'url(' + imageFolder + 'drop-down.png)');
                profileForm.css('display', 'none');
            }

            else {
                profileForm.css('display', 'block');
                profileContainer.css('backgroundImage', 'url(' + imageFolder + 'drop-up.png)');


            }
        });

       // window.alert(document.getElementById('profile-region').options.length);

    });


}

else if (window.attachEvent){
window.attachEvent('onload', function () {



});

}