<?php
// Define variables and initialize with empty values
$name = $email = $website = $gender = "";
$name_err = $email_err = $website_err = $gender_err = "";

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate name
    if (empty($_POST["name"])) {
        $name_err = "Please enter your name.";
    } else {
        $name = test_input($_POST["name"]);
        // Check if name only contains letters and whitespace
        if (!preg_match("/^[a-zA-Z ]*$/", $name)) {
            $name_err = "Only letters and white space allowed";
        }
    }
    
    // Validate email
    if (empty($_POST["email"])) {
        $email_err = "Please enter your email.";
    } else {
        $email = test_input($_POST["email"]);
        // Check if email address is well-formed
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $email_err = "Invalid email format";
        }
    }
    
    // Validate website
    if (empty($_POST["website"])) {
        $website_err = "Please enter your website.";
    } else {
        $website = test_input($_POST["website"]);
    }

    // Validate gender
    if (empty($_POST["gender"])) {
        $gender_err = "Please select your gender.";
    } else {
        $gender = test_input($_POST["gender"]);
    }

    // If there are no errors, insert into database
    if (empty($name_err) && empty($email_err) && empty($website_err) && empty($gender_err)) {
        $servername = "localhost";
        $username = "webprogss221";
        $password = "=latHen97";
        $dbname = "webprogss221";

        // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);
        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Prepare SQL statement
        $sql = "INSERT INTO ddramolete_myguest (name, message, email, gender) VALUES (?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);

        if ($stmt) {
            // Bind parameters
            $stmt->bind_param("ssss", $name, $website, $email, $gender);
            
            // Attempt to execute the prepared statement
            if ($stmt->execute()) {
                echo "<h2>Thank you for contacting us!</h2>";
                echo "<p>We will get back to you as soon as possible.</p>";
            } else {
                echo "<h2>Form submission failed.</h2>";
                echo "<p>Please try again later.</p>";
            }

            // Close statement
            $stmt->close();
        } else {
            echo "Error: Unable to prepare statement.";
        }

        $conn->close();
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

<!DOCTYPE html>
<html>
<head>
    <title>PHP Form Validation Example</title>
</head>
<body>

<h2>PHP Form Validation Example</h2>
<p><span class="error">* required field</span></p>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
    Name: <input type="text" name="name" value="<?php echo $name;?>">
    <span class="error">* <?php echo $name_err;?></span>
    <br><br>
    Email: <input type="text" name="email" value="<?php echo $email;?>">
    <span class="error">* <?php echo $email_err;?></span>
    <br><br>
    Gender:
    <input type="radio" name="gender" <?php if (isset($gender) && $gender=="female") echo "checked";?> value="female">Female
    <input type="radio" name="gender" <?php if (isset($gender) && $gender=="male") echo "checked";?> value="male">Male
    <input type="radio" name="gender" <?php if (isset($gender) && $gender=="other") echo "checked";?> value="other">Other
    <span class="error">* <?php echo $gender_err;?></span>
    <br><br>
    Website: <textarea name="website" rows="5" cols="40"><?php echo $website;?></textarea>
    <span class="error">* <?php echo $website_err;?></span>
    <br><br>
    <input type="submit" name="submit" value="Submit">
</form>

</body>
</html>
