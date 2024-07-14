<?php
include("../backend/connect.php");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $workoutPlanID = $_POST['workoutPlanID'];
    $workoutPlanName = $_POST['workoutPlanName'];
    $workoutDescription = $_POST['workoutDescription'];
    $planCategoryID = $_POST['planCategoryID'];

    // Check if a new image is uploaded
    if (isset($_FILES['workoutImage']) && $_FILES['workoutImage']['tmp_name']) {
        $image = $_FILES['workoutImage']['tmp_name'];
        $imgContent = addslashes(file_get_contents($image));

        // Update with image
        $sql = "UPDATE workoutplan SET workoutPlanName='$workoutPlanName', workoutDescription='$workoutDescription', planCategoryID=$planCategoryID, workoutImage='$imgContent' WHERE workoutPlanID=$workoutPlanID";
    } else {
        // Update without image
        $sql = "UPDATE workoutplan SET workoutPlanName='$workoutPlanName', workoutDescription='$workoutDescription', planCategoryID=$planCategoryID WHERE workoutPlanID=$workoutPlanID";
    }

    if ($conn->query($sql) === TRUE) {
        echo "Workout updated successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
} else {
    $workoutPlanID = $_GET['workoutPlanID'];
    $sql = "SELECT * FROM workoutplan WHERE workoutPlanID=$workoutPlanID";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Workout</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <link href="../src/admin_workoutpage.css" rel="stylesheet">
</head>

<body>
    <div class="container my-5">
        <h2 class="txt mb-5 text-center">Edit Workout</h2>

        <?php if (isset($errorMessage) && !empty($errorMessage)): ?>
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <strong><?php echo $errorMessage; ?></strong>
                <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
            </div>
        <?php endif; ?>

        <form action="edit.php" method="post" enctype="multipart/form-data">
            <input type="hidden" name="workoutPlanID" value="<?php echo $row['workoutPlanID']; ?>">

            <div class="row mb-3">
                <label class="col-sm-3 col-form-label text-end"><b>Workout Name: </b></label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="workoutPlanName" value="<?php echo $row['workoutPlanName']; ?>">
                </div>
            </div>

            <div class="row mb-3">
                <label class="col-sm-3 col-form-label text-end"><b>Workout Description: </b></label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="workoutDescription" value="<?php echo $row['workoutDescription']; ?>">
                </div>
            </div>
            
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label text-end"><b>Plan Category ID: </b></label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="planCategoryID" value="<?php echo $row['planCategoryID']; ?>">
                </div>
            </div>
            
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label text-end"><b>Workout Image: </b></label>
                <div class="col-sm-6">
                    <input type="file" name="workoutImage"><br>
                    <img src="data:image/jpeg;base64,<?php echo base64_encode($row['workoutImage']); ?>" alt="<?php echo $row['workoutPlanName']; ?>" style="width:100px;height:100px;"><br>
                </div>
            </div>
           
            <?php if (isset($successMessage) && !empty($successMessage)): ?>
                <div class='alert alert-success alert-dismissible fade show' role='alert'>
                    <strong><?php echo $successMessage; ?></strong>
                    <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
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

<?php
}
$conn->close();
?>
