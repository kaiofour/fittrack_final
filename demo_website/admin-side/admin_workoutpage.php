<?php
session_start();
if (!isset($_SESSION["username"])) {
    header("Location: admin.php");
    exit();
}

$host = "localhost";
$user = "root";
$password = "";
$db = "fittrack";

// Create connection
$conn = new mysqli($host, $user, $password, $db);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

?>

<!DOCTYPE html>
<html>

<head>
    <title>Admin Panel</title>
    <link href="../src/admin_workoutpage.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</head>

<body>
    <header>
        <h2 class="headTitle"></h2>
        <nav class="navbar-nav">
            <a href="admin_workoutpage.php" class="active">Workout</a>
            <a href="admin_dietplan.php" class="active">Diet Plan</a>
            <a href="../action/logout.php" class="active">Logout</a>
        </nav>
    </header>

    <div class="container mb-14"></div>
    <div class="container pt-5">
        <h2 class="titlewrap mb-5">Dashboard</h2>
        <a class="btn btn-success" href="../action/create.php" role="button">Add Workout</a>
        <br>
        <table class="table">
            <thead>
                <tr>
                    <th>workoutPlanID</th>
                    <th>workoutPlanName</th>
                    <th>workoutDescription</th>
                    <th>planCategoryID</th>
                    <th>workoutImage</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $sql = "SELECT * FROM workoutplan";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "
                        <tr>
                            <td>{$row['workoutPlanID']}</td>
                            <td>{$row['workoutPlanName']}</td>
                            <td>{$row['workoutDescription']}</td>
                            <td>{$row['planCategoryID']}</td>
                            <td><img src='data:image/jpeg;base64," . base64_encode($row['workoutImage']) . "' alt='{$row['workoutPlanName']}' style='width:50px;height:50px;'></td>
                            <td>
                                <a class='btn btn-primary btn-sm' href='../action/edit.php?workoutPlanID={$row['workoutPlanID']}'>Edit</a>
                                <a class='btn btn-danger btn-sm' href='../action/delete.php?workoutPlanID={$row['workoutPlanID']}'>Delete</a>
                            </td>
                        </tr>";
                    }
                } else {
                    echo "<tr><td colspan='6'>No records found</td></tr>";
                }
                $conn->close();
                ?>
            </tbody>
        </table>
    </div>
</body>

</html>
