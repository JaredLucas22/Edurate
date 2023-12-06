<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forgot Password</title>
    <link rel="stylesheet" href="forgotpasswordstyle.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
</head>
<body>

<div class="container">
    <form action="forgotpassword.php" method="post" onsubmit="return validateForm()">

        <h5>University of the Assumption</h5>
        <h2>Forgot Password</h2>

        <div class="form-group">
            <input class="user-input" type="text" id="username" name="username" placeholder="Username" required>
        </div>

        <div class="form-group">
            <div style="position: relative;">
                <input class="password-input" type="password" id="newPassword" name="newPassword" placeholder="New Password">
                <input type="checkbox" id="toggleNewPassword" class="toggle-password-checkbox">
                <label for="toggleNewPassword" class="toggle-password-icon">
                    <i class="fas fa-eye" style="position: relative; bottom: -7px; right: -3px;"></i>
                </label>
            </div>
        </div>

        <div class="form-group">
            <div style="position: relative;">
                <input class="password-inputs" type="password" id="confirmPassword" name="confirmPassword" placeholder="Confirm Password">
                <input type="checkbox" id="toggleConfirmPassword" class="toggle-password-checkbox">
                <label for="toggleConfirmPassword" class="toggle-password-icon">
                    <i class="fas fa-eye" style="position: relative; bottom: -7px; right: -3px;"></i>
                </label>
            </div>
        </div>

        <button class="buttons" type="submit">Change Password</button>

        <div id="error-message"></div>

    </form>
</div>

<!-- Include the JavaScript file -->
<script src="forgotten.js"></script>

<?php
include("sqllogin.php");
$connection = mysqli_connect($servername, $username, $password, $database, $port);

if (!$connection) {
    die("Connection failed: " . mysqli_connect_error());
}


// If the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = mysqli_real_escape_string($connection, $_POST["username"]);
    $newPassword = $_POST["newPassword"];
$confirmPassword = $_POST["confirmPassword"];


    // Verify that the passwords match
    if ($newPassword !== $confirmPassword) {
        echo '<script>alert("Passwords does not match. Please try again")</script>';
    } else {
        // Update the password (without hashing for mock purposes)
        $updateQuery = "UPDATE user SET User_Password = '$newPassword' WHERE User_Name = '$username'";
        $updateResult = mysqli_query($connection, $updateQuery);

        if ($updateResult) {
            echo '<script>alert("Password successfully changed")</script>';
        } else {
            echo '<script>alert("Error updating password:  . mysqli_error($connection)")</script>';
        }
    }
}

mysqli_close($connection);
?>
</body>
</html>
