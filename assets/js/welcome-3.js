$(document).ready(function () {
    $('input[type=radio][name=checkbox]').on('change', function () {
        var clickedCheckboxId = $(this).attr('id');
        console.log('Clicked Checkbox ID: ' + clickedCheckboxId);
        window.location.href = clickedCheckboxId + '.php'; 
    });

    $(".skip").click(function(){
        window.location.href = 'signin.php'; 
    });

    setTimeout(function() {
    window.location.href = 'signin.php'; 
    }, 2000); 

});