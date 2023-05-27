<?php
session_start();
if( !isset($_SESSION["login"]) ){
    header("location: login.php");
    exit;
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://fonts.googleapis.com/css?family=Cormorant Upright' rel='stylesheet'>
    <link href='https://fonts.googleapis.com/css?family=Oswald' rel='stylesheet'>
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/style.css">
    <script src="https://unpkg.com/feather-icons"></script>
    <title>Dashboard</title>
    <style>
        body {
            background-image: url("img/bg-dashboard.jpg");
            background-repeat: no-repeat;
            background-position: left 80px top -300px;
            background-size: cover; 
        }
    </style>
</head>
<body>
    <div class="banner">
        <h3>Database Universitas</h3>
        <div class="logout">
            <a href="logout.php"><i class="color-black" data-feather="log-out"></i></a>
            <p>Logout</p>
        </div>
    </div>
    <h1>Dashboard</h1>
    <div class="sidebar">
        <a href="list_fakultas.php">Fakultas</a>
        <div class="searching">
            <p>Searching</p>
            <a href="searchingMhs.php">Mahasiswa</a>
            <a href="searchingDsn.php">Dosen</a>
            <a href="searchingMtkl.php">Mata Kuliah</a>
        </div>

        <a href="about.php">About</a>
    </div>

    <!-- icons -->
    <script>
      feather.replace();
    </script>
</body>
</html>