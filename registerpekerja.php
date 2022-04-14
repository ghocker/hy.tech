<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>REGISTER HY.TECH</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!-- link bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous" />
    <!-- link css -->
    <link rel="stylesheet" href="css/styleregpekerj.css">

</head>

<body>
    <nav class="navbar navbar-dark bg-success justify-content-center fixed-top">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">
                <h3 class="ms-5">HY.TECH</h3>
            </a>
        </div>
    </nav>
    <section>
        <div id="card">
            <div id="card-content">
                <div id="card-title">
                    <img src="img/hy.tech.jpg" alt="logo" width="110" height="110"
                        class="rounded-circle img-thumbnail border border-success border-2 mb-3">
                    <h2>REGISTER</h2>
                    <p>AKUN PEKERJA</p>
                    <div class=" underline-title mt-2">
                    </div>
                </div>
                <form action="" method="post" class="form">
                    <label for="user-email" style="padding-top:8px">
                        &nbsp;Username
                    </label>
                    <input id="user-email" class="form-content" type="text" name="username" autocomplete="on"
                        required />
                    <div class="form-border"></div>
                    <label for="user-password" style="padding-top:22px">&nbsp;Password
                    </label>
                    <input id="user-password" class="form-content" type="password" name="password" required />
                    <div class="form-border"></div>
                    <label for="user-password2" style="padding-top:22px">&nbsp;Ulangi Password
                    </label>
                    <input id="user-password2" class="form-content" type="password" name="password2" required />
                    <div class="form-border"></div>
                    <!-- <a href="#">
                        <legend id="forgot-pass">Forgot password?</legend>
                    </a> -->
                    <input id="submit-btn" type="submit" name="submit" value="REGISTER" />
                    <a href="pagepemilik/akun.php" id="signup">batalkan</a>
                </form>
            </div>
        </div>
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
            <path fill="#198754" fill-opacity="1"
                d="M0,160L48,176C96,192,192,224,288,213.3C384,203,480,149,576,138.7C672,128,768,160,864,181.3C960,203,1056,213,1152,224C1248,235,1344,245,1392,250.7L1440,256L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z">
            </path>
        </svg>
    </section>
    <footer class="bg-success text-white text-center pb-3">
        <p>Created with pleasure by <a href="https://www.instagram.com/ghozi_ramadhan/"
                class="text-white fw-bold">Ghufron Ghozi Ramadhan</a></p>
    </footer>
</body>