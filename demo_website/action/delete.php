<?php

if(isset($_GET["workoutPlanID"]))
{
    $workoutPlanID = $_GET["workoutPlanID"];

    $host= "localhost";
    $user= "root";
    $password= "";
    $db = "fittrack";

    $connect = new mysqli($host, $user, $password, $db);

    $sql = "DELETE FROM workoutplan WHERE workoutPlanID=$workoutPlanID";
    $connect->query($sql);
}

header("location:../admin-side/admin_workoutpage.php");
exit;

?>