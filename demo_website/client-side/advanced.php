<?php
    include("../backend/connect.php"); // Assuming this file contains your database connection logic
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FitTrack Pro - Workout Page</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
    <link rel="stylesheet" href="../src/workoutpage.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
</head>
<body>
    <!-- Nav Bar -->
    <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container">
            <a class="navbar-brand" href="homepage.html"><img src="../img/FitTrackLogo.png" alt="FitTrack Pro Logo" class="logo"></a>
            <div class="navbar-nav">
                <a class="nav-item nav-link" href="profile.php">Profile</a> 
                <a class="nav-item nav-link" href="homepage.php">Home Page</a>
                <a class="nav-item nav-link" href="workoutpage.php">Workout</a>
                <a class="nav-item nav-link" href="Diet_Plan.php">Nutrition</a>
                <a class="nav-item nav-link" href="../backend/logout.php">Logout</a>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <div id="c">
        <div id="container">
          <div id="box">
            <div id="head">ONLINE WORKOUT GUIDE</div>
            <h1>Find Your Fitness.<br>Something for Everyone.</h1>
            <p>A huge selection of workout videos and programs to help you look and feel your best.</p>
          </div>
        </div>
    </div>  

    <!-- Section 1: Beginner Workouts -->
    <section class="cont">
        <div class="inside">
            <div class="title">
                <div><h2>Advanced Workouts</h2></div>
                <div><a href="#"><h2>View All Free Workouts</h2></a></div>
            </div>
            <div class="cardcont">
                <?php
                // Fetch Beginner Workouts
                $sql = "SELECT * FROM workoutplan WHERE planCategoryID = 3"; // Assuming category ID 1 is for beginner workouts
                $result = mysqli_query($conn, $sql);

                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        $workoutDescription = $row['workoutDescription'];
                        $workoutPlanName = $row['workoutPlanName'];
                        $name = $row['workoutPlanName'];
                        $imageData = base64_encode($row['workoutImage']); // Assuming workoutImage is stored as binary data

                        echo '
                            <div class="cards">
                                <a href="#">
                                    <div class="upper">
                                        <img src="data:image/jpeg;base64,' . $imageData . '" alt="' . $name . '">
                                    </div>
                                </a>
                                <div class="bottom">
                                    <div class="workout-title">
                                        <h1>' . $name . '</h1>
                                         <h1>' . $workoutDescription . '</h1>
                                    </div>
                                    <div class="schedule">
                                        <div><i class="fa-regular fa-calendar"></i></div>
                                        <div><i class="fa-solid fa-ellipsis-vertical"></i></div>
                                    </div>
                                </div>
                            </div>
                        ';
                    }
                } else {
                    echo '<p>No workout plans available.</p>';
                }
                ?>
            </div>
        </div>
    </section>

   

    <!------------------- Footer Part --------------------------->
    <footer class="text-center py-4">
        <div class="container">
            <img src="../img/FitTrackLogo.png" alt="FitTrack Pro Logo" class="img-fluid mb-3">
            <p>Join FitTrack Pro today and take the first step towards a healthier, stronger, and more confident you. </br> Our community is here to support your journey every step of the way. Stay active, stay healthy!</p>
            <p>&copy; 2024 FitTrack Pro. All Rights Reserved.</p>
        </div>
    </footer>

</body>
</html>
