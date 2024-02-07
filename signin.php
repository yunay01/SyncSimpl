<?php
   require_once(dirname(__FILE__).'/manager/session_manager.php');
 
   if(isSessionValid() == true){
      header("Location: index.php");
      die();
  }
   
  if (!empty($_POST['email']) && !empty($_POST['password'])) {
   
      if(validateLogin($_POST['email'],$_POST['password']) == true){
          $getloginde = getlogindetails($_POST['email'],$_POST['password']);
        //   if(!empty($getloginde) && $getloginde["user_role"] == "1"){
          if(!empty($getloginde) ){
                createSession(true,$_POST['email']);
                header("Location: index.php");
        }
         
         die();
      }  
   }
?>

<?php 
require_once (dirname(__FILE__).'/config/config.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php include(dirname(__FILE__).'/components/header.php'); ?>
    <style>
    <?php include(dirname(__FILE__).'/assets/css/main.css'); ?>
    <?php include(dirname(__FILE__).'/assets/css/signin.css'); ?>
    </style>
</head>

   <body>

    <div class="auth-container d-flex">

<div class="container mx-auto align-self-center">

    <div class="row">
        <div class="content_text">
            <div class="col-xxl-4 col-xl-5 col-lg-5 col-md-8 col-12 d-flex flex-column align-self-center mx-auto">
                <div class="card mt-5 mb-3">
                    <div class="card-body">

                        <form class="form-horizontal m-t-20" id="loginform"  method="post" onsubmit="doLogin()">

                        <div class="row">
                            <div class="col-md-12 mb-3">
                               <img class="logo" src="<?php echo url?>/img/logo.jpg" alt="">
                            </div>
                            <div class="col-md-12 mb-3">
                                <h2>Login</h2>
                            </div>
                            <div class="col-md-12 label ">
                                <div class="mb-3">
                                    <label class="form-label">Email</label>
                                    <input type="email" name="email" class="form-control" required>
                                </div>
                            </div>
                            <div class="col-12 label">
                                <div class="mb-4">
                                    <label class="form-label">Password</label>
                                    <input type="password" name="password" id="password"  class="form-control" required>
                                    <div class="eye_icon">
                                    <i class="fa-regular fa-eye-slash eyeicon" onclick="togglePasswordVisibility()"></i>
                                    </div>
                                </div>
                                <?php 
                        if(isset($_POST['email']) || isset($_POST['password']))
                            echo '<div class="text-danger">
                                    email or password is incorrect.
                                </div>';
                    ?>
                            </div>
                            <div class="col-12 label">
                                <div>
                                    <div class="form-check form-check-primary form-check-inline d-flex justify-content-end">
                                        <!--<input class="form-check-input me-3" type="checkbox" id="form-check-default">-->
                                        <!--<label class="form-check-label" for="form-check-default">-->
                                        <!--    Remember me-->
                                        <!--</label>-->
                                        <a class="" id="to-recover" type="button"> Forget password?</a>
                                        
                                    </div>
                                </div>
                            </div>
                            
                            <div class="col-12 mt-4">
                                <div class="mb-4">
                                    <button name="login" type="submit"  class="btn btn-primary w-100 submit-btn" >Login</button>
                                </div>
                            </div>
                            
                            <div class="col-12 mt-4">
                                <div class="text-center">
                                    <p class="mb-0">Dont't have an account ? <a href="signup.php" class="text-warning" id="to-signup ">Sign Up</a></p>
                                </div>
                            </div>

                        </div>
                        
                    </form>
                    
                    <form class="form-horizontal m-t-20" id="recoverform" >

                        <div class="row">
                            <div class="col-md-12 mb-3">
                               <img class="logo" src="<?php echo url?>/img/logo.jpg" alt="">
                            </div>
                            <div class="col-md-12 mb-3">
                                <h2>Forget Password</h2>
                            </div>
                            <div class="col-md-12 label">
                                <div>
                                    <label class="form-label">Email</label>
                                    <input type="email" class="form-control form-control-lg" id="tb_recoverymail" placeholder="Email Address" aria-label="email" aria-describedby="basic-addon1" required>
                                </div>
                                <div class="text-danger" id="email-error">
                                            </div>
                            </div>
                            
                            <div class="col-12">
                                <div>
                                    <div class="form-check form-check-primary form-check-inline">
                                    </div>
                                </div>
                            </div>
                            
                            <div class="col-12">
                                <div class="mb-2">
                                    <button name="login" type="submit" class="btn btn-primary w-100 submit-btn">Send</button>
                                </div>
                            </div>
                            
                            <div class="col-12">
                                <div class="text-center">
                                    <p class="mb-0">Dont't have an account ? <a href="#" class="text-warning" id="to-login ">Sign in</a></p>
                                </div>
                            </div>
                            
                        </div>
                        
                    </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
    
</div>

</div>
    <?php include(dirname(__FILE__).'/components/script.php'); ?>
    <script>
       <?php include(dirname(__FILE__).'/assets/js/signin.js'); ?>
    </script>

      <script>
      $(document).ready(function(){
          $("#recoverform").hide();
      })
         $(".preloader").fadeOut();
         // ============================================================== 
         // Login and Recover Password 
         // ============================================================== 
         $('#to-recover').on("click", function() {
             $("#loginform").hide();
             $("#recoverform").fadeIn();
         });
         $('#to-login').click(function(){             
             $("#recoverform").hide();
             $("#loginform").fadeIn();
         });

         function doLogin(){
            e= $('[name ="login"]');
            if($('[name ="email"]').val()=='' || $('[name ="password"]').val()=='')
               return;
             if(!e.is('[disabled=disabled]'))
                 e.attr('disabled', true);
             else
                 e.attr('disabled', false);
             e.children(":first").toggleClass('fa-spinner fa-spin');
         }

        $("#recoverform").submit(function(e) {
            e.preventDefault();
            $("#email-error").html("");
            $('[name ="recovery"]').children(":first").toggleClass('fa-spinner fa-spin');
              var email= $("#tb_recoverymail").val();
            $.post({
                url: "./manager/pwd_manager.php",
                contentType: 'application/json; charset=utf-8',
                data: JSON.stringify({ 
                    action_type: "send_pwd_reset",
                    email: email
                })
            }).done(function (data) {
                console.log(data);
                $('[name ="recovery"]').children(":first").toggleClass('fa-spinner fa-spin');
                if(data.result == "success"){
                    $("#email-error").html('<span class="text-success">If the email is valid, you will receive a password reset link now. Please note the link is valid for 48hrs only.</span>');
                    $("#tb_recoverymail").val('');
                }
                else
                    $("#email-error").html('<span class="text-danger">' + data.error + '</span>');
              });
            }); 
      
    </script>
   </body>
</html>