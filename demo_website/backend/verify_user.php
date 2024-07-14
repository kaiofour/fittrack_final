<?php

include("../backend/connect.php");

session_start();


if($_SERVER["REQUEST_METHOD"] === "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    $sql = "SELECT userID FROM users WHERE username = '$username' AND password = '$password'";

    $result = mysqli_query($conn, $sql);

    if(mysqli_num_rows($result) != 0){
        while($row = mysqli_fetch_assoc($result)){
            $_SESSION["user_id"] = $row["userID"];
        }
        header("Location: ../client-side/homepage.php");
    }else{
        header("Location: ../client-side/login.php");
    }

} else {
    header("Location: ../client-side/login.php");
    die();
}
