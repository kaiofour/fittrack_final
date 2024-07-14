<?php
include '../backend/connect.php'; // Your database connection

$workoutPlanName = "";
$workoutDescription = "";
$planCategoryID = "";
$errorMessage = "";
$successMessage = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $workoutPlanName = $_POST['workoutPlanName'];
    $workoutDescription = $_POST['workoutDescription'];
    $planCategoryID = $_POST['planCategoryID'];

    // Handle the image upload
    $image = $_FILES['workoutImage']['tmp_name'];
    $imgContent = file_get_contents($image);

    // Prepare and bind SQL statement
    $sql = "INSERT INTO workoutplan (workoutPlanName, workoutDescription, planCategoryID, workoutImage) 
            VALUES (?, ?, ?, ?)";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "ssis", $workoutPlanName, $workoutDescription, $planCategoryID, $imgContent);

    // Execute statement
    if (mysqli_stmt_execute($stmt)) {
        $successMessage = "Workout added successfully";
        header("location: ../admin-side/admin_workoutpage.php");
        exit;
    } else {
        $errorMessage = "Error: " . mysqli_error($conn);
    }

    // Close statement
    mysqli_stmt_close($stmt);
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Add New Workout</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <link href="../src/admin_workoutpage.css" rel="stylesheet">
</head>

<body>
    <div class="container my-5">
        <h2 class="txt mb-5 text-center">New Workout</h2>

        <?php if (!empty($errorMessage)): ?>
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <strong><?php echo $errorMessage; ?></strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php endif; ?>

        <form method="post" enctype="multipart/form-data">
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label text-end"><b>Workout Name: </b></label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="workoutPlanName" value="<?php echo $workoutPlanName; ?>">
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label text-end"><b>Workout Description: </b></label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="workoutDescription" value="<?php echo $workoutDescription; ?>">
                </div>
            </div>
            
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label text-end"><b>Plan Category ID: </b></label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="planCategoryID" value="<?php echo $planCategoryID; ?>">
                </div>
            </div>
            
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label text-end"><b>Workout Image: </b></label>
                <div class="col-sm-6">
                    <input type="file" name="workoutImage" required>
                </div>
            </div>

            <?php if (!empty($successMessage)): ?>
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong><?php echo $successMessage; ?></strong>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            <?php endif; ?>

            <div class="row mb-3">
                <div class="offset-sm-3 col-sm-3 d-grid">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
                <div class="col-sm-3 d-grid">
                    <a class="btn btn-outline-danger" href="../admin-side/admin_workoutpage.php" role="button">Cancel</a>
                </div>
            </div>
        </form>
    </div>
</body>
</html>
