<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Rating Page </title>
    <link rel="stylesheet" href="newstyle.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
</head>
<body>

    <div class="container">
        <div class="user-container">
            <div class="person">
                <div class="picture">
                    <img src="anonymous.png" alt="Picture 1" class="user-image" data-target="star1">
                </div>
                <div class="name">
                    <p>Anonymous</p>
                </div>
            </div>
            <div class="person">
                <div class="picture">
                    <img src="j.jpg" alt="Picture 2" class="user-image" data-target="star2">
                </div>
                <div class="name">
                    <p>John Doe</p>
                </div>
            </div>
        </div>

          <div class="text1">Five-point Scale Rating</div>

          <form action="#" method="post" onsubmit="return validateForm()">
            <div class="rating">
              <input type="radio" id="star5" name="rating" value="5" />
              <label for="star5" title="text">5 stars</label>
              <input type="radio" id="star4" name="rating" value="4" />
              <label for="star4" title="text">4 stars</label>
              <input type="radio" id="star3" name="rating" value="3" />
              <label for="star3" title="text">3 stars</label>
              <input type="radio" id="star2" name="rating" value="2" />
              <label for="star2" title="text">2 stars</label>
              <input type="radio" id="star1" name="rating" value="1" />
              <label for="star1" title="text">1 star</label>
            </div>
    
            <div class="checkbox">
                <form class="checkbox-section" action="#" method="post">
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
                        <input type="checkbox" id="question5a" name="question5" />
                        <label for="question5a">Engaging Lectures</label>
                        <input type="checkbox" id="question6a" name="question6" />
                        <label for="question6a">Provides Useful Feedback</label>
                        <input type="checkbox" id="question7a" name="question7" />
                        <label for="question7a">Fair Grading Practices</label>
                        <input type="checkbox" id="question8a" name="question8" />
                        <label for="question8a">Enthusiasm for the Subject</label>
                      </div>
                    </div>
          
                    <div class="second">
                        <h2 class="qtwo">Are there any areas where you believe the professor
                          could make improvements?</br></h2>
                        <div class="scrollable-content">
                          <input type="checkbox" id="question1b" name="question1" />
                          <label for="question1b">Availability for Office Hours</label>
                          <input type="checkbox" id="question2b" name="question2" />
                          <label for="question2b">Course Organization</label>
                          <input type="checkbox" id="question3b" name="question3" />
                          <label for="question3b">Inclusivity and Respect</label>
                          <input type="checkbox" id="question4b" name="question4" />
                          <label for="question4b">Assessment and Grading</label>
                          <input type="checkbox" id="question5a" name="question5" />
                          <label for="question5a">Uses Varied Teaching Methods</label>
                          <input type="checkbox" id="question6a" name="question6" />
                          <label for="question6a">Flexibility in Teaching Approach</label>
                          <input type="checkbox" id="question7a" name="question7" />
                          <label for="question7a">Organized Course Materials</label>
                          <input type="checkbox" id="question8a" name="question8" />
                          <label for="question8a">Encourages Class Participation</label>
                        </div>
                      </div>

                    <textarea id="feedback" name="feedback" rows="4">Write Feedback</textarea>

                    <button>Submit</button> 
    
            </div>
    </div>
    
    <script>
        const userImages = document.querySelectorAll('.user-image');
    
        userImages.forEach(image => {
            image.addEventListener('click', function() {
                const targetId = this.getAttribute('data-target');
                const targetRadio = document.getElementById(targetId);
    
                if (targetRadio) {
                    targetRadio.checked = true;
    
                    // Uncheck other radios if needed
                    const radios = document.querySelectorAll('input[type="radio"][name="rating"]');
                    radios.forEach(radio => {
                        if (radio !== targetRadio) {
                            radio.checked = false;
                        }
                    });
    
                    // Scaling effect
                    userImages.forEach(img => {
                        img.classList.remove('selected');
                    });
                    this.classList.add('selected');
                }
            });
        });
    </script>
<?php
//include("user.php");

// Fetch user data from the database based on the stored session user_id
//$userID = $_SESSION["user_id"];
//$query = "SELECT First_Name, Last_Name FROM user WHERE User_ID = '$userID'";
//$result = mysqli_query($connection, $query);

//if ($result && mysqli_num_rows($result) > 0) {
    //$user = mysqli_fetch_assoc($result);
    //echo "Welcome, " . $user["First_Name"] . " " . $user["Last_Name"] . "!";
//} else {
 //   echo "Error fetching user data.";
//}

// Include the review.php file
//include("review.php");
?>
</body>
</html>
