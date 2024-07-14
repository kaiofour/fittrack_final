<?php
include("./connect.php");

$dietPlanID = $_GET['id'];

$sql = "DELETE FROM dietplan WHERE dietPlanID=$dietPlanID";

if ($conn->query($sql) === TRUE) {
    echo "Diet plan deleted successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
