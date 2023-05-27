<?php

session_start();
require 'functions.php';
if( !isset($_SESSION["login"]) ){
    header("location: login.php");
    exit;
}

$id_fakultas = $_GET["id"];
if(hapus($id_fakultas) > 0) {
    header('Location: list_fakultas.php');
    echo "Data berhasil dihapus";
} else {
    echo "Data tidak berhasil dihapus";
}

?>