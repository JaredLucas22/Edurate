<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
<link rel="stylesheet" href="style.css">
</head>
<body>

<form action="" method="post">
    <label for="first_name">First Name:</label>
    <input type="text" id="first_name" name="first_name" required>

    <label for="last_name">Last Name:</label>
    <input type="text" id="last_name" name="last_name" required>

    <label for="username">Username:</label>
    <input type="text" id="username" name="username" required>

    <label for="password">Password:</label>
    <input type="password" id="password" name="password" required>

    <label for="user_type">User type:  </label>
    <select name="user_type">
    <option value ="Student" name ="user_type">Student</option>
    <option value ="Teacher" name ="user_type">Teacher</option>

    <input type="submit" value="Sign Up">
</form>
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
        echo "User registered successfully!";
    } else {
        echo "Error: " . $query . "<br>" . mysqli_error($connection);
    }
}

mysqli_close($connection);
?>




</body>
</html>
