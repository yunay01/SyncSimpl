<!DOCTYPE html>
<html lang="en">
<head>
    <?php include(dirname(__FILE__).'/components/header.php'); ?>
    <style>
    <?php include(dirname(__FILE__).'/assets/css/main.css'); ?>
    <?php include(dirname(__FILE__).'/assets/css/signup.css'); ?>
    </style>
</head>
<body class="form">

    <div class="auth-container d-flex">

        <div class="container mx-auto align-self-center">
    
            <div class="row">
                <div class="content_text_1">
                    <div class="col-xxl-4 col-xl-5 col-lg-5 col-md-8 col-12 d-flex flex-column align-self-center mx-auto">
                        <div class="card mt-5 mb-3">
                            <div class="card-body">
        
                            <form class="form-horizontal m-t-20" id="loginform"  method="post">

                                <div class="row">
                                    <div class="col-md-12 mb-3"  align="center">
                                      <img class="logo" src="<?php echo url?>/img/logo.jpg" alt="">
                                    </div>
                                    <div class="col-md-12 mb-3"  align="center">
                                        <h2>Sign Up</h2>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6 mb-3 label">
                                            <label class="form-label">First Name</label>
                                            <input type="text" name="first_name" id="first_name" class="form-control add-billing-address-input" required="">
                                            <div class="text-danger" id="first_name-error"></div>
                                        </div>
                                        <div class="col-md-6 mb-3 label">
                                            <label class="form-label">Last Name</label>
                                            <input type="text" name="last_name" id="last_name" class="form-control add-billing-address-input" required="">
                                            <div class="text-danger" id="last_name-error"></div>
                                        </div>
                                    </div>
                                
                                    <div class="col-md-12 label">
                                        <div class="mb-3">
                                            <label class="form-label">Email</label>
                                            <input type="email" name="email" id="email" class="form-control" required>
                                            <div class="text-danger" id="email-error">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 label">
                                        <div class="mb-3">
                                            <label class="form-label">Password</label>
                                            <input type="password" name="password" id="password" min="6" required class="form-control">
                                            <div class="eye_icon">
                                            <i class="fa-regular fa-eye-slash eyeicon" onclick="togglePasswordVisibility()"></i>
                                            </div>
                                            <div class="text-danger" id="password-error">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 label">
                                        <div class="mb-3">
                                            <label class="form-label">Confirm Password</label>
                                            <input type="password" name="confirm_password" id="confirm_password" min="6" required class="form-control">
                                            <div class="eye_icon1">
                                            <i class="fa-regular fa-eye-slash eyeicon1" onclick="togglePasswordVisibility1()"></i>
                                            </div>
                                            <div class="text-danger" id="confirm_password-error">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 label">
                                        <div class="mb-3">
                                            <label class="form-label">Date of Birth</label>
                                            <input type="text" name="dob" id="dob" min="6" required class="form-control">
                                            <div class="text-danger" id="dob-error">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="mb-3">
                                            <input type="checkbox" name="term" id="term" min="6" required >
                                            <label >By Countinuing, i agree to the <b> terams and conditions</b></label>
                                            <div class="text-danger" id="term-error">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 mt-4">
                                        <div class="mb-4">
                                            <button type="button" id="submit"  class="btn btn-primary w-100 submit-btn">SIGN UP</button>
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
       <?php include(dirname(__FILE__).'/assets/js/signup.js'); ?>
    </script>
</body>
</html>