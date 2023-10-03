<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="signin.css">
    <title>LogIn</title>
</head>
<body>
<section class="left-container" style="background-color: #f9004d;">
        <div class="left">
            <h1> <span> Welcome Back</span></h1>
            <p>Don't have an account? <br> <br> Sign up with your personal info.</p>
            <button name="submit" type="submit" class="sign-up-button"> <a href="register.php">Sign Up </a></button> <br> 
            <h2> <span>Not a Donor?</span></h2>
            <a href="">Log in as NGO Personnel</a> <br> <br>
            <a href="">Log in as Admin</a>
        </div>

        </section>

<section class="right-container" style="width: 100vh;">
         <div class="right">
            <h1><span>User Account</span></h1>
            <form class="form" method="post">
                    <input class="input-field" style="background-color: rgba(97, 97, 97, 0.08);" name="email" placeholder="Username"/><br>
                    <input class="input-field" style="background-color: rgba(97, 97, 97, 0.08);" type="password" name="password" placeholder="Password"/><br> <br>
                    <button type="submit" class="login-button">LOG IN</button>
                </form>
         </div>

</section>
</body>
</html>