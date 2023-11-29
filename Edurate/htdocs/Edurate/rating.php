<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Dashboard</title>
    <style>
        
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            text-align: center;
            margin-top: 50px;
        }

        .login-container {
            width: 300px;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        input[type="submit"] {
            background-color: #4caf50;
            color: white;
            padding: 10px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
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
<link rel="stylsheet" href="styles/loginstyle.css">
<body>

<div class="review-container">
    <h2>Submit a Subject Review</h2>
    <form id="reviewForm" action="review.php" method="post">
        <label for="subject">Subject:</label>
        <input type="text" id="subject" name="subject" required>

        <label for="rating">Rating:</label>
        <div class="rating-container">
            <?php for ($i = 1; $i <= 5; $i++) { ?>
                <button type="button" class="rating-button" data-rating="<?php echo $i; ?>"></button>
            <?php } ?>
        </div>
        <input type="hidden" id="rating" name="rating" value="">
</div>

<div class="feedback-container">
        <h2>What you liked:</h2>
        <input type="checkbox" id="expertise" name="expertise">
        <label for="expertise">Expertise and Knowledge</label><br>

        <input type="checkbox" id="clearCommunication" name="clearCommunication">
        <label for="clearCommunication">Clear Communication</label><br>

        <input type="checkbox" id="effectiveTeaching" name="effectiveTeaching">
        <label for="effectiveTeaching">Effective Teaching Methods</label><br>

        <input type="checkbox" id="approachability" name="approachability">
        <label for="approachability">Approachability</label><br>

        <h2>Areas for improvement:</h2>
        <input type="checkbox" id="availability" name="availability">
        <label for="availability">Availability for Office Hours</label><br>

        <input type="checkbox" id="courseOrganization" name="courseOrganization">
        <label for="courseOrganization">Course Organization</label><br>

        <input type="checkbox" id="inclusivity" name="inclusivity">
        <label for="inclusivity">Inclusivity and Respect</label><br>

        <input type="checkbox" id="assessment" name="assessment">
        <label for="assessment">Assessment and Grading</label><br>

        <h2>Additional Comments:</h2>
        <textarea id="comment" name="comment" rows="4" required></textarea>
        <input type="submit" value="Submit your feedback">
    </form>
</div>
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

        document.getElementById("myForm").addEventListener("submit", function(event) {
            var checkboxes = document.querySelectorAll('input[type="checkbox"]');
            var checked = false;

            for (var i = 0; i < checkboxes.length; i++) {
                if (checkboxes[i].checked) {
                    checked = true;
                    break;
                }
            }

            if (!checked) {
                alert("Error: Fill in the required checklist");
                event.preventDefault();
            }

            var rating = document.getElementById('rating').value;

            if (!rating) {
                alert("Error: Please provide a rating");
                event.preventDefault();
            }
        });
    });
</script>
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
?>
</body>
</html>
