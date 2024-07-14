<?php
$host = "localhost";
$user = "root";
$password = "";
$db = "fittrack";

$connect = new mysqli($host, $user, $password, $db);
$workoutPlanID = "";
$workoutPlanName = "";
$workoutDescription = "";
$planCategoryID = "";
$workoutImage = "";
$errorMessage = "";
$successMessage = "";
mysqli_report(MYSQLI_REPORT_STRICT);

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    // Display the data
    if (!isset($_GET["workoutPlanID"])) {
        header("location:../admin-side/admin_workoutpage.php");
        exit;
    }
    $workoutPlanID = $_GET["workoutPlanID"];

    $sql = "SELECT * FROM workoutplan WHERE workoutPlanID=$workoutPlanID";
    $result = $connect->query($sql);
    $row = $result->fetch_assoc();

    if (!$row) {
        header("location:../admin-side/admin_workoutpage.php");
        exit;
    }

    $workoutPlanID = $row["workoutPlanID"];
    $workoutPlanName = $row["workoutPlanName"];
    $workoutDescription = $row["workoutDescription"];
    $planCategoryID = $row["planCategoryID"];
    $workoutImage = $row["workoutImage"];
} elseif ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Update the data
    $workoutPlanID = $_POST["workoutPlanID"];
    $workoutPlanName = $_POST["workoutPlanName"];
    $workoutDescription = $_POST["workoutDescription"];
    $planCategoryID = $_POST["planCategoryID"];

    // Handle the image upload
    if ($_FILES['workoutImage']['size'] > 0) {
        $image = $_FILES['workoutImage']['tmp_name'];
        $workoutImage = file_get_contents($image);
    }

    // Check if all fields are filled
    if (empty($workoutPlanName) || empty($workoutDescription) || empty($planCategoryID)) {
        $errorMessage = "All fields are required";
    } else {
        // Update query
        if ($_FILES['workoutImage']['size'] > 0) {
            $sql = "UPDATE workoutplan SET workoutPlanName='$workoutPlanName', workoutDescription='$workoutDescription', planCategoryID='$planCategoryID', workoutImage='$workoutImage' WHERE workoutPlanID=$workoutPlanID";
        } else {
            $sql = "UPDATE workoutplan SET workoutPlanName='$workoutPlanName', workoutDescription='$workoutDescription', planCategoryID='$planCategoryID' WHERE workoutPlanID=$workoutPlanID";
        }

        $result = $connect->query($sql);
        if (!$result) {
            $errorMessage = "Invalid Query: " . $connect->error;
        } else {
            $successMessage = "Workout updated successfully.";
            header("location:../admin-side/admin_workoutpage.php");
            exit;
        }
    }
}
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

        <?php
            if(!empty($errorMessage))
            {
                echo "
                    <div class='alert alert-warning alert-dismissible fade show' role='alert'>
                        <strong>$errorMessage</strong>
                        <button type'button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                    </div>
                ";
            }
        ?>

        <form method="post">
            <input type="hidden" name="workoutPlanID" value="<?php echo $workoutPlanID; ?>">

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
                    <input type="file" name="workoutImage" required><br>
                </div>
            </div>
           
            <?php
                if(!empty($successMessage))
                {
                    echo "
                    <div class='alert alert-success alert-dismissible fade show' role='alert'>
                        <strong>$successMessage</strong>
                        <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                    </div>
                ";
                }
            ?>

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