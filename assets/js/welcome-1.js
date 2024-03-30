$(document).ready(function () {
    $('input[type=radio][name=checkbox]').on('change', function () {
        var clickedCheckboxId = $(this).attr('id');
        console.log('Clicked Checkbox ID: ' + clickedCheckboxId);
        window.location.href = clickedCheckboxId + '.php'; 
    });

    $(".skip").click(function(){
        window.location.href = 'welcome-2.php'; 
    });

    setTimeout(function() {
    window.location.href = 'welcome-2.php'; 
    }, 2000); 

});