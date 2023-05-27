<?php
session_start();
require 'functions.php';
if( !isset($_SESSION["login"]) ){
    header("location: login.php");
    exit;
}

$action = "Tambah";

$idfak = $_GET["id"];
$jurusan = query("SELECT * FROM jurusan WHERE id_fakultas = '$idfak'");

if(isset($_POST["Tambah"])) {
    if(tambahJur($_POST) > 0) {
        header('Location: list_jurusan.php?id='.$idfak);
        echo "Data berhasil ditambahkan";
    } else {
        echo "Data tidak berhasil ditambahkan";
    }
}

if(isset($_POST["Edit"])) {
    if(editJur($_POST) > 0) {
        header('Location: list_jurusan.php?id='.$idfak);
        echo "Data berhasil ditambahkan";
    } else {
        echo "Data tidak berhasil ditambahkan";
    }
}

if(isset($_GET['id2'])){
    $action = "Edit";
    $id = $_GET['id2'];
    $edit = query("SELECT * FROM jurusan WHERE id_jurusan = $id")[0];
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
    <title>List Jurusan</title>
</head>
<body>
    <div class="banner">
        <h3>Database Universitas</h3>
        <div class="logout">
            <a href="logout.php"><i class="color-black" data-feather="log-out"></i></a>
            <p>Logout</p>
        </div>
    </div>
    <a href="list_fakultas.php"><i class="back" data-feather="arrow-left-circle"></i></a>
    <div class="container">
        <h1>Daftar Jurusan</h1>
    
        <table border="1" cellpadding="10" cellspacing="0">
            <tr>
                <th>No</th>
                <th>ID Jurusan</th>
                <th>Nama Jurusan</th>
                <th>Actions</th>
                <th>Mahasiswa</th>
                <th>Dosen</th>
                <th>Matkul</th>
            </tr>
            <?php $i = 1 ?>
            <?php foreach( $jurusan as $jur ) : ?>
            <tr>
                <td><?php echo $i; ?></td>
                <td><?php echo $jur["id_jurusan"] ?></td>
                <td><?php echo $jur["nama_jurusan"] ?></td>
                <td>
                    <a href="hapusJur.php?id=<?php echo $idfak; ?>&id2=<?php echo $jur["id_jurusan"]; ?>"><i class="color-black" data-feather="trash-2"></i></a>
                    <a href="list_jurusan.php?id=<?php echo $idfak; ?>&id2=<?php echo $jur["id_jurusan"]; ?>"><i class="color-black" data-feather="edit"></i></a>
                </td>
                <td>
                    <a href="list_mahasiswa.php?id2=<?php echo $jur["id_jurusan"]; ?>&id_fak=<?= $idfak?>"><button>Go</button></a>
                </td>
                <td>
                    <a href="list_dosen.php?id2=<?php echo $jur["id_jurusan"]; ?>&id_fak=<?= $idfak?>"><button>Go</button></a>
                </td>
                <td>
                    <a href="list_matkul.php?id2=<?php echo $jur["id_jurusan"]; ?>&id_fak=<?= $idfak?>"><button>Go</button></a>
                </td>
            </tr>
            <?php $i++; ?>
            <?php endforeach; ?>
        </table>
    
        
    
        <form action="" method="post">
            <ul>
                <?php if(isset($_GET['id2'])) { ?>
                        <input type="hidden" name="id_jurusan" id="id_jurusan" value="<?php if(isset($_GET['id2'])) echo $edit['id_jurusan']; ?>"
                        required>
                <?php } else { ?>
                    <li>
                        <label for="id_jurusan">ID Jurusan : </label>
                        <input type="text" name="id_jurusan" id="id_jurusan" value="<?php if(isset($_GET['id2'])) echo $edit['id_jurusan']; ?>"
                        required placeholder="<?php echo $idfak; ?>?">
                    </li>
                <?php } ?>
                <li>
                    <label for="nama_jurusan">Nama Jurusan : </label>
                    <input type="text" name="nama_jurusan" id="nama_jurusan" value="<?php if(isset($_GET['id2'])) echo $edit['nama_jurusan']; ?>"
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