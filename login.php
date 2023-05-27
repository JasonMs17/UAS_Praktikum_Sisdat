<?php
session_start();
require 'functions.php';

if( isset($_SESSION["login"]) ) {
    header("location: dashboard.php");
}

if( isset($_POST["login"]) ) {
    
    $username = $_POST["username"];
    $password = $_POST["password"];

    $result = mysqli_query($db, "SELECT * FROM users WHERE username = '$username'");

    if( mysqli_num_rows($result) === 1) {
        $row = mysqli_fetch_assoc($result);
        if(password_verify($password, $row["password"])){
            $_SESSION["login"] = true;
            header("location: dashboard.php");
            exit;
        }
    }
    $error = true;

}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://fonts.googleapis.com/css?family=Cormorant Upright' rel='stylesheet'>
    <link href='https://fonts.googleapis.com/css?family=Crimson Pro' rel='stylesheet'>
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/login.css">
    <title>Login</title>
</head>
<body>
    <div class="container">
        <h1>Login</h1>
        <?php if(isset($error)) : ?>
            <p>username / password salah</p>
        <?php endif; ?>
        <form action="" method="post">
            <label for="username">Username : </label>
            <input type="text" name="username" id="username" required>
            <label for="password">Password : </label>
            <input type="password" name="password" id="password" required>
            <button type="submit" name="login">Login</button>
        </form>
        <a href="registrasi.php">register</a>
    </div>
</body>
</html>