<?php
// Session configuration
ini_set('session.use_only_cookies', 1);
ini_set('session.use_strict_mode', 1);
session_set_cookie_params([
    'lifetime' => 1800,
    'domain' => 'localhost',
    'path' => '/',
    'secure' => false, // Set to true if using HTTPS
    'httponly' => true,
    'samesite' => 'Strict'
]);
session_start();

// Database connection
$host = 'localhost';
$dbname = 'fittrack';
$dbusername = 'root';
$dbpassword = '';

$conn = new mysqli($host, $dbusername, $dbpassword, $dbname);

if ($conn->connect_error) {
    die('Database connection failed: ' . $conn->connect_error);
}

// Helper functions
function is_input_empty(...$inputs) {
    foreach ($inputs as $input) {
        if (empty(trim($input))) {
            return true;
        }
    }
    return false;
}

function is_email_invalid($email) {
    return !filter_var($email, FILTER_VALIDATE_EMAIL);
}

function is_username_taken($conn, $username) {
    $stmt = $conn->prepare('SELECT email FROM users WHERE username = ?');
    $stmt->bind_param('s', $username);
    $stmt->execute();
    $stmt->store_result();
    return $stmt->num_rows > 0;
}

function is_email_registered($conn, $email) {
    $stmt = $conn->prepare('SELECT email FROM users WHERE email = ?');
    $stmt->bind_param('s', $email);
    $stmt->execute();
    $stmt->store_result();
    return $stmt->num_rows > 0;
}

// Registration/Error handling
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $firstname = $_POST["firstname"];
    $lastname = $_POST["lastname"];
    $username = $_POST["username"];
    $password = $_POST["password"];
    $phone = $_POST["phone"];
    $confirm_password = $_POST["confirm_password"];
    $email = $_POST["email"];
    $height = $_POST["height"];
    $weight = $_POST["weight"];
    $age = $_POST["age"];
    $gender = $_POST["gender"];
    $level = $_POST["level"];

    $errors = [];

    if (is_input_empty($username, $password, $email, $firstname, $lastname, $height, $weight, $gender, $age, $phone)) {
        $errors["Empty_input"] = "Fill in all fields!";
    }

    if ($password !== $confirm_password) {
        $errors["Password_mismatch"] = "Passwords do not match!";
    }

    if (is_email_invalid($email)) {
        $errors["Invalid_email"] = "Invalid email used!";
    }

    if (is_username_taken($conn, $username)) {
        $errors["Username_taken"] = "Username already taken!";
    }

    if (is_email_registered($conn, $email)) {
        $errors["Email_registered"] = "Email already registered!";
    }

    if (empty($errors)) {

        $bmi = $weight / (($height / 100) * ($height / 100));

        if($bmi <= 18.5)
        {
            $bmiCategoryID = 1;
        }
        else if($bmi <= 24.9 && $bmi >= 18.6)
        {
            $bmiCategoryID = 2;
        }
        else if($bmi >= 25 && $bmi <= 100)
        {
            $bmiCategoryID = 3;
        }

        $stmt = $conn->prepare('INSERT INTO users (firstname, lastname, username, password, email, height, weight, age, gender, planCategoryID, phone, bmiCategoryID) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)');

        // Bind parameters with types: s - string, i - integer
        $stmt->bind_param('sssssiiisiii', $firstname, $lastname, $username, $password, $email, $height, $weight, $age, $gender, $level, $phone, $bmiCategoryID);
        
        // Execute the statement
        $stmt->execute();
        
        // Close the statement
        $stmt->close();
        
        // Redirect to the login page
        header('Location: login.php');
        exit();
    } else {
        $_SESSION["errors_signup"] = $errors;
        $_SESSION["signup_data"] = $_POST;
    }
}

// Check signup errors function
function check_signup_errors() {
    if (isset($_SESSION["errors_signup"])) {
        echo '<div class="error-message">';
        foreach ($_SESSION["errors_signup"] as $error) {
            echo "<pre>$error</pre>";
        }
        echo '</div>';
        unset($_SESSION["errors_signup"]);
    }

    if (isset($_SESSION["signup_data"])) {
        echo '<script>
            window.onload = function() {
                const signupData = ' . json_encode($_SESSION["signup_data"]) . ';
                Object.keys(signupData).forEach(function(key) {
                    const element = document.querySelector([name="${key}"]);
                    if (element) {
                        element.value = signupData[key];
                    }
                });
            };
        </script>';
        unset($_SESSION["signup_data"]);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>

    <style>
    <?php include("../src/carl_user.css")?>
    </style>

</head>
<body>
    <div class="nav">
        <nav>
            <a><img src="https://scontent.fcgy2-4.fna.fbcdn.net/v/t1.15752-9/449641745_996984771737200_5695789707439500493_n.png?_nc_cat=105&ccb=1-7&_nc_sid=9f807c&_nc_eui2=AeEnGxH0DaxguJ8DTP0wsrmqfTUDNMEc3qh9NQM0wRzeqLH0H0YEzw7s9ooMvzGPZSVBpSWNok6tiSRk4Vb_P1_X&_nc_ohc=d4jEmCnoNAsQ7kNvgH4QqS3&_nc_ht=scontent.fcgy2-4.fna&oh=03_Q7cD1QHUxQPycvHklCg5O5MTU3wkJ6nmbw8dHq65VMnD8wA-YQ&oe=66B0A8C9" alt="logo"></a>
        </nav>
    </div>
    
    <section class="container">
        <header>Registration Form</header>
        <form action="" method="POST" class="form">
            <div class="column">
                <div class="input-box">
                    <label>First Name</label>
                    <input type="text" name="firstname" placeholder="Enter first name" required/>
                </div>
                <div class="input-box">
                    <label>Last Name</label>
                    <input type="text" name="lastname" placeholder="Enter last name" required/>
                </div>
            </div>
            <div class="input-box">
                <label>Username</label>
                <input type="text" name="username" placeholder="Enter username" required/>
            </div>
            <div class="input-box">
                <label>Email Address</label>
                <input type="text" name="email" placeholder="Enter email address" required/>
            </div>
            <div class="column">
                <div class="input-box">
                    <label>Phone Number</label>
                    <input type="text" name="phone" placeholder="Enter phone number" required/>
                </div>
                <div class="input-box">
                    <label>Age</label>
                    <input type="number" name="age" placeholder="Enter age" required/>
                </div>
            </div>
            <div class="column">
                <div class="input-box">
                    <label>Weight</label>
                    <input type="number" name="weight" placeholder="Enter weight in KG" required/>
                </div>
                <div class="input-box">
                    <label>Height</label>
                    <input type="number" name="height" placeholder="Enter height in CM" required/>
                </div>
            </div>
            <div class="column">
                <div class="input-box">
                    <label>Password</label>
                    <input type="password" name="password" placeholder="Enter password" required/>
                </div>
                <div class="input-box">
                    <label>Confirm Password</label>
                    <input type="password" name="confirm_password" placeholder="Enter password" required/>
                </div>
            </div>
            <div class="gender-box">
                <h3>Gender</h3>
                <div class="gender-option">
                    <div class="gender">
                        <input type="radio" id="male" name="gender" value="male"/>
                        <label for="male">Male</label>
                    </div>        
                    <div class="gender">
                        <input type="radio" id="female" name="gender" value="female"/>
                        <label for="female">Female</label>
                    </div> 
                </div>
                <div class="input-box">
                    <div class="column">
                        <div class="select-box">
                            <select name="level">
                                <option value="">Level</option>
                                <option value="1">Beginner</option>
                                <option value="2">Intermediate</option>
                                <option value="3">Advance</option>
                            </select>
                            <h5>What is your physical activity level?</h5>
                        </div>
                    </div>
                </div>
                <div class="input-box">
                <?php 
                check_signup_errors(); 
                ?>
                </div>
      
                <br>
                <p>Already have an account? <a href="login.php">Log In Now</a></p>
                <button type="submit">Submit</button>
            </div>
        </form>
    </section>

    <br>

</body>
</html>