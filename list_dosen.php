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

$dosen = query("SELECT * FROM dosen WHERE id_jurusan = '$idjur'");

if(isset($_POST["Tambah"])) {
    if(tambahDsn($_POST) > 0) {
        header('Location: list_dosen.php?id2='.$idjur . '&id_fak=' .  $id_fak);
        echo "Data berhasil ditambahkan";
    } else {
        echo "Data tidak berhasil ditambahkan";
    }
}

if(isset($_POST["Edit"])) {
    if(editDsn($_POST) > 0) {
        header('Location: list_dosen.php?id2='.$idjur.'&id_fak=' . $id_fak);
    } else {
        echo "Data tidak berhasil ditambahkan";
    }
}

if(isset($_GET['id3'])){
    $action = "Edit";
    $nip = $_GET['id3'];
    $edit = query("SELECT * FROM dosen WHERE nip = $nip")[0];
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
    <title>List Dosen</title>
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
        <h1>Daftar Dosen</h1>
    
        <table border="1" cellpadding="10" cellspacing="0">
            <tr>
                <th>No</th>
                <th>NIP</th>
                <th>Nama Dosen</th>
                <th>Asal</th>
                <th>Actions</th>
            </tr>
            <?php $i = 1 ?>
            <?php foreach( $dosen as $dsn ) : ?>
            <tr>
                <td><?php echo $i; ?></td>
                <td><?php echo $dsn["nip"] ?></td>
                <td><?php echo $dsn["nama_dosen"] ?></td>
                <td><?php echo $dsn["asal"] ?></td>
                <td>
                    <a href="hapusDsn.php?id2=<?php echo $idjur; ?>&id3=<?php echo $dsn["nip"]; ?>&id_fak=<?= $id_fak; ?>">
                        <i class="color-black" data-feather="trash-2"></i></a>
                    <a href="list_dosen.php?id2=<?php echo $idjur; ?>&id3=<?php echo $dsn["nip"]; ?>&id_fak=<?= $id_fak; ?>">
                        <i class="color-black" data-feather="edit"></i></a>
                    </td>
            </tr>
            <?php $i++; ?>
            <?php endforeach; ?>
        </table>
    
        
    
        <form action="" method="post">
            <ul>
                <?php if(isset($_GET['id3'])) { ?>
                        <input type="hidden" name="nip" id="nip" value="<?php if(isset($_GET['id3'])) echo $edit['nip']; ?>"
                        required>
                <?php } else { ?>
                    <li>
                        <label for="nip">NIP : </label>
                        <input type="text" name="nip" id="nip" value="<?php if(isset($_GET['id3'])) echo $edit['nip']; ?>"
                        required>
                    </li>
                <?php } ?>
                <li>
                    <label for="nama_dosen">Nama : </label>
                    <input type="text" name="nama_dosen" id="nama_dosen" value="<?php if(isset($_GET['id3'])) echo $edit['nama_dosen']; ?>"
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