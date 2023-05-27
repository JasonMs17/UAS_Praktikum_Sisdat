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
    <style>
        .container {
            width: 900px;
            display: flex;
            align-self: center;
            margin: 0 auto;
            text-align: center;
            flex-direction: column;
            justify-content: space-around;
        }

        .container div {
            padding-bottom: 30px;
        }

        .container h3 {
            font-size: 24px;
            font-family: 'Cormorant Upright';
            font-weight: 800;
            padding-bottom: 8px;
        }

        .container p {
            font-size: 18px;
        }

    </style>
    <title>About</title>
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
        <div class="unpad">
            <h1> Kampus Unpad </h1>
    
            <p>Universitas Padjadjaran atau dikenal dengan singkatan Unpad merupakan salah satu perguruan tinggi negeri yang
                ada di Indonesia. Unpad berdiri pada 11 September 1957, dengan lokasi kampus di Bandung.
    
            <p> Universitas Padjadjaran memiliki dua kampus utama, yaitu Kampus Jatinangor, Kabupaten Sumedang dan Kampus
                Iwa Koesoemasoemantri di Dipati Ukur, Bandung, serta memiliki dua Program Studi di luar Kampus Utama
                (PSDKU), yaitu Kampus PSDKU Pangandaran.
        </div>

        <div class="unpadJatinangor">
            <h3> Kampus Jatinangor </h3>
    
            <p> Kampus Unpad Jatinangor berada di
                Kecamatan Jatinangor, Kabupaten Sumedang, Jawa Barat. Kampus ini merupakan kampus utama yang terdiri dari
                Fakultas Kedokteran, Fakultas Kedokteran Gigi, Fakultas Psikologi, Fakultas Keperawatan, Fakultas MIPA,
                Fakultas Peternakan, Fakultas Pertanian, Fakultas Teknologi Industri Pertanian, Fakultas Perikanan dan Ilmu
                Kelautan, Fakultas Farmasi, Fakultas Teknik Geologi, Fakultas Ilmu Komunikasi, Fakultas Ilmu Budaya, dan
                Fakultas Ilmu Sosial dan Ilmu Politik, Fakultas Hukum dan Fakultas Ekonomi dan Bisnis. </p>
    
            <p> Saat ini di Kampus
                Jatinangor juga sudah berdiri gedung Perpustakaan Pusat/CISRAL, Laboratorium Sentral, dan 15 gedung baru
                lain yang telah selesai akhir 2016. </p>
        </div>

        <div class="unpadDipatikukur">
            <h3> Kampus Dipati Ukur </h3>
    
            <p> Kampus Universitas Padjadjaran di Dipati Ukur berada
                di Jalan Dipati Ukur, Bandung. Kampus ini sebelumnya digunakan untuk kegiatan kampus oleh Fakultas Ekonomi
                dan Bisnis (S-1 dan D-3) serta Fakultas Hukum. Tetapi terhitung sejak pertengahan tahun 2017, kedua fakultas
                tersebut menyusul fakultas lainnya pindah ke kampus Jatinangor Sumedang. </p>
    
            <p> Sekarang kampus ini digunakan untuk
                kegiatan kampus Fakultas Ekonomi dan Bisnis (S-2 dan S-3) dan digunakan untuk kegiatan lainnya seperti
                wisuda, pengukuhan guru besar dan sumpah profesi. </p>
        </div>
    </div>



    <!-- icons -->
    <script>
        feather.replace();
    </script>
</body>

</html>