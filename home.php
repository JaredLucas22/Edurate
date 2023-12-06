<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Your Page Title</title>
  <link rel="stylesheet" href="rate.css">

  <script>
    document.addEventListener("DOMContentLoaded", function() {
      var checkboxes = document.querySelectorAll('.scrollable-content input[type="checkbox"]');
      checkboxes.forEach(function(checkbox) {
        checkbox.addEventListener('click', function() {
          this.checked = !this.checked;
        });
      });
    });
  </script>
</head>
<body>

  <div class="text1">Five-point Scale Rating</div>

  <div class="content-container">
    <div class="content">
      <div class="hamburger-button" onclick="toggleMenu()">
        <div class="hamburger-line"></div>
        <div class="hamburger-line"></div>
        <div class="hamburger-line"></div>
      </div>

      <div class="rectangle"></div>

      <div class="rectangle"></div>
      <div class="rectangle1"></div>
      

      <form action="#" method="post" onsubmit="return validateForm()">
      <div class="rating">
      <input type="radio" id="star5" name="rating[]" value="5" />
        <label for="star5" title="text">5 stars</label>
        <input type="radio" id="star4" name="rating[]" value="4" />
        <label for="star4" title="text">4 stars</label>
        <input type="radio" id="star3" name="rating[]" value="3" />
        <label for="star3" title="text">3 stars</label>
        <input type="radio" id="star2" name="rating[]" value="2" />
        <label for="star2" title="text">2 stars</label>
        <input type="radio" id="star1" name="rating[]" value="1" />
        <label for="star1" title="text">1 star</label>
      </div>

      <div class="checkbox-section">
        <div class="first">
          <h2 class="qone">What do you like about the professor?</h2>
          <div class="scrollable-content">
            <input type="checkbox" id="question1a" name="question1" />
            <label for="question1a">Knowledge and Expertise</label>
            <input type="checkbox" id="question2a" name="question2" />
            <label for="question2a">Clear Communication</label>
            <input type="checkbox" id="question3a" name="question3" />
            <label for="question3a">Effective Teaching Methods</label>
            <input type="checkbox" id="question4a" name="question4" />
            <label for="question4a">Approachability</label>
          </div>
        </div>

        <div class="seperator"></div>
        <div class="second">
          <h2 class="qtwo">Are there any areas where you believe the professor
            <br> could make improvements?</br></h2>
          <div class="scrollable-content">
            <input type="checkbox" id="question1b" name="question1" />
            <label for="question1b">Availability for Office Hours</label>
            <input type="checkbox" id="question2b" name="question2" />
            <label for="question2b">Course Organization</label>
            <input type="checkbox" id="question3b" name="question3" />
            <label for="question3b">Inclusivity and Respect</label>
            <input type="checkbox" id="question4b" name="question4" />
            <label for="question4b">Assessment and Grading</label>
          </div>
        </div>
      </div>
      <div class="feedback-section">
        <textarea id="comment" name="feedback" rows="4">Write Feedback</textarea>
      </div>
    </div>
    <button class="submit-button">Submit</button>

    <button class="anonymous-container">
      <div class="anonymous"></div>
      <img src="styles/pictures/anonymous.png" class="anonymous-image">
      <div class="anonymous-name">Anonymous</div>
    </button>
    
    <button class="as-container">
      <div class="as"></div>
      <img src="styles/pictures/anonymous.png" class="as-image">
      <div class="as-name">Anthony Salonga</div>
    </button>

  </div>
</form>

<?php 
include("user.php");

// Fetch user data from the database based on the stored session user_id
$userID = $_SESSION["user_id"];
$query = "SELECT First_Name, Last_Name FROM user WHERE User_ID = '$userID'";
$result = mysqli_query($connection, $query);

if ($result && mysqli_num_rows($result) > 0) {
    $user = mysqli_fetch_assoc($result);
    echo '<script>alert("Welcome, " . $user["First_Name"] . " " . $user["Last_Name"] . "!"</script>)';
} else {
    echo "Error fetching user data.";
}

// Include the review.php file
include("review.php");
?>

</body>
</html>
