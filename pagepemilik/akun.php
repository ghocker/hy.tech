<?php
session_start();
if (!isset($_SESSION["login"])){
    header("Location: login.php");
    exit;
}
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
                        <a class="nav-link active" aria-current="page" href="pagepemilik/akun.php">Akun</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- akhir navbar -->
    <!-- awal jumbotron -->
    <section class="text-center" style="padding-top:5rem;">
        <img src="../img/hy.tech.jpg" alt="logo" width="200"
            class="rounded-circle img-thumbnail border border-success border-4" />
        <h3 class="pt-2">Akun Pemilik</h3>
        <p><?=$_SESSION["login"];?></p>
    </section>
    <!-- akhir jumbotron -->
    <!-- awal badan -->
    <section>
        <div class="container text-center">
            <div class="row p-2">
                <a href="ubahpemilik.php"><button type="button" class="btn btn-success"
                        style="width : 600px; height :50px;">Ubah Data
                        Akun
                        Pemilik</button></a>
            </div>
            <div class="row p-2">
                <a href="../registerpekerja.php"><button type="button" class="btn btn-success"
                        style="width : 600px; height :50px;">Tambah Data Akun
                        Pekerja</button></a>
            </div>
            <div class="row p-2">
                <a href="lihatakunpekerja.php"><button type="button" class="btn btn-success"
                        style="width : 600px; height :50px;">Ubah Data Akun
                        Pekerja</button></a>
            </div>
            <div class="row p-2">
                <a href="../logout.php"><button type="button" class="btn btn-success"
                        style="width : 600px; height :50px;">LOG OUT</button></a>
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
                class="text-white fw-bold">Ghufron Ghozi Ramadhan</a></p>
    </footer>
    <!-- akhir footer -->
</body>

</html>