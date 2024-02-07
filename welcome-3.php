<?php 
require_once (dirname(__FILE__).'/config/config.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php include(dirname(__FILE__).'/components/header.php'); ?>
    <style>
    <?php include(dirname(__FILE__).'/assets/css/main.css'); ?>
    <?php include(dirname(__FILE__).'/assets/css/welcome.css'); ?>
    </style>
</head>
<body class="form mt-3 mb-1 ms-1 me-1">

    <div class="row">
        <div class="col-7">
        <img class="logo" src="<?php echo url?>/img/logo.jpg" alt="" align="right">
        </div>
        <div class="col" align="right">
        <b class="skip">Skip</b>
        </div>
        <div class="content_text">
            <img class="content_img" src="<?php echo url?>/img/image 1.png" alt="">
            <h3 class="mb-4">The standard Lorem Ipsum passage, used since the 1500s</h3>
            <p>with management baesd on priority and  <br> daily tasks, it will give you convienence in<br> managing and determining the tasks that <br> must be done first.</p>
            <!-- <a href="signin.php"><button type="button" class=" start_btn btn btn-primary mt-4">Get Started</button></a>  -->
        </div>
    <div align="center" class="mt-2">
        <input type="radio" class="radio" name="checkbox" id="welcome-1" min="6" required checked>
        <input type="radio" class="radio" name="checkbox" id="welcome-2" min="6" required checked>
        <input type="radio" class="radio" name="checkbox" id="welcome-3" min="6" required checked>
    </div>
    </div>

    <?php include(dirname(__FILE__).'/components/script.php'); ?>

<script>
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
</script>

</body>
</html>