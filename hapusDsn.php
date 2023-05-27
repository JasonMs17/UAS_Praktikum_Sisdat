<?php

session_start();
require 'functions.php';
if( !isset($_SESSION["login"]) ){
    header("location: login.php");
    exit;
}
$id_jurusan = $_GET["id2"];
$nip = $_GET["id3"];
$id_fak = $_GET['id_fak'];
if(hapusDsn($nip) > 0) {
    header('Location: list_dosen.php?id2='.$id_jurusan.'&id_fak=' . $id_fak);
    echo "Data berhasil dihapus";
} else {
    echo "Data tidak berhasil dihapus";
}

?>