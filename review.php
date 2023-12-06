<?php

include("sqllogin.php");
$connection = mysqli_connect($servername, $username, $password, $database, $port);

if (!$connection) {
    die("Connection failed: " . mysqli_connect_error());
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
   // Assuming you store the user ID in the session during login
$reviewerID = $_SESSION["user_id"];
$rating = isset($_POST['rating']) ? $_POST['rating'] : 0; // Directly use the value
$comment = $_POST["comment"];
$subjectUsername = $_POST["subject"]; // Assuming subject now contains the username

// Get the User_ID of the user being reviewed
$subjectQuery = "SELECT User_ID FROM user WHERE User_Name = '$subjectUsername'";
$subjectResult = mysqli_query($connection, $subjectQuery);

if ($subjectResult && mysqli_num_rows($subjectResult) > 0) {
    $subjectRow = mysqli_fetch_assoc($subjectResult);
    $subjectID = $subjectRow["User_ID"];

    // Insert the review into the database
    $query = "INSERT INTO ratings (ReviewerID, SubjectID, Rating, Comment) 
              VALUES ('$reviewerID', '$subjectID', $rating, '$comment')"; // No need for intval()

    if (mysqli_query($connection, $query)) {
        echo '<script>alert("Review Submitted")</script>'; 
    } else {
        echo "Error: " . $query . "<br>" . mysqli_error($connection);
    }
} else {
    echo '<script>alert("User not found")</script>';
}
}

mysqli_close($connection);
?>
