<?php
session_start(); // Start the session

if (!isset($_SESSION["user_id"])) {
    // Redirect to the login page if the user is not logged in
    header("Location: login.php");
    exit();
}

include("sqllogin.php");

// Create connection
$connection = mysqli_connect($servername, $username, $password, $database, $port);

// Check connection
if (!$connection) {
    die("Connection failed: " . mysqli_connect_error());
}