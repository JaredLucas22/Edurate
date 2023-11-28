<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
    <link rel="stylesheet" href="edurate/styles/App.css">
</head>
<body>

<div class="login-container">
    <h2>Login</h2>
    <form action="index.php" method="post">
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" required>

        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required>

        <input type="submit" value="Login">
    </form>
</div>
<a href="signup.php">Sign up</a></li>
<a href="forgotpassword.php">Forgot Password</a></li>

<?php 
include("session.php");
?>
</body>
</html>