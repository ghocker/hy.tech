<?php
session_start();
if (!isset($_SESSION["login"])){
    header("Location: login.php");
    exit;
}
function hari_ini(){
	$hari = date ("D");
 
	switch($hari){
		case 'Sun':
			$hari_ini = "Minggu";
		break;
 
		case 'Mon':			
			$hari_ini = "Senin";
		break;
 
		case 'Tue':
			$hari_ini = "Selasa";
		break;
 
		case 'Wed':
			$hari_ini = "Rabu";
		break;
 
		case 'Thu':
			$hari_ini = "Kamis";
		break;
 
		case 'Fri':
			$hari_ini = "Jumat";
		break;
 
		case 'Sat':
			$hari_ini = "Sabtu";
		break;
		
		default:
			$hari_ini = "Tidak di ketahui";		
		break;
	}
 
	return $hari_ini;
 
}
function tgl_indo($tanggal){
	$bulan = array (
		1 =>   'Januari',
		'Februari',
		'Maret',
		'April',
		'Mei',
		'Juni',
		'Juli',
		'Agustus',
		'September',
		'Oktober',
		'November',
		'Desember'
	);
	$pecahkan = explode('-', $tanggal); 
	return $pecahkan[2] . ' ' . $bulan[ (int)$pecahkan[1] ] . ' ' . $pecahkan[0];
}
date_default_timezone_set('Asia/Jakarta');
$tanggal = tgl_indo(date('Y-m-d'));
$waktu = date('H:i:s');
function salam($sal){
    $awalhari = mktime(0,0,0,date('m'),date('d'),date('Y'));
    $hariini = time();
    $kondisi = ($hariini- $awalhari)/60/60;
    $keadaan = "hari";
    if ($kondisi >= 3 && $kondisi < 10){
        $keadaan = "PAGI";
    }
    else if ($kondisi >= 10 && $kondisi < 15){
        $keadaan = "SIANG";
    }
    else if ($kondisi >= 15 && $kondisi < 18){
        $keadaan = "SORE";
    }
    else if ($kondisi >= 18 && $kondisi < 24){
        $keadaan = "MALAM";
    }
    else {
        $keadaan = "DINI HARI";
    }
    return "$sal $keadaan";
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
    <link rel="stylesheet" href="css/style.css" />
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
                        <a class="nav-link active" aria-current="page" href="index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="pagepemilik/lahan.php">Lahan</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="pagepemilik/aktivitas.php">Aktivitas</a>
                    <li class="nav-item">
                        <a class="nav-link" href="pagepemilik/akun.php?nama=<?=$_SESSION["login"];?>">Akun</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- akhir navbar -->
    <!-- awal jumbotron -->
    <section class="jumbotron text-center">
        <img src="img/hy.tech.jpg" alt="logo" width="200"
            class="rounded-circle img-thumbnail border border-success border-4" />
        <h3 class="display-4 fw-bold mt-3">
            <?php echo salam("SELAMAT");?>
        </h3>
        <p class="lead mb-1">Selamat Datang di Hy.tech</p>
        <p class="lead m-3;"><?php echo "Hari : ",hari_ini(),", ",$tanggal,"  Pukul : ",$waktu," ","WIB";?></p>
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
            <path fill="#ffffff" fill-opacity="1"
                d="M0,192L60,170.7C120,149,240,107,360,106.7C480,107,600,149,720,160C840,171,960,149,1080,117.3C1200,85,1320,43,1380,21.3L1440,0L1440,320L1380,320C1320,320,1200,320,1080,320C960,320,840,320,720,320C600,320,480,320,360,320C240,320,120,320,60,320L0,320Z">
            </path>
        </svg>
    </section>
    <!-- akhir jumbotron -->
    <!-- awal badan -->
    <section>
        <div class="row">
            <div class="class text-center mb-3">
                <h3>TUJUAN HY.TECH</h3>
            </div>
            <div class="row text-center">
                <ul>
                    <li>
                        Mempermudah pemilik lahan dalam mengontrol waktu pengelolaan tanaman hidroponik
                    </li>
                    <li>
                        Membantu pemilik lahan dalam memprediksi kebutuhan dalam proses penanganan masalah pembudidayaan
                        tanaman hidroponik yang kurang efisien
                    </li>
                    <li>
                        Meningkatkan keefektifan waktu produksi tanaman hidroponik
                    </li>
                    <li>
                        Memperkenalkan mitra di bidang teknologi hidroponik yang lebih luas.
                    </li>
                </ul>
            </div>
        </div>
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
            <path fill="#caf1d2" fill-opacity="1"
                d="M0,192L80,213.3C160,235,320,277,480,277.3C640,277,800,235,960,218.7C1120,203,1280,213,1360,218.7L1440,224L1440,320L1360,320C1280,320,1120,320,960,320C800,320,640,320,480,320C320,320,160,320,80,320L0,320Z">
            </path>
        </svg>
    </section>
    <section style="background-color: #caf1d2;">
        <div class="container">
            <div class="row">
                <div class="class text-center mt-5 mb-3">
                    <h3>MITRA HY.TECH</h3>
                </div>
            </div>
            <div class="row text-center justify-content-center">
                <img src="img/farm.png" alt="logo" style="width: 260px; height: 260px;"
                    class="rounded-circle img-thumbnail border border-dark border-4" />
            </div>
            <div class="row text-center">
                <h5 class="mt-3">Bondowoso Sinergi Farming</h5>
                <p>Jl. Raya Jember Dadapan Grujugan Bondowoso Jawa Timur (Depan Toko Basmalah Grujugan)</p>
                <p>087791156327</p>
            </div>
        </div>
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
            <path fill="#ffffff" fill-opacity="1"
                d="M0,192L60,170.7C120,149,240,107,360,106.7C480,107,600,149,720,160C840,171,960,149,1080,117.3C1200,85,1320,43,1380,21.3L1440,0L1440,320L1380,320C1320,320,1200,320,1080,320C960,320,840,320,720,320C600,320,480,320,360,320C240,320,120,320,60,320L0,320Z">
            </path>
        </svg>
    </section>
    <section>
        <div class="container mb-4">
            <div class="row">
                <div class="class text-center mb-3">
                    <h3>TIM HY.TECH</h3>
                </div>
            </div>
            <div class="row mt-5 text-center">
                <div class="col-md-2 me-5">
                    <img src="img/hafidz.jpeg" alt="logo" style="width: 260px; height: 260px;"
                        class="rounded-circle img-thumbnail border border-success border-4" />
                    <h5 class="mt-3">Hafidzun Alim</h5>
                    <p class="mb-0">Project Manager</p>
                    <p class="m-0">202410103062</p>
                    <p class="m-0">Informatika 20</p>
                </div>
                <div class="col-md-2 me-5">
                    <img src="img/nur.jpeg" alt="logo" style="width: 260px; height: 260px;"
                        class="rounded-circle img-thumbnail border border-success border-4" />
                    <h5 class="mt-3">Nur Azlina</h5>
                    <p class="mb-0">System Analyst</p>
                    <p class="m-0">202410103002</p>
                    <p class="m-0">Informatika 20</p>
                </div>
                <div class="col-md-2 me-5">
                    <img src="img/cindi.jpg" alt="logo" style="width: 260px; height: 260px;"
                        class="rounded-circle img-thumbnail border border-success border-4" />
                    <h5 class="mt-3">Cindi Dewi Aprilia</h5>
                    <p class="mb-0">System Designer</p>
                    <p class="m-0">202410103075</p>
                    <p class="m-0">Informatika 20</p>
                </div>
                <div class="col-md-2 me-5">
                    <img src="img/my.jpg" alt="logo" style="width: 260px; height: 260px;"
                        class="rounded-circle img-thumbnail border border-success border-4" />
                    <h5 class="mt-3">Ghufron Ghozi R</h5>
                    <p class="mb-0">System Developer</p>
                    <p class="m-0">202410103087</p>
                    <p class="m-0">Informatika 20</p>
                </div>
                <div class="col-md-2">
                    <img src="img/ikang.jpeg" alt="logo" style="width: 260px; height: 260px;"
                        class="rounded-circle img-thumbnail border border-success border-4" />
                    <h5 class="mt-3">Ikang Tanoto</h5>
                    <p class="mb-0">System Tester</p>
                    <p class="m-0">202410103018</p>
                    <p class="m-0">Informatika 20</p>
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
                class="text-white fw-bold">Ghufron Ghozi Ramadhan</a></p>
    </footer>
    <!-- akhir footer -->
</body>

</html>