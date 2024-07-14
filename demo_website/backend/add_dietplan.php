<?php
include '../backend/connect.php'; // Your database connection

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $dietPlanName = $_POST['dietPlanName'];
    $dietDescription = $_POST['dietDescription'];
    $bmiCategoryID = $_POST['bmiCategoryID'];

    // Handle the image upload
    $image = $_FILES['dietImage']['tmp_name'];
    $imgContent = addslashes(file_get_contents($image));

    // Insert into database
    $sql = "INSERT INTO dietplan (dietPlanName, dietDescription, bmiCategoryID, dietImage) 
            VALUES ('$dietPlanName', '$dietDescription', $bmiCategoryID, '$imgContent')";
    if (mysqli_query($conn, $sql)) {
        echo "The diet plan has been added successfully.";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}
?>