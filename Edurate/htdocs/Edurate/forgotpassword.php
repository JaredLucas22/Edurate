<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
<link rel="stylesheet" href="style.css">
</head>
<body>

<body>

<form action="forgot_password.php" method="post">
    <label for="username">Username:</label>
    <input type="text" id="username" name="username" required>
    <input type="submit" value="Reset Password">
</form>
<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "edurate";
$port = "3307";

// Create connection
$connection = mysqli_connect($servername, $username, $password, $database, $port);

// Check connection
if (!$connection) {
    die("Connection failed: " . mysqli_connect_error());
}

// If the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = mysqli_real_escape_string($connection, $_POST["username"]);

    // Check if the username exists in the database (customize this query based on your needs)
    $checkQuery = "SELECT * FROM user WHERE User_Name = '$username'";
    $result = mysqli_query($connection, $checkQuery);

    if (mysqli_num_rows($result) > 0) {
        // Generate a unique token (you can customize this)
        $token = bin2hex(random_bytes(32));

        // Store the token in the database (customize this query based on your needs)
        $updateQuery = "UPDATE user SET Reset_Token = '$token' WHERE User_Name = '$username'";
        mysqli_query($connection, $updateQuery);

        // Send a password reset email to the user with the token (customize this part)
        $to = "user@example.com"; // replace with the user's email from your database
        $subject = "Password Reset";
        $message = "Click the link to reset your password: http://yourwebsite.com/reset_password.php?token=$token&username=$username";

        // Use appropriate headers, and consider using a library like PHPMailer for production
        mail($to, $subject, $message);

        echo "Password reset instructions sent to your email.";
    } else {
        echo "Username not found. Please check your input.";
    }
}

mysqli_close($connection);
?>
</body>
</html>
