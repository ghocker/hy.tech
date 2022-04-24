<?php
session_start();
if (!isset($_SESSION["login"])){
    header("Location: ../login.php");
    exit;
}
require '../function.php';
$akunpekerja = query('SELECT * FROM akunpekerja');
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
                        <a class="nav-link active" aria-current="page" href="akun.php">Akun</a>
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
        <h3 class="pt-2">Daftar Akun Pekerja</h3>
    </section>
    <!-- akhir jumbotron -->
    <!-- awal badan -->
    <section>
        <div class="container text-center">
            <table class="table table-bordered border-success mt-5">
                <thead>
                    <tr>
                        <td>Id</td>
                        <td>username</td>
                        <td>Aksi</td>
                    </tr>
                </thead>
                <?php $i= 1;?>
                <?php foreach ($akunpekerja as $row) : ?>
                <tbody>
                    <tr>
                        <td><?= $i;?></td>
                        <td><?= $row["username"];?></td>
                        <td>
                            <a href="ubahpekerja.php?nama=<?= $row["username"];?>"><button type="button"
                                    class="btn btn-success">Ubah Akun</button></a>
                            <a href="hapus.php?nama=<?= $row["username"];?>"><button type="button"
                                    class="btn btn-danger">Hapus Akun</button></a>
                        </td>
                    </tr>
                </tbody>
                <?php $i++;?>
                <?php endforeach;?>
            </table>
            <a href="akun.php"><button type="button" class="btn btn-success">Kembali</button></a>
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