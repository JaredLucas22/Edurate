<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
<link rel="stylesheet" href="style.css">
</head>
<body>

<div class="login-container">
    <h2>Login</h2>
    <form action="login.php" method="post">
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" required>

        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required>

        <input type="submit" value="Login">
    </form>
</div>
<ul>
<ol><a href="signup.php">Sign up</ol>
<ol><a href="forgotpassword.php">Forgot Password</a></ol>
</ul>
<?php
include("sqllogin.php");
$connection = mysqli_connect($servername, $username, $password, $database, $port);

if (!$connection) {
    die("Connection failed: " . mysqli_connect_error());
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $enteredUsername = $_POST["username"];
    $enteredPassword = $_POST["password"];

    // Fetch user data from the database
    $query = "SELECT * FROM user WHERE User_Name = '$enteredUsername' AND User_Password = '$enteredPassword'";
    $result = mysqli_query($connection, $query);

    if ($result && mysqli_num_rows($result) > 0) {
        $user = mysqli_fetch_assoc($result);
        echo "Login successful! Welcome, " . $user["First_Name"] . " " . $user["Last_Name"] . ".";
    } else {
        echo "Invalid username or password.";
    }
}

mysqli_close($connection);
?>


</body>
</html>
