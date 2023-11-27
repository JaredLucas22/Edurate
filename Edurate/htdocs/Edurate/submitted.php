<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
include("sqllogin.php");
$connection = mysqli_connect($servername, $username, $password, $database, $port);

if (!$connection) {
    die("Connection failed: " . mysqli_connect_error());
}

// Assuming you store the user ID in the session during login
$reviewerID = $_SESSION["user_id"];

// Fetch reviews for the logged-in user
$query = "SELECT * FROM ratings WHERE ReviewerID = '$reviewerID'";
$result = mysqli_query($connection, $query);

if ($result && mysqli_num_rows($result) > 0) {
    // Display the user's reviews
    echo "<div class='reviews-container'>";
    echo "<h2>Your Reviews</h2>";
    while ($review = mysqli_fetch_assoc($result)) {
        echo "<div class='review'>";
        echo "<p><strong>Subject:</strong> " . $review["SubjectID"] . "</p>";
        echo "<p><strong>Rating:</strong> " . $review["Rating"] . "</p>";
        echo "<p><strong>Comment:</strong> " . $review["Comment"] . "</p>";
        echo "</div>";
    }
    echo "</div>";
} else {
    echo "You have no reviews yet.";
}

mysqli_close($connection);
?>
