<?php
session_start(); // Start the session

include("sqllogin.php");
$connection = mysqli_connect($servername, $username, $password, $database, $port);

if (!$connection) {
    die("Connection failed: " . mysqli_connect_error());
}

// Clear existing session data
session_unset();
session_destroy();
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $enteredUsername = $_POST["username"];
    $enteredPassword = $_POST["password"];

    // Fetch user data from the database
    $query = "SELECT * FROM user WHERE User_Name = '$enteredUsername' AND User_Password = '$enteredPassword'";
    $result = mysqli_query($connection, $query);

    if ($result && mysqli_num_rows($result) > 0) {
        $user = mysqli_fetch_assoc($result);

        // Store user ID in session for future use
        $_SESSION["user_id"] = $user["User_ID"];
        header("Location: home.php");
        exit();
    } else {
        echo '<script>alert("Invalid Username Or Password")</script>'; 
    }
}

mysqli_close($connection);
?>
