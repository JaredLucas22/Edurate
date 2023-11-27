<?php
include("user.php");

// Fetch user data from the database based on the stored session user_id
$userID = $_SESSION["user_id"];
$query = "SELECT First_Name, Last_Name FROM user WHERE User_ID = '$userID'";
$result = mysqli_query($connection, $query);

if ($result && mysqli_num_rows($result) > 0) {
    $user = mysqli_fetch_assoc($result);
    echo "Welcome, " . $user["First_Name"] . " " . $user["Last_Name"] . "!";
} else {
    echo "Error fetching user data.";
}

mysqli_close($connection);
?>