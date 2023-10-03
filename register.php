<?php

if($_SERVER["REQUEST_METHOD"] == 'POST'){

    include_once ("config.php");

    if(!empty($_SESSION["ID"])){
        header("Location: home.php");
    }

//create database query
$sql_create= "CREATE DATABASE donate";

//create table
$sql_table = "CREATE TABLE `users` (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL UNIQUE,
    gender ENUM('Male', 'Female') NOT NULL,
    password VARCHAR(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4";


$username= $_POST["username"];
$email= $_POST["email"];
$gender = $_POST["gender"];
$password= $_POST["password"];
$confirm_password= $_POST["confirm_password"];
$username_duplicate = mysqli_query($conn, "SELECT * FROM users WHERE username = '$username'");

if(mysqli_num_rows($username_duplicate) > 0){
    echo '<script>alert("Username already taken")</script>';
}else{

    $email_duplicate = mysqli_query($conn, "SELECT * FROM users WHERE email = '$email'");

    if(mysqli_num_rows($email_duplicate) > 0){
        echo '<script>alert("Email already taken")</script>';
    }else{
        if(!empty($password == $confirm_password)){

            $sql_insert = "INSERT INTO users(`username`, `email`, `gender`,`password`) VALUES ('$username', '$email', '$gender', '$password')"; 
            mysqli_query($conn, $sql_insert);
            header("Location: signin.php");
            echo '<script>alert("Successful registration")</script>"';
    
        }else{
            echo '<script>alert("Passwords don\'t match")</script>"';
        }
    }
}

}


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="register.css">
    <title>Registration Page</title>
</head>
<body>
        <section class="left-container" style="background-color: #f9004d;">
        <div class="left">
            <h1> <span> Welcome </span></h1>
            <p>Already have an account? <br> <br> Log in with your personal info.</p>
            <button name="submit" type="submit" class="login-button" > <a href="signin.php">Login</a> </button>
        </div>
        </section>

        <section class="right-container" style="width: 100vh;">
        <div class="right">
            <h1>Create Account</h1>
            <form  class="form" method="post" >
                <div class="form-group">
                    <!-- <label for="username">UserName</label> -->
                    <input class="input-field" style="background-color: rgba(97, 97, 97, 0.08);" required placeholder="Username" name="username" type="text" id="username"/><br>
                </div>
                <div class="form-group">
                    <!-- <label for="email">Email</label> -->
                    <input class="input-field" style="background-color: rgba(97, 97, 97, 0.08);" required placeholder="Email" type="Email" name="email" id="email"/><br>
                </div>
                <div class="form-group">
                <label for="gender">Gender:</label>
                <select name="gender" required>
                   <option value="Male">Male</option>
                   <option value="Female">Female</option>
                </select><br>             
                </div>
                <div class="form-group">
                    <!-- <label for="password">Password</label> -->
                    <input class="input-field" style="background-color: rgba(97, 97, 97, 0.08);" required placeholder="Password" type="password" name="password" id="password"/><br>
                </div>
                <div class="form-group">
                    <!-- <label for="confirm-password">Confirm Password</label> -->
                    <input class="input-field" style="background-color: rgba(97, 97, 97, 0.08);" required placeholder="Confirm Password" type="password" name="confirm_password" id="confirm_password"/><br>
                </div>
                <div class="form-group">
                    <input type="checkbox" id="terms" name="terms">
                    <label for="terms">I agree to the <a href="terms.html">Terms and Conditions</a></label> 
                </div>
                <br> 
                <button class="sign-up-button"> <a href="home.php"></a> Sign Up</button>
            </form>
        </div>
        </section>
    <!-- </div> -->
</body>
</html>
