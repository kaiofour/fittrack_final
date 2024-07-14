<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Diet Plan Website</title>
    <link rel="stylesheet" href="../src/dietplan.css">
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
        <!-- New Banner Section -->
        <section id="banner">
            <div class="banner-content">
                <img src="../img/guy.jpg" alt="Healthier You" class="banner-image">
                <div class="banner-text">
                    <h1>Discover Deliciously Balanced Bites for a Healthier You</h1>
                </div>
            </div>
        </section>
        
        <!-- Existing Recommended Meal Plans Section -->
        <section id="recommended">
            <h2 class="main-title">Top 5 Recommended Meal Plans</h2>
            <div class="top-meal-plans">
                <div class="meal-plan">
                    <img src="../img/1.png" alt="Mediterranean Diet">
                    <h3>Mediterranean Diet</h3>
                    <button class="learn-more-btn" onclick="openModal('mediterranean')">Learn More</button>
                </div>
                <div class="meal-plan">
                    <img src="../img/5.png" alt="Keto Diet">
                    <h3>Keto Diet</h3>
                    <button class="learn-more-btn" onclick="openModal('keto')">Learn More</button>
                </div>
                <div class="meal-plan">
                    <img src="../img/3.png" alt="DASH Diet">
                    <h3>DASH Diet</h3>
                    <button class="learn-more-btn" onclick="openModal('dash')">Learn More</button>
                </div>
                <div class="meal-plan">
                    <img src="../img/2.png" alt="Intermittent Fasting">
                    <h3>Intermittent Fasting (16/8 Method)</h3>
                    <button class="learn-more-btn" onclick="openModal('intermittent')">Learn More</button>
                </div>
                <div class="meal-plan">
                    <img src="../img/4.png" alt="Vegan Diet">
                    <h3>Vegan Diet</h3>
                    <button class="learn-more-btn" onclick="openModal('vegan')">Learn More</button>
                </div>
            </div>
        </section>
        
        <!-- Existing More Meal Plans Section -->
        <section id="more-meal-plans">
            <h2 class="main-title">Explore Our Meal Plan Categories</h2>
                <div class="categories-container">
                    <div class="category">
                        <img src="../img/loss.jpg" alt="Weight Loss Plans">
                        <h3>Weight Loss Plans</h3>
                        <a class="see-more-btn" href="weightloss.php">See More</a>
                    </div>
                    <div class="category">
                        <img src="../img/maintain.jpeg" alt="Weight Maintance Plans">
                        <h3>Weight Maintenance Plans</h3>
                        <a class="see-more-btn" href="./weightmain.php">See More</a>
                    </div>
                    <div class="category">
                        <img src="../img/gain.jpg" alt="Weight Gain">
                        <h3>Weight Gain Plans"</h3>
                        <a class="see-more-btn" href="./weightgain.php">See More</a>
        </div>
    </div>
</section>

    </main>
    
    <!-- Existing Footer Section -->
    <footer class="footer">
        <img src="../img/FitTrackLogo.png" alt="FitTrack Pro Logo" class="logo">
        <p>&copy; 2023 FitTrack Pro. All rights reserved.</p>
    </footer>
    
    <!-- Modal Section -->
    <!-- Update the modal structure -->
<div id="modal" class="modal">
    <div class="modal-content">
        <span class="close" onclick="closeModal()">&times;</span>
        <div class="modal-left">
            <img id="modal-image" src="../img/modal-image.jpg" alt="Modal Image">
        </div>
        <div class="modal-right">
            <h2 id="modal-title">Meal Plan Title</h2>
            <p id="modal-description">Description of the meal plan.</p>
            <p>Schedule:</p>
            <ul id="modal-schedule">
                <li>Monday: ...</li>
                <li>Tuesday: ...</li>
                <!-- Additional days go here -->
            </ul>
        </div>
    </div>
</div>
    <script src="../js/scripts.js"></script>
</body>
</html>