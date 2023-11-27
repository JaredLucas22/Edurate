<?php
session_start(); // Start the session


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
        header("home.php");
    } else {
        echo "Invalid username or password.";
    }
}

mysqli_close($connection);
?>
