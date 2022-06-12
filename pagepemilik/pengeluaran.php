<?php
session_start();
if (!isset($_SESSION["login"])){
    header("Location: login.php");
    exit;
}
require '../function.php';
$data_keuangan = query("SELECT * FROM keuangan WHERE tipe = 'pengeluaran'");
$tanggal = query("SELECT DAY(tanggal), MONTH(tanggal), YEAR(tanggal), HOUR(tanggal), MINUTE(tanggal) FROM keuangan WHERE tipe = 'pengeluaran'");
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
                        <a class="nav-link" href="aktivitas.php">Aktivitas</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="keuangan.php">Keuangan</a>
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
        <h3 class="pt-2">KEUANGAN</h3>
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
                                <a class="nav-link" href="keuangan.php">Mitra</a>
                            </li>
                            <li class="nav-item me-5">
                                <a class="nav-link" href="pemasukan.php">Pemasukan</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="pengeluaran.php">Pengeluaran</a>
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
    <section>
        <div class="container mt-4">
            <?php $i=0; ?>
            <?php foreach ($data_keuangan as $row) :?>
            <div class="row mb-3">
                <div class="card p-0">
                    <div class="card-header bg-success" style="color:white;">
                        <?=$row["asal"]?>
                    </div>
                    <div class="card-body bg-light">
                        <p class="card-text p-0 m-0">Tanggal <span
                                style="display:inline-block; width: 94px;"></span>:&nbsp;&nbsp;&nbsp;<?=$tanggal[$i]["DAY(tanggal)"], '/' ,$tanggal[$i]["MONTH(tanggal)"], '/' ,$tanggal[$i]["YEAR(tanggal)"],'   ' ,$tanggal[$i]["HOUR(tanggal)"],':' ,$tanggal[$i]["MINUTE(tanggal)"],' WIB'?>
                        </p>
                        <p class="card-text p-0 m-0">Barang <span
                                style="display:inline-block; width: 98px;"></span>:&nbsp;&nbsp;&nbsp;<?=$row["barang"]?>
                        </p>
                        <p class="card-text p-0 m-0">Jumlah Transaksi <span
                                style="display:inline-block; width: 30px;"></span>:&nbsp;&nbsp;&nbsp;<?=$row["nominal"]?>
                        </p>
                        <p class="card-text p-0 m-0">Keterangan <span
                                style="display:inline-block; width: 66px;"></span>:&nbsp;&nbsp;&nbsp;<?=$row["keterangan"]?>
                        </p>
                        <div class="mt-3 d-flex justify-content-end">
                            <form action="" method="post">
                                <input type="hidden" name="id" value="">
                                <a href="hapuspengeluaran.php?nama=<?=$row["id"]?>" class="btn btn-danger ">Hapus</a>
                                <a href="ubahpengeluaran.php?nama=<?=$row["id"]?>" class="btn btn-warning ">Ubah</a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <?php $i++; ?>
            <?php endforeach;?>
            <div class="row justify-content-center">
                <div class="class pt-5 text-center">
                    <a href="tambahpengeluaran.php" class="btn btn-success">Tambah Data Transaksi</a>
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