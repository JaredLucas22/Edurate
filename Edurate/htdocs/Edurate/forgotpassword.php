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

<form action="forgotpassword.php" method="post">
    <label for="username">Username:</label>
    <input type="text" id="username" name="username" required>

    <label for="new_password">New Password:</label>
    <input type="password" id="new_password" name="new_password" required>

    <label for="confirm_password">Confirm Password:</label>
    <input type="password" id="confirm_password" name="confirm_password" required>

    <input type="hidden" name="token" value='<?php echo $_GET['token']; ?>'>


    <input type="submit" value="Reset Password">
</form>
<?php
include("sqllogin.php");
$connection = mysqli_connect($servername, $username, $password, $database, $port);

if (!$connection) {
    die("Connection failed: " . mysqli_connect_error());
}

// If the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = mysqli_real_escape_string($connection, $_POST["username"]);
    $newPassword = $_POST["new_password"];
    $confirmPassword = $_POST["confirm_password"];
    $token = mysqli_real_escape_string($connection, $_POST["token"]);

    // Verify that the passwords match
    if ($newPassword !== $confirmPassword) {
        echo "Passwords do not match. Please try again.";
    } else {
        // Check if the username and token match in the database
        $checkQuery = "SELECT * FROM user WHERE User_Name = '$username' AND Reset_Token = '$token'";
        $result = mysqli_query($connection, $checkQuery);

        if ($result && mysqli_num_rows($result) > 0) {
            // Passwords match and username/token are valid, update the password
            $hashedPassword = password_hash($newPassword, PASSWORD_BCRYPT);

            $updateQuery = "UPDATE user SET User_Password = '$hashedPassword', Reset_Token = NULL WHERE User_Name = '$username'";
            mysqli_query($connection, $updateQuery);

            echo "Password reset successfully. You can now login with your new password.";
        } else {
            echo "Invalid username or token. Please check your input.";
        }
    }
}

mysqli_close($connection);
?>
</body>
</html>
