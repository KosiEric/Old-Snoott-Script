window.addEventListener('online' , function () {

    document.getElementById('offline-checker').style.display = 'none';
});
window.addEventListener('offline' , function(){

   
    document.getElementById('offline-checker').style.display = 'block';
} )