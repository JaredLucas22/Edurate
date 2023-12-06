<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
    <link rel="stylesheet" href="signupstyle.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
</head>
<body>

<div class="container">
    <form action="signup.php" method="post" onsubmit="return validateForm()">

        <h5>University of the Assumption</h5>
        <h2>Sign up for EduRate</h2>

        <div class="form-group">
            <input class="first-name" type="text" id="firstname" name="firstname" placeholder="First Name" required>
        </div>

        <div class="form-group">
            <input class="last-name" type="text" id="lastname" name="lastname" placeholder="Last Name" required>
        </div>

        <div class="form-group">
            <input class="password" type="password" id="password" name="password" placeholder="Password" required>
        </div>

        <div style="position: relative;">
            <input type="checkbox" id="togglePassword" class="toggle-password-checkbox">
                <label for="togglePassword" class="toggle-password-icon">
                    <i class="fas fa-eye" style="position: relative; top:-32px; left: 84px;"></i>
                </label>
        </div>


        <div class="form-group">
            <input class="user-name" type="text" id="username" name="username" placeholder="Username" required>
            <div class="user-icon">
                <i class="fas fa-user"></i>
            </div>
        </div>

        <div class="form-groups">
            <h6 style="font-style: italic;">User type:</h6>
            <select class="user-inputs" id="userType" name="userType" required>
                <option value="student" selected>Student</option>
                <option value="teacher">Teacher</option>
            </select>
        </div>

        <button class="buttons" type="submit">Sign Up</button>

        <div id="error-message"></div>

    </form>
</div>

<script src="signupscript.js"></script>
<script src="forgotpasswordscript.js"></script>


<?php
include("sqllogin.php");
// Create connection
$connection = mysqli_connect($servername, $username, $password, $database, $port);

// Check connection
if (!$connection) {
    die("Connection failed: " . mysqli_connect_error());
}

// If the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $firstName = $_POST["first_name"];
    $lastName = $_POST["last_name"];
    $username = $_POST["username"];
    $password = $_POST["password"];
    $userType = $_POST["user_type"];

    // Insert user data into the database
    $query = "INSERT INTO user (First_Name, Last_Name, User_Name, User_Password, User_Type) VALUES ('$firstName', '$lastName', '$username', '$password', '$userType')";
    
    if (mysqli_query($connection, $query)) {
        echo '<script>alert("User registered successfully!")</script>'; 
    } else {
        echo '<script>alert("Error: " . $query . "<br>" . mysqli_error($connection")) </script>';
    }
}

mysqli_close($connection);
?>

</body>
</html>
