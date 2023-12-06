<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
    <link rel="stylesheet" href="loginstyle.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
</head>

<body>

    <div class="container">
        <form action="index.php" method="post" onsubmit="return validateForm()">

            <h5>University of the Assumption</h5>
            <h2>Log In to EduRate</h2>

            <div style="position: relative;">
                <input class="user-input" type="text" id="username" name="username" placeholder="User ID">
                <div class="user-icon" style="position: absolute; top: 50%; transform: translateY(-50%); left: 10px;">
                    <i class="fas fa-user"></i>
                </div>
            </div>

            <div style="position: relative; margin-top: 5px;">
                <input class="password-input" type="password" id="password" name="password" placeholder="Password">
                <input type="checkbox" id="togglePassword" class="toggle-password-checkbox">
                <label for="togglePassword" class="toggle-password-icon">
                    <i class="fas fa-eye"></i>
                </label>
                <div style="padding-bottom: 50px; padding-top: 12px;">
                    <a style="font-style:italic; font-size:10px; color: rgb(255, 255, 255);" href="forgotpassword.php">Forgot Password?</a>
                </div>
            </div>

            <button class='buttons' type="submit"> Log In </button>

            <div id="error-message"></div>

            <a class='buttons1' href="signup.php">Sign Up</a>

        </form>
        <script src="forgotpasswordscript.js"></script>
    </div>
</body>
<?php 
include("session.php")
?>

</html>
