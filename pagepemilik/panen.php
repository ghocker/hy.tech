<?php
session_start();
if (!isset($_SESSION["login"])){
    header("Location: login.php");
    exit;
}
require '../function.php';
if (isset($_POST["kirim"])) {
    pesan($_POST);
}
$chat = query('SELECT * FROM chat WHERE proses = "panen" GROUP BY id ASC');
$tanggal_chat = query('SELECT DAY(tanggal), MONTH(tanggal), YEAR(tanggal), HOUR(tanggal), MINUTE(tanggal) FROM chat WHERE proses = "panen" GROUP BY id ASC');
$data_lahan = query('SELECT * FROM lahan WHERE proses = "panen" GROUP BY nama_lahan ASC');
$tanggal_penyemaian = query('SELECT DAY(penyemaian), MONTH(penyemaian), YEAR(penyemaian), HOUR(penyemaian), MINUTE(penyemaian) FROM lahan WHERE proses = "panen" GROUP BY nama_lahan ASC');
$tanggal_pertumbuhan = query('SELECT DAY(pertumbuhan), MONTH(pertumbuhan), YEAR(pertumbuhan), HOUR(pertumbuhan), MINUTE(pertumbuhan) FROM lahan WHERE proses = "panen" GROUP BY nama_lahan ASC');
$tanggal_panen = query('SELECT DAY(panen), MONTH(panen), YEAR(panen), HOUR(panen), MINUTE(panen) FROM lahan WHERE proses = "panen" GROUP BY nama_lahan ASC');
var_dump($data_lahan);
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
                                <a class="nav-link active" aria-current="page" href="panen.php">Panen</a>
                                <div class="form-border"
                                    style="background: -webkit-linear-gradient(right, #a6f77b, #2ec06f); height: 2px; width: 100%;">
                                </div>
                            </li>
                            <li class="nav-item me-5">
                                <a class="nav-link" href="riwayat.php">Riwayat</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
        </div>
    </section>
    <section>
        <div class="container mt-4">
            <?php if (empty($data_lahan)) :?>
            <div class="row m-5 text-center">
                <h2 style="color : #b5b3b3;">DATA AKTIVITAS KOSONG</h2>
            </div>
            <?php endif;?>
            <?php $i=0;?>
            <?php foreach ($data_lahan as $row) :?>>
            <div class="row mb-3">
                <div class="card p-0">
                    <div class="card-header bg-success" style="color:white;">
                        <?=$row["nama_lahan"]?>
                    </div>
                    <div class="card-body bg-light">
                        <h5 class="card-title">Tanaman <?=$row["tanaman"]?></h5>
                        <p class="card-text p-0 m-0">Waktu Penyemaian <span
                                style="display:inline-block; width: 40px;;"></span>:
                            &nbsp;&nbsp;<?=$tanggal_penyemaian[$i]["DAY(penyemaian)"], '/' ,$tanggal_penyemaian[$i]["MONTH(penyemaian)"], '/' ,$tanggal_penyemaian[$i]["YEAR(penyemaian)"],'   ' ,$tanggal_penyemaian[$i]["HOUR(penyemaian)"],':' ,$tanggal_penyemaian[$i]["MINUTE(penyemaian)"],' WIB'?>
                        </p>
                        <p class="card-text p-0 m-0">Waktu Pertumbuhan <span
                                style="display:inline-block; width: 30px;"></span>:&nbsp;&nbsp;
                            <?=$tanggal_pertumbuhan[$i]["DAY(pertumbuhan)"], '/' ,$tanggal_pertumbuhan[$i]["MONTH(pertumbuhan)"], '/' ,$tanggal_pertumbuhan[$i]["YEAR(pertumbuhan)"],'   ' ,$tanggal_pertumbuhan[$i]["HOUR(pertumbuhan)"],':' ,$tanggal_pertumbuhan[$i]["MINUTE(pertumbuhan)"],' WIB'?>
                        </p>
                        <p class="card-text p-0 m-0">Waktu Panen <span
                                style="display:inline-block; width: 82px;"></span>:&nbsp;&nbsp;
                            <?=$tanggal_panen[$i]["DAY(panen)"], '/' ,$tanggal_panen[$i]["MONTH(panen)"], '/' ,$tanggal_panen[$i]["YEAR(panen)"],'   ' ,$tanggal_panen[$i]["HOUR(panen)"],':' ,$tanggal_panen[$i]["MINUTE(panen)"],' WIB'?>
                        </p>
                        <p class="card-text p-0 m-0">keterangan <span
                                style="display:inline-block; width: 95px;;"></span>: &nbsp;&nbsp;<?=$row["keterangan"]?>
                        </p>
                    </div>
                </div>
            </div>
            <?php $i++;?>
            <?php endforeach;?>
            <div class="row mt-5">
                <div class="bg-success text-center" style="color:white;">
                    <h5 class="p-2">Komentar Penyemaian</h5>
                </div>
                <div class="card bg-light">
                    <?php if (empty($chat)) :?>
                    <div class="row m-5 text-center">
                        <h2 style="color : #b5b3b3;">KOMENTAR KOSONG</h2>
                    </div>
                    <?php endif;?>
                    <?php $i=0;?>
                    <?php foreach($chat as $r) :?>
                    <?php if ($r["pelaku"] == 'pekerja'):?>
                    <div class="row">
                        <div class="col-md-5 m-3">
                            <h6 style="margin-left:-10px;"><?= $r["pelaku"]?></h6>
                            <p>( <?= $r["nama"]?> )</p>
                            <div class="card" style="background-colour:white;">
                                <p class="ms-2"><?= $r["pesan"]?></p>
                                <p class="text-end fs-7 me-2 mb-1">
                                    <?=$tanggal_chat[$i]["DAY(tanggal)"], '/' ,$tanggal_chat[$i]["MONTH(tanggal)"], '/' ,$tanggal_chat[$i]["YEAR(tanggal)"],'   ' ,$tanggal_chat[$i]["HOUR(tanggal)"],':' ,$tanggal_chat[$i]["MINUTE(tanggal)"],' WIB'?>
                                </p>
                            </div>
                        </div>
                    </div>
                    <?php endif;?>
                    <?php if ($r["pelaku"] == 'pemilik'):?>
                    <div class="row justify-content-end">
                        <div class="col-md-5 m-3 text-end" style="padding-top:31px;">
                            <a href="hapuspesanpanen.php?nama=<?= $r["pesan"]?>"><i
                                    style="color:red; margin-right:-43px;" class="bi bi-trash3 pt-1 fs-5"></i></a>
                        </div>
                        <div class="col-md-5 m-3">
                            <h6 style="margin-right:-10px;" class="text-end"><?= $r["pelaku"]?></h6>
                            <div class="card" style="background-color:white;">
                                <p class="ms-2"><?= $r["pesan"]?></p>
                                <p class="text-end me-2 mb-1">
                                    <?=$tanggal_chat[$i]["DAY(tanggal)"], '/' ,$tanggal_chat[$i]["MONTH(tanggal)"], '/' ,$tanggal_chat[$i]["YEAR(tanggal)"],'   ' ,$tanggal_chat[$i]["HOUR(tanggal)"],':' ,$tanggal_chat[$i]["MINUTE(tanggal)"],' WIB'?>
                                </p>
                            </div>
                        </div>
                    </div>
                    <?php endif;?>
                    <?php $i++;?>
                    <?php endforeach;?>
                    <form action="" method="post" class="mb-3 mt-2">
                        <input type="hidden" value="pemilik" name="aktor">
                        <input type="hidden" value="panen" name="proses">
                        <input type="text" placeholder="  Ketik pesan" name="pesan" style="width:1220px; height:37px;"
                            required>
                        <button type="submit" name="kirim" class="btn btn-success ms-2"
                            style="margin-top:-5px; margin-right:-15px; width:63px;"><i class="bi bi-send"></i></button>
                    </form>
                </div>
            </div>
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