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