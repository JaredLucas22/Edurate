<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Dashboard</title>
    <link rel="stylesheet" href="style.css">

</head>
<body>

<div class="review-container">
    <h2>Submit a Subject Review</h2>
    <form action="review.php" method="post">
        <label for="subject">Subject:</label>
        <input type="text" id="subject" name="subject" required>

        <label for="rating">Rating:</label>
        <select id="rating" name="rating" required>
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
        </select>

        <label for="comment">Comment:</label>
        <textarea id="comment" name="comment" rows="4" required></textarea>

        <input type="submit" value="Submit Review">
    </form>
</div>
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

// Include the review.php file
include("review.php");
include("submitted.php");

?>

</body>
</html>
