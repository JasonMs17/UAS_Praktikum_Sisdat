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

$mahasiswa = query("SELECT * FROM mahasiswa WHERE id_jurusan = '$idjur'");

if(isset($_POST["Tambah"])) {
    if(tambahMhs($_POST) > 0) {
        header('Location: list_mahasiswa.php?id2='.$idjur . '&id_fak=' .  $id_fak);
        echo "Data berhasil ditambahkan";
    } else {
        echo "Data tidak berhasil ditambahkan";
    }
}

if(isset($_POST["Edit"])) {
    if(editMhs($_POST) > 0) {
        header('Location: list_mahasiswa.php?id2='.$idjur.'&id_fak=' . $id_fak);
    } else {
        echo "Data tidak berhasil ditambahkan";
    }
}

if(isset($_GET['id3'])){
    $action = "Edit";
    $npm = $_GET['id3'];
    $edit = query("SELECT * FROM mahasiswa WHERE npm = $npm")[0];
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
    <title>List Mahasiswa</title>
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
        <h1>Daftar Mahasiswa</h1>
    
        <table border="1" cellpadding="10" cellspacing="0">
            <tr>
                <th>No</th>
                <th>NPM</th>
                <th>Nama Mahasiswa</th>
                <th>Asal</th>
                <th>Actions</th>
            </tr>
            <?php $i = 1 ?>
            <?php foreach( $mahasiswa as $mhs ) : ?>
            <tr>
                <td><?php echo $i; ?></td>
                <td><?php echo $mhs["npm"] ?></td>
                <td><?php echo $mhs["nama_mahasiswa"] ?></td>
                <td><?php echo $mhs["asal"] ?></td>
                <td>
                    <a href="hapusMhs.php?id2=<?php echo $idjur; ?>&id3=<?php echo $mhs["npm"]; ?>&id_fak=<?= $id_fak; ?>">
                        <i class="color-black" data-feather="trash-2"></i></a>
                    <a href="list_mahasiswa.php?id2=<?php echo $idjur; ?>&id3=<?php echo $mhs["npm"]; ?>&id_fak=<?= $id_fak; ?>">
                        <i class="color-black" data-feather="edit"></i></a>
                    </td>
            </tr>
            <?php $i++; ?>
            <?php endforeach; ?>
        </table>
    
        
    
        <form action="" method="post">
            <ul>
                <?php if(isset($_GET['id3'])) { ?>
                        <input type="hidden" name="npm" id="npm" value="<?php if(isset($_GET['id3'])) echo $edit['npm']; ?>"
                        required>
                <?php } else { ?>
                    <li>
                        <label for="npm">NPM : </label>
                        <input type="text" name="npm" id="npm" value="<?php if(isset($_GET['id3'])) echo $edit['npm']; ?>"
                        required>
                    </li>
                <?php } ?>
                <li>
                    <label for="nama_mahasiswa">Nama : </label>
                    <input type="text" name="nama_mahasiswa" id="nama_mahasiswa" value="<?php if(isset($_GET['id3'])) echo $edit['nama_mahasiswa']; ?>"
                     required>
                </li>
                <li>
                    <label for="asal">Asal : </label>
                    <input type="text" name="asal" id="asal" value="<?php if(isset($_GET['id3'])) echo $edit['asal']; ?>"
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