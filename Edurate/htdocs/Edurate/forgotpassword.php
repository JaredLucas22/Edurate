<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
<link rel="stylesheet" href="styles/loginstyle.css">
</head>
<body>

<body>
<form action="forgotpassword.php" method="post">
<div>
        <input class="user-input" type="text" id="username" name="username" placeholder="User ID" required>
        <div class="user-icon"><i class="fas fa-user"></i></div>
        </div>

        <div >
            <input class="password-input" type="password" id="password" name="password" placeholder="Password " required>
            <div class="lock-icon"><i class="fas fa-lock"></i></div>
        </div>

        <div >
            <input class="user-input" type="password" id="password" name="password" placeholder="Password " required>
            <div class="lock-icon"><i class="fas fa-lock"></i></div>
        </div>

        <button class='buttons' type="submit"> Change Password </button>
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
