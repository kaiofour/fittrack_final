<?php
session_start();

if(!isset($_SESSION["user_id"])){
    header("Location: ./login.php");
    exit();
}

$servername = "localhost";
$username = "root";  // replace with your database username
$password = "";      // replace with your database password
$dbname = "fittrack";  // replace with your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$user_ID = $_SESSION["user_id"];
$sql = "SELECT * FROM users WHERE userID = $user_ID";  // replace with dynamic user ID as needed
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
} else {
    echo "0 results";
}

if (isset($_POST['update_profile'])) {
    $new_username = $_POST['username'];
    $new_firstname = $_POST['firstname'];
    $new_lastname = $_POST['lastname'];
    $new_email = $_POST['email'];
    $new_age = $_POST['age'];
    $new_height = $_POST['height'];
    $new_weight = $_POST['weight'];

    $stmt = $conn->prepare('UPDATE users SET username = ?, firstname = ?, lastname = ?, email = ?, age = ?, height = ?, weight = ? WHERE userID = ?');
    $stmt->bind_param('ssssiiii', $new_username, $new_firstname, $new_lastname, $new_email, $new_age, $new_height, $new_weight, $user_ID);

    if ($stmt->execute()) {
        $_SESSION['update_success'] = true;
    } else {
        $_SESSION['update_success'] = false;
    }

    $stmt->close();
    $conn->close();
    header("Location: profile.php");
    exit();
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="../src/homepage.css">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        $(document).ready(function() {
            <?php if (isset($_SESSION['update_success'])): ?>
                <?php if ($_SESSION['update_success']): ?>
                    alert('Profile updated successfully!');
                <?php else: ?>
                    alert('Error updating profile. Please try again.');
                <?php endif; ?>
                <?php unset($_SESSION['update_success']); ?>
            <?php endif; ?>
        });
    </script>
</head>
<body>

    <!-- Navigation Bar -->
    <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container">
            <a class="navbar-brand" href="homepage.php"><img src="../img/FitTrackLogo.png" alt="FitTrack Pro Logo" class="logo"></a>
            <div class="navbar-nav">
                <a class="nav-item nav-link" href="profile.php">Profile</a>
                <a class="nav-item nav-link" href="homepage.php">Home Page</a>
                <a class="nav-item nav-link" href="workoutpage.php">Workout</a>
                <a class="nav-item nav-link" href="Diet_Plan.php">Nutrition</a>
                <a class="nav-item nav-link" href="../backend/logout.php">Log out</a>
            </div>
        </div>
    </nav>

    <!-- Profile Section -->
    <section class="profile-section py-5">
        <div class="container">
            <h2>User Profile</h2>
            <div class="row">
                <div class="col-md-8">
                    <form action="profile.php" method="post">
                        <div class="form-group">
                            <label for="username">Username:</label>
                            <input type="text" class="form-control" id="username" name="username" value="<?php echo htmlspecialchars($row['username']); ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="firstname">First Name:</label>
                            <input type="text" class="form-control" id="firstname" name="firstname" value="<?php echo htmlspecialchars($row['firstname']); ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="lastname">Last Name:</label>
                            <input type="text" class="form-control" id="lastname" name="lastname" value="<?php echo htmlspecialchars($row['lastname']); ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="email">Email:</label>
                            <input type="email" class="form-control" id="email" name="email" value="<?php echo htmlspecialchars($row['email']); ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="age">Age:</label>
                            <input type="number" class="form-control" id="age" name="age" value="<?php echo htmlspecialchars($row['age']); ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="height">Height (cm):</label>
                            <input type="number" class="form-control" id="height" name="height" value="<?php echo htmlspecialchars($row['height']); ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="weight">Weight (kg):</label>
                            <input type="number" class="form-control" id="weight" name="weight" value="<?php echo htmlspecialchars($row['weight']); ?>" required>
                        </div>
                        <button type="submit" name="update_profile" class="btn btn-dark">Update Profile</button>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer Section -->
    <footer class="text-center py-4">
        <div class="container">
            <img src="../img/FitTrackLogo.png" alt="FitTrack Pro Logo" class="img-fluid mb-3">
            <p>Join FitTrack Pro today and take the first step towards a healthier, stronger, and more confident you. <br> Our community is here to support your journey every step of the way. Stay active, stay healthy!</p>
            <p>&copy; 2024 FitTrack Pro. All Rights Reserved.</p>
        </div>
    </footer>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>

<?php
if (isset($_POST['update_profile'])) {
    $new_username = $_POST['username'];
    $new_firstname = $_POST['firstname'];
    $new_lastname = $_POST['lastname'];
    $new_email = $_POST['email'];
    $new_age = $_POST['age'];
    $new_height = $_POST['height'];
    $new_weight = $_POST['weight'];

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $stmt = $conn->prepare('UPDATE users SET username = ?, firstname = ?, lastname = ?, email = ?, age = ?, height = ?, weight = ? WHERE userID = ?');
    $stmt->bind_param('ssssiiii', $new_username, $new_firstname, $new_lastname, $new_email, $new_age, $new_height, $new_weight, $user_ID);

    if ($stmt->execute()) {
        echo "Profile updated successfully!";
    } else {
        echo "Error updating profile: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}
?>
