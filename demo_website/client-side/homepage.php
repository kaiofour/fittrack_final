<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FitTrack</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="../src/homepage.css">
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

    <!-- Hero Section -->
    <section class="hero-section d-flex align-items-center">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <h1>make your <br>BODY SHAPE</h1>
                    <p>Being physically active can improve your brain health, help manage weight, reduce the risk of disease, strengthen bones and muscles, and improve your ability to do everyday activities.</p>
                </div>
                <div class="col-md-6">
                    <img src="../img/img1.png" alt="Gym Image" class="img-fluid">
                </div>
            </div>
        </div>
    </section>

    <!-- Workout Programs Section -->
    <section class="workout-programs py-5">
        <div class="container">
            <h2>Workout Programs</h2>
            <div class="row">
                <div class="col-md-4">
                    <div class="card">
                        <img src="../img/img2.png" alt="Beginner Friendly" class="card-img-top">
                        <div class="card-body">
                            <h5 class="card-title">Beginner Friendly</h5>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <img src="../img/img3.png" alt="Moderate to Advanced" class="card-img-top">
                        <div class="card-body">
                            <h5 class="card-title">Moderate to Advanced</h5>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <img src="../img/img4.png" alt="Weight Loss" class="card-img-top">
                        <div class="card-body">
                            <h5 class="card-title">Weight Loss</h5>
                        </div>
                    </div>
                </div>
                <a href="workoutpage.php" class="btn btn-warning">Get Started</a>
            </div>
        </div>
    </section>

    <!-- Recipes Section -->
<section class="recipes-section py-5">
    <div class="container">
        <h2>Recipes</h2>
        <div class="row">
            <div class="col-md-6">
                <div class="recipe-card">
                    <img src="../img/img5.png" alt="Protein-packed power bowl" class="img-fluid rounded-image">
                    <h3>Protein-packed power bowl</h3>
                    <p>A colorful protein-packed power bowl filled with flavorful, meaty grilled satay tofu and an array of vibrant veggies on a bed of fluffy quinoa. Completed with a healthy and delicious satay dipping sauce and crushed roasted peanuts. Delicious!</p>
                </div>
            </div>
            <div class="col-md-6">
                <ul class="list-group">
                    <li class="list-group-item">
                        <img src="../img/img6.png" alt="High Protein Recipes" class="img-fluid recipe-list-image">
                        High Protein Recipes
                    </li>
                    <li class="list-group-item">
                        <img src="../img/img7.png" alt="Low Carb Recipes" class="img-fluid recipe-list-image">
                        Low Carb Recipes
                    </li>
                    <li class="list-group-item">
                        <img src="../img/img8.png" alt="Dairy Free Recipes" class="img-fluid recipe-list-image">
                        Dairy Free Recipes
                    </li>
                    <li class="list-group-item">
                        <img src="../img/img9.png" alt="Vegetarian Recipes" class="img-fluid recipe-list-image">
                        Vegetarian Recipes
                    </li>
                </ul>
                <a href="./weightmain.php" class="btn btn-dark mt-3">View More Recipes</a>
            </div>
        </div>
    </div>
</section>

    <!-- Footer Section -->
    <footer class="text-center py-4">
    <div class="container">
        <img src="../img/FitTrackLogo.png" alt="FitTrack Pro Logo" class="img-fluid mb-3">
        <p>Join FitTrack Pro today and take the first step towards a healthier, stronger, and more confident you. </br> Our community is here to support your journey every step of the way. Stay active, stay healthy!</p>
        <p>&copy; 2024 FitTrack Pro. All Rights Reserved.</p>
    </div>
</footer>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
