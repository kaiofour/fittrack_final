<!DOCTYPE html>
<html>
<head>
    <title>Admin Page</title>
    <link rel="stylesheet" href="../src/admin_styles.css">
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

    <h1>Admin Page</h1>

    <h2>Diet Plans</h2>
    <?php
    // Fetch Diet Plans
    include("../backend/connect.php");
    $sql = "SELECT * FROM dietplan";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo "<table><tr><th>ID</th><th>Name</th><th>Description</th><th>BMI Category ID</th><th>Image</th><th>Actions</th></tr>";
        while($row = $result->fetch_assoc()) {
            echo "<tr>
                    <td>{$row['dietPlanID']}</td>
                    <td>{$row['dietPlanName']}</td>
                    <td>{$row['dietDescription']}</td>
                    <td>{$row['bmiCategoryID']}</td>
                    <td><img src='data:image/jpeg;base64,".base64_encode($row['dietImage'])."' alt='{$row['dietPlanName']}' style='width:50px;height:50px;'></td>
                    <td>
                        <a href='../backend/edit_dietplan.php?id={$row['dietPlanID']}'>Edit</a>
                        <a href='../backend/delete_dietplan.php?id={$row['dietPlanID']}'>Delete</a>
                    </td>
                </tr>";
        }
        echo "</table>";
    } else {
        echo "No diet plans found.";
    }
    ?>

    <h2>Add New Diet Plan</h2>
    <form action="../backend/add_dietplan.php" method="post" enctype="multipart/form-data">
        Name: <input type="text" name="dietPlanName" required><br>
        Description: <input type="text" name="dietDescription" required><br>
        BMI Category ID: <input type="number" name="bmiCategoryID" required><br>
        Image: <input type="file" name="dietImage" required><br>
        <input type="submit" value="Add Diet Plan">
    </form>

    <!-- Repeat similar sections for other tables -->

</body>
</html>