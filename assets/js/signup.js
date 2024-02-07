function togglePasswordVisibility() {
    var passwordInput = document.getElementById("password");

    if (passwordInput.type === "password") {
        passwordInput.type = "text";
        $(".eye_icon").html('');
        $(".eye_icon").append('<i class="fa-regular fa-eye eyeicon" onclick="togglePasswordVisibility()"></i>');
    } else {
        passwordInput.type = "password";
        $(".eye_icon").html('');
        $(".eye_icon").append('<i class="fa-regular fa-eye-slash eyeicon" onclick="togglePasswordVisibility()"></i>');
    }
}
function togglePasswordVisibility1() {
    var passwordInput = document.getElementById("confirm_password");

    if (passwordInput.type === "password") {
        passwordInput.type = "text";
        $(".eye_icon1").html('');
        $(".eye_icon1").append('<i class="fa-regular fa-eye eyeicon1" onclick="togglePasswordVisibility1()"></i>');
    } else {
        passwordInput.type = "password";
        $(".eye_icon1").html('');
        $(".eye_icon1").append('<i class="fa-regular fa-eye-slash eyeicon1" onclick="togglePasswordVisibility1()"></i>');
    }
}