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

// Fetch reviews for the logged-in user made by other users
$query = "SELECT r.*, u.User_Name AS SubjectID FROM ratings r
          JOIN user u ON r.ReviewerID = u.User_ID
          WHERE r.SubjectID = '$reviewerID' AND r.ReviewerID != '$reviewerID'";

$result = mysqli_query($connection, $query);

if ($result && mysqli_num_rows($result) > 0) {
    // Display reviews made by other users for the logged-in user
    echo "<div class='reviews-container'>";
    echo "<h2>Reviews for You</h2>";
    while ($review = mysqli_fetch_assoc($result)) {
        echo "<div class='review'>";
        echo "<p><strong>Reviewer:</strong> " . $review["SubjectID"] . "</p>";
        echo "<p><strong>Rating:</strong> " . $review["Rating"] . "</p>";
        echo "<p><strong>Comment:</strong> " . $review["Comment"] . "</p>";
        echo "</div>";
    }
    echo "</div>";
} else {
    echo "No reviews made by others for you yet.";
}

mysqli_close($connection);
?>
