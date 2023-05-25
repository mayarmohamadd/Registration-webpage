<!DOCTYPE html>
<html lang="en">

<body>
<script src="index.js"></script>
</body>
</html>

<?php
// require('Index.php');

$mysqli = new mysqli('localhost', 'root', '', 'registration');

// Check if the connection is successful
if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user_name = $_POST["user_name"];
    $result = mysqli_query($mysqli, "SELECT * FROM users WHERE user_name = '$user_name'");

    if (mysqli_num_rows($result) > 0) {
        
        echo  "Username already exists. Please choose another username.";
    } else {
        $full_name = $_POST['full_name'];
        $user_name = $_POST['user_name'];
        $birthday = $_POST['birthday'];
        $phone = $_POST['phone'];
        $address = $_POST['address'];
        $password = $_POST['password'];
        $confirm_password = $_POST['confirm_password'];
        $img = $_FILES['img'];
        $email = $_POST['email'];

        $insert_query = "INSERT INTO users (full_name, user_name, birthday, phone,address,password,confirm_password,img,email) 
        VALUES ('$full_name', '$user_name', '$birthday', '$phone','$address', '$password', '$confirm_password', '$img','$email')";

        if ($mysqli->query($insert_query)) {
            echo "User register successfully";
            
        } else {
            echo
            "Error: " . $insert_query . "<br>" . mysqli_error($mysqli);
        }
    }
    include('Upload.php') ;
    
    
    
}
?>

