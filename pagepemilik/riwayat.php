<?php
session_start();
if (!isset($_SESSION["login"])){
    header("Location: login.php");
    exit;
}
require '../function.php';
$data_lahan = query('SELECT * FROM riwayat');
$tanggal_penyemaian = query('SELECT DAY(penyemaian), MONTH(penyemaian), YEAR(penyemaian), HOUR(penyemaian), MINUTE(penyemaian) FROM riwayat');
$tanggal_pertumbuhan = query('SELECT DAY(pertumbuhan), MONTH(pertumbuhan), YEAR(pertumbuhan), HOUR(pertumbuhan), MINUTE(pertumbuhan) FROM riwayat');
$tanggal_panen = query('SELECT DAY(panen), MONTH(panen), YEAR(panen), HOUR(panen), MINUTE(panen) FROM riwayat');
$penyemaian = query('SELECT datediff(pertumbuhan, penyemaian) AS selisih FROM riwayat');
$pertumbuhan = query('SELECT datediff(panen, pertumbuhan) AS selisih FROM riwayat');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HY.TECH</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous" />
    <!-- my css -->
    <link rel="stylesheet" href="../css/style.css" />
    <!-- icon -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">

</head>

<body>
    <!-- awal navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-success shadow fixed-top">
        <div class="container-fluid">
            <a class="navbar-brand ms-4" href="#">HY.TECH</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse me-4" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="../index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="lahan.php">Lahan</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="aktivitas.php">Aktivitas</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="akun.php">Akun</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- akhir navbar -->
    <!-- awal jumbotron -->
    <section class="text-center mb-5" style="padding-top:5rem;">
        <h3 class="pt-2">AKTIVITAS LAHAN</h3>
    </section>
    <!-- akhir jumbotron -->
    <!-- awal badan -->
    <section>
        <div class="container justifiy-content-center text-center">
            <nav class="navbar navbar-expand-lg navbar-light justify-content-center text-center">
                <div class="container-fluid">
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                        aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse justify-content-center" id="navbarNav">
                        <ul class="navbar-nav">
                            <li class="nav-item me-5">
                                <a class="nav-link" href="aktivitas.php">Penyemaian</a>
                            </li>
                            <li class="nav-item me-5">
                                <a class="nav-link" href="pertumbuhan.php">Pertumbuhan</a>
                            </li>
                            <li class="nav-item me-5">
                                <a class="nav-link" href="panen.php">Panen</a>
                            </li>
                            <li class="nav-item me-5">
                                <a class="nav-link active" aria-current="page" href="riwayat.php">Riwayat</a>
                                <div class="form-border"
                                    style="background: -webkit-linear-gradient(right, #a6f77b, #2ec06f); height: 2px; width: 100%;">
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
        </div>
    </section>
    <!-- akhir jumbotron -->
    <!-- awal badan -->
    <section>
        <div class="container mt-4">
            <?php if (empty($data_lahan)) :?>
            <div class="row m-5 text-center">
                <h2 style="color : #b5b3b3;">DATA RIWAYAT KOSONG</h2>
            </div>
            <?php endif;?>
            <?php $i = 0;?>
            <?php foreach ($data_lahan as $row) :?>
            <div class="row mb-3">
                <div class="card p-0">
                    <div class="card-header bg-success" style="color:white;">
                        <?=$row["nama_lahan"]?>
                    </div>
                    <div class="card-body bg-light">
                        <h5 class="card-title">Tanaman <?=$row["tanaman"]?></h5>
                        <p class="card-text p-0 m-0">Waktu Penyemaian <span
                                style="display:inline-block; width: 50px;;"></span>:
                            &nbsp;&nbsp;<?=$tanggal_penyemaian[$i]["DAY(penyemaian)"], '/' ,$tanggal_penyemaian[$i]["MONTH(penyemaian)"], '/' ,$tanggal_penyemaian[$i]["YEAR(penyemaian)"],'   ' ,$tanggal_penyemaian[$i]["HOUR(penyemaian)"],':' ,$tanggal_penyemaian[$i]["MINUTE(penyemaian)"],' WIB'?>
                        </p>
                        <p class="card-text p-0 m-0">Waktu Pertumbuhan <span
                                style="display:inline-block; width: 40px;"></span>:&nbsp;&nbsp;
                            <?=$tanggal_pertumbuhan[$i]["DAY(pertumbuhan)"], '/' ,$tanggal_pertumbuhan[$i]["MONTH(pertumbuhan)"], '/' ,$tanggal_pertumbuhan[$i]["YEAR(pertumbuhan)"],'   ' ,$tanggal_pertumbuhan[$i]["HOUR(pertumbuhan)"],':' ,$tanggal_pertumbuhan[$i]["MINUTE(pertumbuhan)"],' WIB'?>
                        </p>
                        <p class="card-text p-0 m-0">Waktu Panen <span
                                style="display:inline-block; width: 92px;"></span>:&nbsp;&nbsp;
                            <?=$tanggal_panen[$i]["DAY(panen)"], '/' ,$tanggal_panen[$i]["MONTH(panen)"], '/' ,$tanggal_panen[$i]["YEAR(panen)"],'   ' ,$tanggal_panen[$i]["HOUR(panen)"],':' ,$tanggal_panen[$i]["MINUTE(panen)"],' WIB'?>
                        </p>
                        <p class="card-text p-0 m-0">Lama Penyemaian <span
                                style="display:inline-block; width: 58px;;"></span>:
                            &nbsp;&nbsp;<?=$penyemaian[$i]["selisih"]?>
                            hari
                        </p>
                        <p class="card-text p-0 m-0">Lama Pertumbuhan <span
                                style="display:inline-block; width: 47px;;"></span>:
                            &nbsp;&nbsp;<?=$pertumbuhan[$i]["selisih"]?>
                            hari
                        </p>
                        <p class="card-text p-0 m-0">Hasil Panen <span
                                style="display:inline-block; width: 103px;"></span>:&nbsp;&nbsp;
                            <?=$row["hasil"]?> pcs</p>
                        <p class="card-text p-0 m-0">Keterangan <span
                                style="display:inline-block; width: 104px;"></span>:&nbsp;&nbsp;
                            <?=$row["keterangan"]?>
                        </p>
                    </div>
                </div>
            </div>
            <?php $i++;?>
            <?php endforeach;?>
        </div>
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
            <path fill="#198754" fill-opacity="1"
                d="M0,160L48,176C96,192,192,224,288,213.3C384,203,480,149,576,138.7C672,128,768,160,864,181.3C960,203,1056,213,1152,224C1248,235,1344,245,1392,250.7L1440,256L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z">
            </path>
        </svg>
    </section>
    <!-- akhir badan -->
    <!-- awal footer -->
    <footer class="bg-success text-white text-center pb-3">
        <p>Created with pleasure by <a href="https://www.instagram.com/ghozi_ramadhan/"
                class="text-white fw-bold">Ghufron
                Ghozi Ramadhan</a></p>
    </footer>
    <!-- akhir footer -->
</body>

</html>