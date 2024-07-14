<?php
include("./connect.php");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $dietPlanID = $_POST['dietPlanID'];
    $dietPlanName = $_POST['dietPlanName'];
    $dietDescription = $_POST['dietDescription'];
    $bmiCategoryID = $_POST['bmiCategoryID'];

    // Check if a new image is uploaded
    if (isset($_FILES['dietImage']) && $_FILES['dietImage']['tmp_name']) {
        $image = $_FILES['dietImage']['tmp_name'];
        $imgContent = addslashes(file_get_contents($image));

        // Update with image
        $sql = "UPDATE dietplan SET dietPlanName='$dietPlanName', dietDescription='$dietDescription', bmiCategoryID=$bmiCategoryID, dietImage='$imgContent' WHERE dietPlanID=$dietPlanID";
    } else {
        // Update without image
        $sql = "UPDATE dietplan SET dietPlanName='$dietPlanName', dietDescription='$dietDescription', bmiCategoryID=$bmiCategoryID WHERE dietPlanID=$dietPlanID";
    }

    if ($conn->query($sql) === TRUE) {
        echo "Diet plan updated successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
} else {
    $dietPlanID = $_GET['id'];
    $sql = "SELECT * FROM dietplan WHERE dietPlanID=$dietPlanID";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Edit Diet Plan</title>
    <style>
        body {
            background-color: #f8f9fa;
        }

        .form-container {
            width: 390px;
            margin: 150px auto;
            padding: 40px;
            border: 1px solid #ced4da;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .form-container h2 {
            margin-bottom: 30px;
        }

        .form-control {
            height: 40px;
            border-radius: 20px;
            padding: 0 15px;
            margin-bottom: 15px;
            border: 1px solid #ced4da;
        }

        .form-control-file {
            margin-bottom: 15px;
        }

        .form-image-preview {
            max-width: 100px;
            max-height: 100px;
            margin-bottom: 15px;
        }

        .btn {
            display: inline-block;
            background-color: #007bff;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 25px;
            cursor: pointer;
            text-align: center;
            text-decoration: none;
            transition: background-color 0.3s;
        }

        .btn:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="form-container">
        <h2>Edit Diet Plan</h2>
        <form action="edit_dietplan.php" method="post" enctype="multipart/form-data">
            <input type="hidden" name="dietPlanID" value="<?php echo $row['dietPlanID']; ?>">
            Name: <input type="text" name="dietPlanName" value="<?php echo $row['dietPlanName']; ?>" class="form-control"><br>
            Description: <input type="text" name="dietDescription" value="<?php echo $row['dietDescription']; ?>" class="form-control"><br>
            BMI Category ID: <input type="number" name="bmiCategoryID" value="<?php echo $row['bmiCategoryID']; ?>" class="form-control"><br>
            Image: <input type="file" name="dietImage" class="form-control-file"><br>
            <?php if (!empty($row['dietImage'])): ?>
                <img src="data:image/jpeg;base64,<?php echo base64_encode($row['dietImage']); ?>" alt="<?php echo $row['dietPlanName']; ?>" class="form-image-preview"><br>
            <?php endif; ?>
            <input type="submit" value="Update Diet Plan" class="btn">
        </form>
    </div>
</body>
</html>

<?php
}
$conn->close();
?>
