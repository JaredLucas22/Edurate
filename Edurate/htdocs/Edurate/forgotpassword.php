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

    <input type="submit" value="Change Password">
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

    // Verify that the passwords match
    if ($newPassword !== $confirmPassword) {
        echo "Passwords do not match. Please try again.";
    } else {
        // Update the password (without hashing for mock purposes)
        $updateQuery = "UPDATE user SET User_Password = '$newPassword' WHERE User_Name = '$username'";
        $updateResult = mysqli_query($connection, $updateQuery);

        if ($updateResult) {
            echo "Password changed successfully. You can now login with your new password.";
        } else {
            echo "Error updating password: " . mysqli_error($connection);
        }
    }
}

mysqli_close($connection);
?>
</body>
</html>
