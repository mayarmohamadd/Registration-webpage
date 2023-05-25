const full_name = document.getElementById("full_name");
const email = document.getElementById("email");
const password = document.getElementById("password");
const confirm_password = document.getElementById("confirm_password");
const user_name = document.getElementById("user_name");
const birthday = document.getElementById("birthday");
const phone = document.getElementById("phone");
const address = document.getElementById("address");

full_name.addEventListener("input", function(event) {
    if(full_name.value == ""){
        full_name_error.innerHTML = "Full Name is Required!";
    } else {
        full_name_error.innerHTML = "";
    }

    const full_name_regex=/^[A-Za-z]+ [A-Za-z]+$/;
    if (!full_name_regex.test(full_name.value)) {
        full_name_error.innerHTML = "Please enter a valid full name!";
    } else {
        full_name_error.innerHTML = "";
    }
});

email.addEventListener("input", function(event) {
    if(email.value == ""){
        email_error.innerHTML = "Email is Required!";
    } else {
        email_error.innerHTML = "";
    }

    const email_regex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    if (!email_regex.test(email.value)) {
        email_error.innerHTML = "Please enter a valid email address!";
    } else {
        email_error.innerHTML = "";
    }
});

password.addEventListener("input", function(event) {
    if(password.value == ""){
        password_error.innerHTML = "Password is Required!";
    } else {
        password_error.innerHTML = "";
    }

    if (password.value.length < 8) {
        password_error.innerHTML = "Password must be at least 8 characters!";
    } else {
        password_error.innerHTML = "";
    }

    if (!/[!@#]/.test(password.value)) {
        specialChars.innerHTML = "Your password must contain a special character!";
    } else {
        specialChars.innerHTML = "";
    }

    if (!/\d/.test(password.value)) {
        cnum.innerHTML = "Your password must contain a number!";
    } else {
        cnum.innerHTML = "";
    }
});

confirm_password.addEventListener("input", function(event) {
    if(confirm_password.value == ""){
        confirm_password_error.innerHTML = "Confirm Password is Required!";
    } else {
        confirm_password_error.innerHTML = "";
    }

    if (password.value !== confirm_password.value) {
        confirm_password_error.innerHTML = "Passwords do not match!";
    } else {
        confirm_password_error.innerHTML = "";
    }
});

user_name.addEventListener("input", function(event) {
    if(user_name.value == ""){
        user_name_error.innerHTML = "User Name is Required!";
    } else {
        user_name_error.innerHTML = "";
    }
});

birthday.addEventListener("input", function(event) {
    if(birthday.value == ""){
        birthday_error.innerHTML = "Birthday is Required!";
    } else {
        birthday_error.innerHTML = "";
    }
});

phone.addEventListener("input", function(event) {
    if(phone.value == ""){
        phone_error.innerHTML = "Phone is Required!";
    } else {
        phone_error.innerHTML = "";
    }
});

address.addEventListener("input", function(event) {
    if(address.value == ""){
        address_error.innerHTML = "Address is Required!";
    } else {
        address_error.innerHTML = "";
    }
});
