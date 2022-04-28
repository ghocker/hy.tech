<?php
session_start();
if (!isset($_SESSION["login"])){
    header("Location: ../login.php");
    exit;
}
require '../function.php';
$id= $_GET["nama"];
$lahan = query("SELECT * FROM lahan WHERE nama_lahan = '$id'")[0];
if (isset($_POST["submit"]) ){
    if (ubahlahan($_POST) > 0){
        echo "
            <script>
                alert('data berhasil diubah')
                document.location.href = 'lahan.php';
            </script>
            ";
    }else{
         echo "
            <script>
                alert('data gagal diubah')
                document.location.href = 'lahan.php';
            </script>
            ";
        }
    
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
                        <a class="nav-link" href="../indexpekerja.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="lahan.php">Lahan</a>
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
    <section class="text-center" style="padding-top:5rem;">
        <h3 class="pt-2">Ubah Data Lahan</h3>
    </section>
    <!-- akhir jumbotron -->
    <!-- awal badan -->
    <section>
        <div class="container text-center pt-5" style="width:350px;">
            <form action="" method="post">
                <input type="hidden" name="id" value="<?=$id;?>">
                <div class="row mb-3">
                    <label for="nama">Masukkan Nama Lahan :</label>
                    <input type="text" class="text-center" name="nama" id="nama" required
                        value="<?=$lahan["nama_lahan"]?>">
                </div>
                <div class="row mb-3">
                    <label for="lokasi">Masukkan Lokasi Lahan :</label>
                    <input type="text" class="text-center" name="lokasi" id="lokasi" required
                        value="<?=$lahan["lokasi"]?>">
                </div>
                <div class="row mb-3">
                    <label for="kapasitas">Masukkan Kapasitas Lahan (lubang) :</label>
                    <input type="text" class="text-center" name="kapasitas" id="kapasitas" required
                        value="<?=$lahan["kapasitas"]?>">
                </div>
                <div class="row mb-3">
                    <label for="luas">Masukkan Luas Lahan (m2) :</label>
                    <input type="text" class="text-center" name="luas" id="luas" required value="<?=$lahan["luas"]?>">
                </div>
                <div class="row mb-3">
                    <label for="tanaman">Masukkan Nama Tanaman :</label>
                    <input type="text" class="text-center" name="tanaman" id="tanaman" required
                        value="<?=$lahan["tanaman"]?>">
                </div>
                <div class="row mb-3" style="display:inline;">
                    <a href="lahan.php"><button type="button" class="btn btn-danger">BATAL</button></a>
                    <a href=""><button type="submit" class="btn btn-success" name="submit">UBAH</button></a>
                </div>
            </form>
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