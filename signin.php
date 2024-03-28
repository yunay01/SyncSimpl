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

                        <form class="form-horizontal m-t-20" id="loginform"  method="post" onsubmit="loginUser()">

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
   </body>
</html>