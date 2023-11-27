<?php

include("sqllogin.php"); // Adjust this to your actual database connection details

$connection = mysqli_connect($servername, $username, $password, $database, $port);

if (!$connection) {
    die("Connection failed: " . mysqli_connect_error());
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Assuming you store the user ID in the session during login
    $reviewerID = $_SESSION["user_id"];
    $rating = $_POST["rating"];
    $comment = $_POST["comment"];
    $subjectID = $_POST["subject"];

    // Insert the review into the database
    $query = "INSERT INTO ratings (ReviewerID, SubjectID, Rating, Comment) VALUES ('$reviewerID', '$subjectID', '$rating', '$comment')";

    if (mysqli_query($connection, $query)) {
        echo "Review submitted successfully!";
    } else {
        echo "Error: " . $query . "<br>" . mysqli_error($connection);
    }
}

mysqli_close($connection);
?>
