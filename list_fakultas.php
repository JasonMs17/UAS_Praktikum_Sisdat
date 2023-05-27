<?php
session_start();
require 'functions.php';
if( !isset($_SESSION["login"]) ){
    header("location: login.php");
    exit;
}

$action = "Tambah";

$fakultas = query("SELECT * FROM fakultas");

if(isset($_POST["Tambah"])) {
    if(tambah($_POST) > 0) {
        header('Location: list_fakultas.php');
        echo "Data berhasil ditambahkan";
    } else {
        echo "Data tidak berhasil ditambahkan";
    }
}

if(isset($_POST["Edit"])) {
    if(edit($_POST) > 0) {
        header('Location: list_fakultas.php');
        echo "Data berhasil ditambahkan";
    } else {
        echo "Data tidak berhasil ditambahkan";
    }
}

if(isset($_GET['id'])){
    $action = "Edit";
    $id = $_GET['id'];
    $edit = query("SELECT * FROM fakultas WHERE id_fakultas = $id")[0];
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
    <title>List Fakultas</title>
</head>
<body>
    <div class="banner">
        <h3>Database Universitas</h3>
        <div class="logout">
            <a href="logout.php"><i class="color-black" data-feather="log-out"></i></a>
            <p>Logout</p>
        </div>
    </div>
    <a href="index.php"><i class="back" data-feather="arrow-left-circle"></i></a>
    <div class="container">
        <h1>Daftar Fakultas</h1>
    
        <table border="1" cellpadding="10" cellspacing="0">
            <tr>
                <th>No</th>
                <th>ID Fakultas</th>
                <th>Nama Fakultas</th>
                <th>Actions</th>
                <th>Jurusan</th>
            </tr>
            <?php $i = 1 ?>
            <?php foreach( $fakultas as $fak ) : ?>
            <tr>
                <td><?php echo $i; ?></td>
                <td><?php echo $fak["id_fakultas"] ?></td>
                <td><?php echo $fak["nama_fakultas"] ?></td>
                <td>
                    <a href="hapus.php?id=<?php echo $fak["id_fakultas"]; ?>"><i class="color-black" data-feather="trash-2"></i></a>
                    <a href="list_fakultas.php?id=<?php echo $fak["id_fakultas"]; ?>"><i class="color-black" data-feather="edit"></i></a>
                </td>
                <td>
                    <a href="list_jurusan.php?id=<?php echo $fak["id_fakultas"]; ?>"><button>Go</button></a>
                </td>
            </tr>
            <?php $i++; ?>
            <?php endforeach; ?>
        </table>
    
        
    
        <form action="" method="post">
            <ul>
                <?php if(isset($_GET['id'])) { ?>
                        <input type="hidden" name="id_fakultas" id="id_fakultas" value="<?php if(isset($_GET['id'])) echo $edit['id_fakultas']; ?>"
                        required>
                <?php } else { ?>
                    <li>
                        <label for="id_fakultas">ID Fakultas : </label>
                        <input type="text" name="id_fakultas" id="id_fakultas" value="<?php if(isset($_GET['id'])) echo $edit['id_fakultas']; ?>"
                        required>
                    </li>
                <?php } ?>
                <li>
                    <label for="nama_fakultas">Nama Fakultas : </label>
                    <input type="text" name="nama_fakultas" id="nama_fakultas" value="<?php if(isset($_GET['id'])) echo $edit['nama_fakultas']; ?>"
                     required>
                </li>
                <li>
                    <button type="submit" name="<?= $action ?>"><?= $action ?></button>
                </li>
            </ul>
        </form>
    </div>

    <!-- icons -->
    <script>
      feather.replace();
    </script>
</body>
</html>