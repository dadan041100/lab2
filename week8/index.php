<?php
date_default_timezone_set('Asia/Singapore'); // Set timezone to GMT+8

$currentDate = date('Y-m-d'); // Get current date
$currentTime = date('H:i:s'); // Get current time

echo "Current Date: " . $currentDate . "<br>";
echo "Current Time (GMT+8): " . $currentTime;
?>

<h5>Login Page</h5>

<?php
// Start session
session_start();

// Define valid username and password
$valid_username = "user";
$valid_password = "password";

// Check if form is submitted
	if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["username"]) && isset($_POST["password"])) {
    $username = $_POST["username"];
    $password = $_POST["password"];

    // Check if username and password are valid
    if ($username === $valid_username && $password === $valid_password) {
        // Authentication successful, set session variable
        $_SESSION["loggedin"] = true;
        $_SESSION["username"] = $username;

        // Redirect to home page or dashboard
        header("Location: home.php");
        exit;
    } else {
        echo "<p>Invalid username or password. Please try again.</p>";
    }
}
?>

<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
    <label for="username">Username:</label>
    <input type="text" name="username" id="username" required><br><br>
    <label for="password">Password:</label>
    <input type="password" name="password" id="password" required><br><br>
    <input type="submit" value="Login">
</form>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daniel Ramolete's Website</title>

    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f0f8ff;
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
            background-image: url("cloud.jpg");
            background-repeat: no-repeat;
            background-size: cover;
            background-position: center center;
            background-attachment: fixed;
            overflow: auto;
        }

        header {
            text-align: center;
            margin-bottom: 20px;
            color: #008CBA;            
            z-index: 1;
            position: relative;
        }

        h1,
        h2,
        h3,
        h4,
        h5 {
            color: #008CBA;
            margin: 5px 0;
        }

        p {
            font-family: "Arial", sans-serif;
            font-size: 18px;
            color: #333;
            text-align: center;
            margin: 10px 0;
        }

        img.profile-picture {
            border-radius: 50%;
            width: 100px;
            height: 100px;
            object-fit: cover;
            border: 5px solid #008CBA;
            margin-bottom: 10px;
        }

        video {
            width: 70%;
            max-width: 100%;
            height: auto;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
            margin: 20px 0;
        }

        .social-buttons {
            display: flex;
            gap: 10px;
            margin-top: 20px;
            align-items: center;
            justify-content: center;
        }

        .social-button {
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            text-align: center;
            text-decoration: none;
            font-size: 16px;
            cursor: pointer;
            border-radius: 5px;
            display: flex;
            align-items: center;
            transition: background-color 0.3s ease;
        }

        .social-button img {
            width: 20px;
            height: 20px;
            margin-right: 10px;
        }

        .social-button:hover {
            background-color: #45a049;
        }

        .comment-section {
            width: 60%;
            margin-top: 30px;
            background-color: #fff;
            border-radius: 8px;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .comment h2 {
            color: #008CBA;
            margin-bottom: 10px;
        }

        .comment {
            border: 1px solid #ddd;
            padding: 10px;
            margin-bottom: 10px;
            border-radius: 8px;
            background-color: #f9f9f9;
        }

        .comment input {
            margin-right: 10px;
            padding: 8px;
            border: 1px solid #ddd;
            border-radius: 4px;
        }

        .comment button {
            background-color: #008CBA;
            color: white;
            border: none;
            padding: 8px 16px;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .comment button:hover {
            background-color: #005580;
        }

        .action-button {
            background-color: #008CBA;
            color: white;
            border: none;
            padding: 10px 20px;
            margin: 5px;
            cursor: pointer;
            border-radius: 5px;
            font-size: 16px;
            transition: background-color 0.3s ease;
        }

        .action-button:hover {
            background-color: #005580;
        }

        .error {
            color: red;
        }

        .success {
            color: green;
        }

        form {
            width: 60%;
            margin-top: 20px;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        form input[type="text"],
        form input[type="password"],
        form textarea {
            width: 100%;
            padding: 8px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
            font-size: 16px;
        }

        form input[type="submit"] {
            background-color: #008CBA;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
            transition: background-color 0.3s ease;
        }

        form input[type="submit"]:hover {
            background-color: #005580;
        }
    </style>
</head>
<body>
    <header>
        <h1>Welcome to Daniel Ramolete's Website!</h1>
        <h2>Asia Pacific College 2023</h2>
        <h3>I play VALORANT most of the time</h3>
    </header>

    <main>
        <p>I'm definitely not a Killjoy Main</p>
        <p>I am a big fan of Lee Ji-Eun (IU)</p>
        <p>I am also a big fan of AESPA</p>

        <video controls>
            <source src="drama.mp4" type="video/mp4" />
        </video>

        <div class="social-buttons">
            <img src="dadan.jpg" alt="Dadan" class="profile-picture">
            <a href="https://www.facebook.com/dadanramolete" class="social-button" target="_blank">
                <img src="facebook.png" alt="Facebook Icon">
                Facebook
            </a>
            <a href="https://twitter.com/DdnRmlteeee" class="social-button" target="_blank">
                <img src="twitter.png" alt="Twitter Icon">
                Twitter
            </a>
            <a href="https://www.instagram.com/ddnrmlteeee" class="social-button" target="_blank">
                <img src="instagram.png" alt="Instagram Icon">
                Instagram
            </a>
        </div>
    </main>

    <!-- Action buttons with enhanced styling -->
    <button class="action-button" onclick="toggleBackground()">Toggle Background Image</button>
    <button class="action-button" onclick="changeRandomColor()">Change Background Color</button>

    <label for="nameInput">Enter Your Name:</label>
    <input type="text" id="nameInput" />
    <button class="action-button" onclick="displayGreeting()">Display Greeting</button>
    <p id="greetingMessage"></p>

    <button class="action-button" onclick="startCountdown()">Start Countdown</button>
    <p id="countdown"></p>

    <button class="action-button" onclick="toggleParagraphs()">Toggle Paragraphs</button>

    <div class="comment-section">
        <h2>Leave a Comment:</h2>
        <div class="comment">
            <input type="text" id="commentInput" placeholder="Your comment...">
            <button class="action-button" onclick="addComment()">Submit</button>
        </div>
        <div id="comments"></div>
    </div>
    <script>
        window.onload = function () {
            alert("Welcome to Daniel Ramolete's Website!");
            startCountdown();
        };

        var originalFontSize;

        function increaseFontSize(element) {
            originalFontSize = window.getComputedStyle(element, null).getPropertyValue('font-size');
            element.style.fontSize = "30px";
        }

        function restoreFontSize(element) {
            element.style.fontSize = originalFontSize;
        }

        function toggleBackground() {
            var body = document.body;
            var currentBackground = body.style.backgroundImage;

            if (currentBackground === 'none') {
                body.style.backgroundImage = 'url("cloud.jpg")';
            } else {
                body.style.backgroundImage = 'none';
            }
        }

        // Play/Pause video
        var video = document.getElementById("myVideo");

        function togglePlayPause() {
            if (video.paused) {
                video.play();
            } else {
                video.pause();
            }
        }

        video.addEventListener("click", togglePlayPause);

        // Change Background Color
        function changeRandomColor() {
            var colors = ["#FF6347", "#7FFFD4", "#FFD700", "#8A2BE2", "#00FF7F", "#FF4500"];
            var randomColor = colors[Math.floor(Math.random() * colors.length)];
            document.body.style.backgroundColor = randomColor;
        }

        // Display Greeting
        function displayGreeting() {
            var nameInput = document.getElementById("nameInput").value;
            var greetingMessage = document.getElementById("greetingMessage");

            if (nameInput.trim() !== "") {
                greetingMessage.textContent = "Hello, " + nameInput + "! Welcome to the website!";
            } else {
                greetingMessage.textContent = "Please enter your name.";
            }
        }

        // Countdown Timer
        function startCountdown() {
            var seconds = 10;
            var countdownElement = document.getElementById("countdown");

            var countdownInterval = setInterval(function () {
                countdownElement.textContent = "Countdown: " + seconds + " seconds";

                if (seconds <= 0) {
                    clearInterval(countdownInterval);
                    countdownElement.textContent = "Countdown Finished!";
                }

                seconds--;
            }, 1000);
        }

        // Toggle Paragraphs
        function toggleParagraphs() {
            var paragraphs = document.querySelectorAll('p');
            paragraphs.forEach(function (paragraph) {
                paragraph.style.display = (paragraph.style.display === 'none' || paragraph.style.display === '') ? 'block' : 'none';
            });
        }

        // Comment Section
        function addComment() {
            var commentInput = document.getElementById("commentInput");
            var commentsContainer = document.getElementById("comments");

            var commentText = commentInput.value.trim();
            if (commentText !== "") {
                var commentDiv = document.createElement("div");
                commentDiv.className = "comment";
                commentDiv.textContent = commentText;

                commentsContainer.appendChild(commentDiv);

                // Clear the input field
                commentInput.value = "";
            }
        }
    </script>
	
<h2>PHP Form Example</h2>


<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
    Name: <input type="text" name="name">
    <input type="submit" name="submit" value="Submit">
</form>

<h2>File Upload Example</h2>

<?php
// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_FILES["file"])) {
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($_FILES["file"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

    // Check if file already exists
    if (file_exists($target_file)) {
        echo "Sorry, file already exists.";
        $uploadOk = 0;
    }

    // Check file size
    if ($_FILES["file"]["size"] > 500000) {
        echo "Sorry, your file is too large.";
        $uploadOk = 0;
    }

    // Allow certain file formats
    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
    && $imageFileType != "gif" ) {
        echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        $uploadOk = 0;
    }

    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
    } else {
        if (move_uploaded_file($_FILES["file"]["tmp_name"], $target_file)) {
            echo "The file ". htmlspecialchars( basename( $_FILES["file"]["name"])). " has been uploaded.";
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }
}
?>

<form method="post" enctype="multipart/form-data">
    Select image to upload:
    <input type="file" name="file" id="file">
    <input type="submit" value="Upload Image" name="submit">
</form>

<h4>Contact Us!</h4>

<?php
// Define variables and set to empty values
$name = $email = $message = $gender = "";
$nameErr = $emailErr = $messageErr = $genderErr = "";
$successMessage = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate name
    if (empty($_POST["name"])) {
        $nameErr = "Name is required";
    } else {
        $name = test_input($_POST["name"]);
    }

    // Validate email
    if (empty($_POST["email"])) {
        $emailErr = "Email is required";
    } else {
        $email = test_input($_POST["email"]);
        // Check if email is valid
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $emailErr = "Invalid email format";
        }
    }

    // Validate message
    if (empty($_POST["message"])) {
        $messageErr = "Message is required";
    } else {
        $message = test_input($_POST["message"]);
    }

    // Validate gender
    if (empty($_POST["gender"])) {
        $genderErr = "Gender is required";
    } else {
        $gender = test_input($_POST["gender"]);
    }

    // If no errors, send email
    if (empty($nameErr) && empty($emailErr) && empty($messageErr) && empty($genderErr)) {
        $to = "your_email@example.com";
        $subject = "Contact Form Submission";
        $body = "Name: $name\nEmail: $email\nGender: $gender\nMessage: $message";
        $headers = "From: $email";

        if (mail($to, $subject, $body, $headers)) {
            $successMessage = "Your message has been sent successfully!";
        } else {
            $successMessage = "Oops! Something went wrong.";
        }
    }
}

// Function to sanitize input data
function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>

<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
    Name: <input type="text" name="name">
    <span class="error">* <?php echo $nameErr;?></span>
    <br><br>
    Email: <input type="text" name="email">
    <span class="error">* <?php echo $emailErr;?></span>
    <br><br>
    Gender:
    <input type="radio" name="gender" value="female">Female
    <input type="radio" name="gender" value="male">Male
    <input type="radio" name="gender" value="other">Other
    <span class="error">* <?php echo $genderErr;?></span>
    <br><br>
    Message: <textarea name="message" rows="5" cols="40"></textarea>
    <span class="error">* <?php echo $messageErr;?></span>
    <br><br>
    <input type="submit" name="submit" value="Submit">
</form>


</body>

</html>
