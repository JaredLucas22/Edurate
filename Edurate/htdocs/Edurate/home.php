<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Dashboard</title>
    <link rel="stylesheet" href="style.css">
    <style>
        /* Add this style for the rating buttons */
        .rating-container {
  display: flex;
  align-items: center;
}

.rating-button {
  --ellipse-color: orange; /* You can change this color as needed */
  width: 1em;
  height: 0.7em;
  background-color: var(--ellipse-color);
  border-radius: 50%;
  margin: 1em auto;
  font-size: 10em;
  position: relative;
  display: block;
}

/* Add this style for the selected rating */
.rating-button.selected {
  --ellipse-color-selected: red; /* You can change this color to red */
  background-color: var(--ellipse-color-selected);
}


    </style>
</head>
<body>

<div class="review-container">
    <h2>Submit a Subject Review</h2>
    <form action="review.php" method="post">
        <label for="subject">Subject:</label>
        <input type="text" id="subject" name="subject" required>

        <label for="rating">Rating:</label>
        <div class="rating-container">
            <!-- Add five ellipse buttons for the rating -->
            <?php for ($i = 1; $i <= 5; $i++) { ?>
                <button type="button" class="rating-button" data-rating="<?php echo $i; ?>"></button>
            <?php } ?>
        </div>
        <!-- Add the hidden input for the selected rating -->
        <input type="hidden" id="rating" name="rating" value="">

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

<!-- Add JavaScript to handle the rating selection -->
<script>
    document.addEventListener('DOMContentLoaded', function () {
        var ratingButtons = document.querySelectorAll('.rating-button');

        ratingButtons.forEach(function (button, index) {
            button.addEventListener('click', function () {
                for (var i = 0; i <= index; i++) {
                    ratingButtons[i].classList.add('selected');
                }

                for (var i = index + 1; i < ratingButtons.length; i++) {
                    ratingButtons[i].classList.remove('selected');
                }

                document.getElementById('rating').value = button.getAttribute('data-rating');
            });
        });
    });
</script>

</body>
</html>
