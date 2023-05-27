<?php
session_start();
require 'functions.php';

if( !isset($_SESSION["login"]) ){
    header("location: login.php");
    exit;
}

$matkul = query("
        SELECT matkul.id_matkul, matkul.nama_matkul, jurusan.nama_jurusan, fakultas.nama_fakultas
        FROM matkul, jurusan, fakultas
        WHERE matkul.id_jurusan = jurusan.id_jurusan
        AND jurusan.id_fakultas = fakultas.id_fakultas
        ");

if( isset($_POST["cari"]) ){
    $matkul = cariMtkl($_POST["keyword"]);
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
    <title>Searching Mata Kuliah</title>
</head>
<body>
    <div class="banner">
        <h3>Database Universitas</h3>
        <div class="logout">
            <a href="logout.php"><i class="color-black" data-feather="log-out"></i></a>
            <p>Logout</p>
        </div>
    </div>
    <a href="dashboard.php"><i class="back" data-feather="arrow-left-circle"></i></a>
    <div class="container">    
        <h1>Daftar Mata Kuliah</h1>
        <form class="cari" action="" method="post">
            <input type="text" name="keyword" autofocus size="35" placeholder="masukkan kunci pencarian">
            <button type="submit" name="cari">Cari</button>
        </form>
        <table border="1" cellpadding="10" cellspacing="0">
            <tr>
                <th>No</th>
                <th>ID Matkul</th>
                <th>Nama Matkul</th>
                <th>Jurusan</th>
                <th>Fakultas</th>
            </tr>
            <?php $i = 1 ?>
            <?php foreach( $matkul as $mtkl ) : ?>
                <tr>
                    <td><?php echo $i; ?></td>
                    <td><?php echo $mtkl["nama_matkul"]; ?></td>
                    <td><?php echo $mtkl["id_matkul"]; ?></td>
                    <td><?php echo $mtkl["nama_jurusan"]; ?></td>
                    <td><?php echo $mtkl["nama_fakultas"]; ?></td>
                </tr>
                <?php $i++; ?>
                <?php endforeach; ?>
        </table>
    </div>

    <!-- icons -->
    <script>
      feather.replace();
    </script>
</body>
</html>