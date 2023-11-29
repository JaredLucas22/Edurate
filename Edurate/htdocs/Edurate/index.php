<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
    <link rel="stylesheet"href="styles/loginstyle.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
</head>
<body>
<div class="container">    
    <form action="index.php" method="post" onsubmit="return validateForm()">

        <h5>University of the Assumption</h5>
        <h2>Sign in to EduRate</h2>
        
        <div>
        <input class="user-input" type="text" id="username" name="username" placeholder="User ID" required>
        <div class="user-icon"><i class="fas fa-user"></i></div>
        </div>


        <div >
            <input class="password-input" type="password" id="password" name="password" placeholder="Password " required>
            <div class="lock-icon"><i class="fas fa-lock"></i></div>
        </div>

        
        <button class='buttons' type="submit"> Login </button>
        
        <div id="error-message"></div>

        <a class='buttons1' href="signup.php">Sign up</a>
        <a class='buttons2' href="forgotpassword.php">Forgot Password</a>
    </form></div>
</body>
<?php 
include("session.php")
?>
</html>
