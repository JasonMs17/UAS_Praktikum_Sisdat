<?php
session_start();
require 'functions.php';

if( isset($_SESSION["login"]) ) {
    header("location: dashboard.php");
}

if(isset($_POST["register"])){
    if( registrasi($_POST) > 0 ){
        echo "<script>
                alert('user baru berhasil ditambahkan');
            </script>";
        header('Location: index.php');
    } else {
        echo mysqli_error($db);
    }
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
    <title>Registrasi</title>
</head>
<body>
    <div class="container">
        <h1>Register</h1>
        <form action="" method="post">
            <label for="username">Username : </label>
            <input type="text" name="username" id="username" required>

            <label for="password">Password : </label>
            <input type="password" name="password" id="password" required>

            <label for="password2">Konfirmasi Password : </label>
            <input type="password" name="password2" id="password2" required>

            <button type="submit" name="register">Register</button>
        </form>    
        <a href="login.php">Login</a>
    </div>


</body>
</html>