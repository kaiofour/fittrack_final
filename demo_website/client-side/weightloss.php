<?php
    include("../backend/connect.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Weight Loss Meal Plans</title>
    <link rel="stylesheet" href="../src/dietplan.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
</head>
<body>
    <!-- Navigation Bar -->
    <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container">
            <a class="navbar-brand" href="homepage.html"><img src="../img/FitTrackLogo.png" alt="FitTrack Pro Logo" class="logo"></a>
            <div class="navbar-nav">
            <a class="nav-item nav-link" href="profile.php">Profile</a>
                <a class="nav-item nav-link" href="homepage.php">Home Page</a>
                <a class="nav-item nav-link" href="workoutpage.php">Workout</a>
                <a class="nav-item nav-link" href="Diet_Plan.php">Nutrition</a>
                <a class="nav-item nav-link" href="../backend/logout.php">Log out</a>
            </div>
        </div>
    </nav>
    <main>
        <section id="banner">
            <div class="banner-content">
                <img src="../img/guy.jpg" alt="Healthier You" class="banner-image">
                <div class="banner-text">
                    <h1>"The only bad workout is the one that didn't happen."</h1>
                </div>
            </div>
        </section>
        <section id="more-meal-plans">
            <h1 class="main-title">Weight Loss</h1>
            <div class="categories-container">
                <?php
                    $sql = "SELECT * FROM dietplan WHERE bmiCategoryID = 1"; // Fetch only Weight Loss plans
                    $result = mysqli_query($conn, $sql);

                    if (mysqli_num_rows($result) > 0) {
                        while($row = mysqli_fetch_assoc($result)){
                            $name = $row["dietPlanName"];
                            $imageData = base64_encode($row["dietImage"]);

                            echo '
                                <div class="category">
                                    <img src="data:image/jpeg;base64,'.$imageData.'" alt="' . $name . '">
                                    <h4>' . $name . '</h4>
                                    <button class="learn-more-btn" onclick="openModal(\'meal6\')">Learn More</button>
                                </div>
                            ';
                        }
                    } else {
                        echo '<p>No meal plans available for this category.</p>';
                    }
                ?>
            </div>
        </section>
    </main>
    <footer class="footer">
        <img src="../img/FitTrackLogo.png" alt="FitTrack Pro Logo" class="logo">
        <p>&copy; 2023 FitTrack Pro. All rights reserved.</p>
    </footer>
    <div id="modal" class="modal">
        <div class="modal-content">
            <span class="close" onclick="closeModal()">&times;</span>
            <div class="modal-left">
                <img id="modal-image" src="modal-image.jpg" alt="Modal Image">
            </div>
            <div class="modal-right">
                <h2 id="modal-title">Meal Plan Title</h2>
                <p id="modal-description">Description of the meal plan.</p>
                <p>Schedule:</p>
                <ul id="modal-schedule">
                    <li>Monday: ...</li>
                    <li>Tuesday: ...</li>
                </ul>
            </div>
        </div>
    </div>
    <script src="../script/scripts.js"></script>
</body>
</html>
