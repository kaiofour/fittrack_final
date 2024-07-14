<?php

include("../backend/connect.php");

session_start();


if($_SERVER["REQUEST_METHOD"] === "POST") {
    $username = $_POST["username"];
    $full_name = $_POST["full_name"];
    $email = $_POST["email"];
    $age = $_POST["age"];
    $height = $_POST["height"];
    $weight = $_POST["weight"];
    $user_id = $_POST["user_id"];

    $sql = "UPDATE users SET username = '$username', firstname = '$full_name', email = '$email', age = $age, height = $height, weight = $weight WHERE userID = '$user_id'";

    mysqli_query($conn, $sql);

    header("Location: ../client-side/profile.php");

} else {
    header("Location: ../login.php");
    die();
}
