<?php
session_start();
require_once ('Header.php');


// define variables and set to empty values
$full_nameErr = $user_nameErr = $birthdayErr = $phoneErr =$addressErr = $passwordErr = $confirm_passwordErr= $emailErr=$valid = "";
$full_name = $user_name = $birthday = $phone =$address = $password = $confirm_password= $email = "";

if(isset($_POST['submit'])){
    if (empty($_POST["full_name"])) {
        $full_nameErr = "Full Name is required";
    } else {
        $full_name = test_input($_POST["full_name"]);
        $_SESSION['full_name'] = $full_name;
    }
    if (empty($_POST["user_name"])) {
        $user_nameErr = "User Name is required";
    } else {
        $user_name = test_input($_POST["user_name"]);
        $_SESSION['user_name'] = $user_name;
    }
    if (empty($_POST["birthday"])) {
        $birthdayErr = "Birthdat is required";
    } else {
        $birthday = test_input($_POST["birthday"]);
        $_SESSION['birthday'] = $birthday;
    }
    if (empty($_POST["phone"])) {
        $phoneErr = "Phone is required";
    } else {
        $phone = test_input($_POST["phone"]);
        $_SESSION['phone'] = $phone;
    }
    if (empty($_POST["address"])) {
        $addressErr = "Address is required";
    } else {
        $address = test_input($_POST["address"]);
        $_SESSION['address'] = $address;
    }
    if (empty($_POST["password"])) {
        $passwordErr = "Password is required";
    } else {
        $password = test_input($_POST["password"]);
        $_SESSION['password'] = $password;
    }
    if (empty($_POST["confirm_password"])) {
        $confirm_passwordErr = "Confirm Password is required";
    } else {
        $confirm_password = test_input($_POST["confirm_password"]);
        $_SESSION['confirm_password'] = $confirm_password;
    }
    if (empty($_POST["email"])) {
        $emailErr = "Email is required";
    } else {
        $email = test_input($_POST["email"]);
        $_SESSION['email'] = $email;
    }
    if($password!==$confirm_password){
        $confirm_passwordErr = "Confirm Password must match Password";
        unset($_SESSION['confirm_password']);
    }
    if (strlen($password) < 8) {
        $passwordErr= "Password must be at least 8 characters.";
        unset($_SESSION['confirm_password']);
        unset($_SESSION['password']);
    } else if (!preg_match('/\d/', $password)) {
        $passwordErr= "Password must contain at least 1 number.";
        unset($_SESSION['confirm_password']);
        unset($_SESSION['password']);
    } else if (!preg_match('/[!@#]/', $password)) {
        $passwordErr= "Password must contain at least 1 special character (!, @, or #).";
        unset($_SESSION['confirm_password']);
        unset($_SESSION['password']);
    } 

    if(!preg_match('/^[^\s@]+@[^\s@]+\.[^\s@]+$/',$email)){
        $emailErr="Please enter a valid email address";
        unset($_SESSION['email']);
    }

    if(!preg_match('/^[A-Za-z]+ [A-Za-z]+$/',$full_name)){
        $full_nameErr="Please enter a valid full name";
        unset($_SESSION['full_name']);
    }


    // else{
    //     $valid="Success Registeration";
        
    // }

}

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}



?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/index.css">
    <title>Registeration Form</title>
</head>
<body>
    
    

    <form method="post" action="DB_Ops.php"  enctype="multipart/form-data">
        <div class="register">
        <h2>Registeration</h2>
        <p><span class="error">* required field</span></p>
        <br><br>
        </div>


        <label>Full Name:<span class="error">  * <?php echo $full_nameErr;?></span></label>
        <input type="text" name="full_name" id="full_name" value="<?php echo isset($_SESSION['full_name']) ? $_SESSION['full_name'] : ''; ?>">
        <span  class="error" id="full_name_error"> </span>
        <br><br>

        <label>User Name:<span class="error">  * <?php echo $user_nameErr;?></span></label>
        <input type="text" name="user_name" id="user_name" value="<?php echo isset($_SESSION['user_name']) ? $_SESSION['user_name'] : ''; ?>">
        <span  class="error" id="user_name_error"> </span>
        <br><br>

        <label>Birthdate:<span class="error">  * <?php echo $birthdayErr;?></span></label>
        <input type="date" name="birthday" id="birthday" value="<?php echo isset($_SESSION['birthday']) ? $_SESSION['birthday'] : ''; ?>">
        <span  class="error" id="birthday_error"> </span>
        <br><br>

        <label>Phone:<span class="error">  * <?php echo $phoneErr;?></span></label>
        <input type="tel" name="phone" id="phone" value="<?php echo isset($_SESSION['phone']) ? $_SESSION['phone'] : ''; ?>">
        <span  class="error" id="phone_error"> </span>
        <br><br>

        <label>Address:<span class="error">  * <?php echo $addressErr;?></span></label>
        <input type="text" name="address" id="address" value="<?php echo isset($_SESSION['address']) ? $_SESSION['address'] : ''; ?>">
        <span  class="error" id="address_error"> </span>
        <br><br>

        <label>Password:<span class="error">  * <?php echo $passwordErr;?></span></label>
        <input type="password" name="password"  id="password" value="<?php echo isset($_SESSION['password']) ? $_SESSION['password'] : ''; ?>">
        <span class="error" id="password_error"> </span>
        <span class="error" id="specialChars"> </span>
        <span class="error" id="cnum"> </span>
        <br><br>

        <label>Confirm Password:<span class="error">  * <?php echo $confirm_passwordErr;?></span></label>
        <input type="password" name="confirm_password" id="confirm_password" value="<?php echo isset($_SESSION['confirm_password']) ? $_SESSION['confirm_password'] : ''; ?>">
        <span class="error" id="confirm_password_error"> </span>
        <br><br>


        <label >Image: </label>
        <input type="file" name="img">
        <br><br>

        <label >Email:<span class="error">  * <?php echo $emailErr;?></span></label>
        <input type="text" name="email" id="email" value="<?php echo isset($_SESSION['email']) ? $_SESSION['email'] : ''; ?>">
        <span class="error" id="email_error"> </span>
        <br><br>

        <input type="submit" value="submit" name="submit">
        <br><br>
        <p><span class="error">   <?php echo $valid;?></p>

    </form>
    

    <!-- client-side validations -->
    <script src="index.js"></script>



<?php
// include_once('Upload.php');
require_once('Footer.php');
?>