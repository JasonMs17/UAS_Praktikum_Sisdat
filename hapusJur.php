<?php

session_start();
require 'functions.php';
if( !isset($_SESSION["login"]) ){
    header("location: login.php");
    exit;
}
$id_jurusan = $_GET["id2"];
$id_fak = $_GET["id"];
if(hapusJur($id_jurusan) > 0) {
    header('Location: list_jurusan.php?id='.$id_fak);
    echo "Data berhasil dihapus";
} else {
    echo "Data tidak berhasil dihapus";
}

?>