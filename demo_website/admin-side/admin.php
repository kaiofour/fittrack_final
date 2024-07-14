<?php
 
    session_start();
    if(isset($_SESSION["username"])){
        header("Location: admin_workoutpage.php");
        exit();
    }
 
$host= "localhost";
$user= "root";
$password= "";
$db = "fittrack";
 
mysqli_report(MYSQLI_REPORT_STRICT);
$errorMessage = "";
$username = "";
$password = "";
 
$data = mysqli_connect($host, $user, $password, $db);
if($data===false)
{
    die("Connection cannot establish.");
}
 
 
 
if($_SERVER["REQUEST_METHOD"]=="POST")
{
    $username = $_POST["username"];
    $password = $_POST["password"];
 
    $sql = "select * from admin where username= '".$username."' AND password= '".$password."' ";
 
    $result = mysqli_query($data, $sql);
    if ($result) {
        $row = mysqli_fetch_array($result); // check if null or not
        if($row && $row["username"] === $username && $row["password"] === $password)
        {
            $_SESSION["username"] = $username;
            header("location:admin_workoutpage.php");
            exit; // stop script execution after redirecting
        } else {
            $errorMessage = "Invalid Login.";
        }
    } else {
        $errorMessage = "Error executing query: ".$data->error;
    }
    
}
 
?>


<!DOCTYPE html>
<html>

<head>
    <title>Admin</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <link href="../src/admin.css" rel="stylesheet">
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-lg-4 mx-auto">
                <div class="login-form">
                    <h2 class="text-center">Login</h2>

                    <form action="#" method="POST">
                        <div class="form-group">
                            <input type="text" name="username" class="form-control" placeholder="Username" required>
                        </div>
                        <div class="form-group">
                            <input type="password" name="password" class="form-control" placeholder="Password" required>
                        </div>
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
                        <button type="submit" class="btn btn-primary btn-block">Login</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

</body>


</html>