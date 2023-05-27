<?php
$db = mysqli_connect("localhost","root","","universitas");

function query($query) {
    global $db;
    $result = mysqli_query($db, $query);
    $rows = [];
    while( $row = mysqli_fetch_assoc($result) ){
        $rows[] = $row;
    }
    return $rows;
}

function tambah($data) {
    global $db;
    $id_fakultas = htmlspecialchars($data["id_fakultas"]);
    $nama_fakultas = htmlspecialchars($data["nama_fakultas"]);

    $query = "INSERT INTO fakultas VALUES('$id_fakultas','$nama_fakultas')";
    mysqli_query($db, $query);
    return mysqli_affected_rows($db);
}

function hapus($id_fakultas) {
    global $db;
    mysqli_query($db, "DELETE FROM fakultas WHERE id_fakultas=$id_fakultas");
    return mysqli_affected_rows($db);
}

function edit($data) {
    global $db;
    var_dump($data);
    
    $id_fakultas = $data["id_fakultas"];
    $nama_fakultas = htmlspecialchars($data["nama_fakultas"]);
    $query = "UPDATE fakultas SET nama_fakultas = '$nama_fakultas' WHERE id_fakultas = '$id_fakultas'";
    mysqli_query($db, $query);
    return mysqli_affected_rows($db);
}

// jurusan
function tambahJur($data) {
    global $db;
    $id_jurusan = htmlspecialchars($data["id_jurusan"]);
    $nama_jurusan = htmlspecialchars($data["nama_jurusan"]);
    $id_fakultas = htmlspecialchars($_GET["id"]);

    $query = "INSERT INTO jurusan VALUES('$id_jurusan','$nama_jurusan', '$id_fakultas')";
    mysqli_query($db, $query);
    return mysqli_affected_rows($db);
}

function hapusJur($id_jurusan) {
    global $db;
    mysqli_query($db, "DELETE FROM jurusan WHERE id_jurusan='$id_jurusan'");
    return mysqli_affected_rows($db);
}

function editJur($data) {
    global $db;
    var_dump($data);
    
    $id_jurusan = $data["id_jurusan"];
    $nama_jurusan = htmlspecialchars($data["nama_jurusan"]);
    $query = "UPDATE jurusan SET nama_jurusan = '$nama_jurusan' WHERE id_jurusan = '$id_jurusan'";
    mysqli_query($db, $query);
    return mysqli_affected_rows($db);
}

// mahasiswa
function tambahMhs($data) {
    global $db;
    $npm = htmlspecialchars($data["npm"]);
    $nama_mahasiswa = htmlspecialchars($data["nama_mahasiswa"]);
    $asal = htmlspecialchars($data["asal"]);
    $id_jurusan = htmlspecialchars($_GET["id2"]);

    $query = "INSERT INTO mahasiswa VALUES('$npm','$nama_mahasiswa', '$asal','$id_jurusan')";
    mysqli_query($db, $query);
    return mysqli_affected_rows($db);
}

function hapusMhs($npm) {
    global $db;
    mysqli_query($db, "DELETE FROM mahasiswa WHERE npm='$npm'");
    return mysqli_affected_rows($db);
}

function editMhs($data) {
    global $db;
    var_dump($data);
    
    $npm = $data["npm"];
    $nama_mahasiswa = htmlspecialchars($data["nama_mahasiswa"]);
    $asal = htmlspecialchars($data["asal"]);
    $query = "UPDATE mahasiswa SET nama_mahasiswa = '$nama_mahasiswa', asal = '$asal' WHERE npm = '$npm'";
    mysqli_query($db, $query);
    return mysqli_affected_rows($db);
}

// dosen
function tambahDsn($data) {
    global $db;
    $nip = htmlspecialchars($data["nip"]);
    $nama_dosen = htmlspecialchars($data["nama_dosen"]);
    $asal = htmlspecialchars($data["asal"]);
    $id_jurusan = htmlspecialchars($_GET["id2"]);

    $query = "INSERT INTO dosen VALUES('$nip','$nama_dosen', '$asal','$id_jurusan')";
    mysqli_query($db, $query);
    return mysqli_affected_rows($db);
}

function hapusDsn($nip) {
    global $db;
    mysqli_query($db, "DELETE FROM dosen WHERE nip='$nip'");
    return mysqli_affected_rows($db);
}

function editDsn($data) {
    global $db;
    var_dump($data);
    
    $nip = $data["nip"];
    $nama_dosen = htmlspecialchars($data["nama_dosen"]);
    $asal = htmlspecialchars($data["asal"]);
    $query = "UPDATE dosen SET nama_dosen = '$nama_dosen', asal = '$asal' WHERE nip = '$nip'";
    mysqli_query($db, $query);
    return mysqli_affected_rows($db);
}

// matkul
function tambahMtkl($data) {
    global $db;
    $id_matkul = htmlspecialchars($data["id_matkul"]);
    $nama_matkul = htmlspecialchars($data["nama_matkul"]);
    $sks = htmlspecialchars($data["sks"]);
    $id_jurusan = htmlspecialchars($_GET["id2"]);

    $query = "INSERT INTO matkul VALUES('$id_matkul','$nama_matkul', '$sks','$id_jurusan')";
    mysqli_query($db, $query);
    return mysqli_affected_rows($db);
}

function hapusMtkl($id_matkul) {
    global $db;
    mysqli_query($db, "DELETE FROM matkul WHERE id_matkul='$id_matkul'");
    return mysqli_affected_rows($db);
}

function editMtkl($data) {
    global $db;
    var_dump($data);
    
    $id_matkul = $data["id_matkul"];
    $nama_matkul = htmlspecialchars($data["nama_matkul"]);
    $sks = htmlspecialchars($data["sks"]);
    $query = "UPDATE matkul SET nama_matkul = '$nama_matkul', sks = '$sks' WHERE id_matkul = '$id_matkul'";
    mysqli_query($db, $query);
    return mysqli_affected_rows($db);
}

// registrasi
function registrasi($data){
    global $db;
    $username = strtolower(stripslashes($data["username"]));
    $password = mysqli_real_escape_string($db, $data["password"]);
    $password2 = mysqli_real_escape_string($db, $data["password2"]);

    $result = mysqli_query($db, "SELECT username FROM users WHERE username = '$username'");
    if( mysqli_fetch_assoc($result) ){
        echo "<script>
                alert('username sudah terdaftar');
            </script>";
        return false;
    }

    if( $password !== $password2 ){
        echo "<script>
            alert('konfirmasi password tidak sesuai');
            </script>";
        return false;
    }

    $password = password_hash($password, PASSWORD_DEFAULT);
    mysqli_query($db, "INSERT INTO users VALUES ('','$username','$password')");
    return mysqli_affected_rows($db);
}

// searching
function cariMhs($keyword){
    $query = "SELECT mahasiswa.npm, mahasiswa.nama_mahasiswa, jurusan.nama_jurusan, fakultas.nama_fakultas
                FROM mahasiswa, jurusan, fakultas
                WHERE mahasiswa.id_jurusan = jurusan.id_jurusan
                AND jurusan.id_fakultas = fakultas.id_fakultas
                AND (nama_mahasiswa LIKE '%$keyword%'
                OR npm LIKE '%$keyword%'
                OR nama_jurusan LIKE '%$keyword%'
                OR nama_fakultas LIKE '%$keyword%')
            ";
    return query($query);
}

function cariDsn($keyword){
    $query = "SELECT dosen.nip, dosen.nama_dosen, jurusan.nama_jurusan, fakultas.nama_fakultas
                FROM dosen, jurusan, fakultas
                WHERE dosen.id_jurusan = jurusan.id_jurusan
                AND jurusan.id_fakultas = fakultas.id_fakultas
                AND (nama_dosen LIKE '%$keyword%'
                OR nip LIKE '%$keyword%'
                OR nama_jurusan LIKE '%$keyword%'
                OR nama_fakultas LIKE '%$keyword%')
            ";
    return query($query);
}

function cariMtkl($keyword){
    $query = "SELECT matkul.id_matkul, matkul.nama_matkul, jurusan.nama_jurusan, fakultas.nama_fakultas
                FROM matkul, jurusan, fakultas
                WHERE matkul.id_jurusan = jurusan.id_jurusan
                AND jurusan.id_fakultas = fakultas.id_fakultas
                AND (nama_matkul LIKE '%$keyword%'
                OR id_matkul LIKE '%$keyword%'
                OR nama_jurusan LIKE '%$keyword%'
                OR nama_fakultas LIKE '%$keyword%')
            ";
    return query($query);
}
?>