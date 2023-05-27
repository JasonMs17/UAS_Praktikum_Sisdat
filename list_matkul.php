<?php
session_start();
require 'functions.php';
if( !isset($_SESSION["login"]) ){
    header("location: login.php");
    exit;
}

$action = "Tambah";

$idjur = $_GET["id2"];
$id_fak = $_GET["id_fak"];

$matkul = query("SELECT * FROM matkul WHERE id_jurusan = '$idjur'");

if(isset($_POST["Tambah"])) {
    if(tambahMtkl($_POST) > 0) {
        header('Location: list_matkul.php?id2='.$idjur . '&id_fak=' .  $id_fak);
        echo "Data berhasil ditambahkan";
    } else {
        echo "Data tidak berhasil ditambahkan";
    }
}

if(isset($_POST["Edit"])) {
    if(editMtkl($_POST) > 0) {
        header('Location: list_matkul.php?id2='.$idjur.'&id_fak=' . $id_fak);
    } else {
        echo "Data tidak berhasil ditambahkan";
    }
}

if(isset($_GET['id3'])){
    $action = "Edit";
    $id_matkul = $_GET['id3'];
    $edit = query("SELECT * FROM matkul WHERE id_matkul = $id_matkul")[0];
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
    <title>List Mata Kuliah</title>
</head>
<body>
    <div class="banner">
        <h3>Database Universitas</h3>
        <div class="logout">
            <a href="logout.php"><i class="color-black" data-feather="log-out"></i></a>
            <p>Logout</p>
        </div>
    </div>
    <a href="list_jurusan.php?id=<?= $id_fak; ?>"><i class="back" data-feather="arrow-left-circle"></i></a>
    <div class="container">
        <h1>Daftar Mata Kuliah</h1>
    
        <table border="1" cellpadding="10" cellspacing="0">
            <tr>
                <th>No</th>
                <th>Id Matkul</th>
                <th>Nama Matkul</th>
                <th>SKS</th>
                <th>Actions</th>
            </tr>
            <?php $i = 1 ?>
            <?php foreach( $matkul as $mtkl ) : ?>
            <tr>
                <td><?php echo $i; ?></td>
                <td><?php echo $mtkl["id_matkul"] ?></td>
                <td><?php echo $mtkl["nama_matkul"] ?></td>
                <td><?php echo $mtkl["sks"] ?></td>
                <td>
                    <a href="hapusMtkl.php?id2=<?php echo $idjur; ?>&id3=<?php echo $mtkl["id_matkul"]; ?>&id_fak=<?= $id_fak; ?>">
                        <i class="color-black" data-feather="trash-2"></i></a>
                    <a href="list_matkul.php?id2=<?php echo $idjur; ?>&id3=<?php echo $mtkl["id_matkul"]; ?>&id_fak=<?= $id_fak; ?>">
                        <i class="color-black" data-feather="edit"></i></a>
                    </td>
                <!-- <td>
                    <a href="list_jurusan.php?id2=<?php echo $idjur?>"><button>Go</button></a>
                </td> -->
            </tr>
            <?php $i++; ?>
            <?php endforeach; ?>
        </table>
    
        
    
        <form action="" method="post">
            <ul>
                <?php if(isset($_GET['id3'])) { ?>
                        <input type="hidden" name="id_matkul" id="id_matkul" value="<?php if(isset($_GET['id3'])) echo $edit['id_matkul']; ?>"
                        required>
                <?php } else { ?>
                    <li>
                        <label for="id_matkul">Id Matkul : </label>
                        <input type="text" name="id_matkul" id="id_matkul" value="<?php if(isset($_GET['id3'])) echo $edit['id_matkul']; ?>"
                        required>
                    </li>
                <?php } ?>
                <li>
                    <label for="nama_matkul">Matkul : </label>
                    <input type="text" name="nama_matkul" id="nama_matkul" value="<?php if(isset($_GET['id3'])) echo $edit['nama_matkul']; ?>"
                     required>
                </li>
                <li>
                    <label for="sks">SKS : </label>
                    <input type="text" name="sks" id="sks" value="<?php if(isset($_GET['id3'])) echo $edit['sks']; ?>"
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