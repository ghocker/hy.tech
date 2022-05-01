<?php 
$conn = mysqli_connect("localhost", "root", "", "hy.tech");

function query($query){
    global $conn;
    $result = mysqli_query($conn,$query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)){
        $rows[] = $row;
    }
    return $rows;
}
function registrasipekerja($data){
    global $conn;
    $nama = strtolower(stripslashes($data["nama"]));
    $email = strtolower(stripslashes($data["email"]));
    $username = strtolower(stripslashes($data["username"]));
    $password = mysqli_real_escape_string($conn,$data["password"]);
    $password2 = mysqli_real_escape_string($conn,$data["password2"]);
    $alamat = strtolower(stripslashes($data["alamat"]));
    $result = mysqli_query($conn, "SELECT username FROM akunpekerja WHERE username = '$username'");
    if (mysqli_fetch_assoc($result)){
        echo "<script>
        alert('username sudah terdaftar')
        </script>";
        return false;
    }
    if ($password !== $password2){
        echo "<script>
        alert('konfirmasi password tidak sesuai')
        </script>";
        return false;
    }
    $password = password_hash($password, PASSWORD_DEFAULT);
    mysqli_query($conn, "INSERT INTO akunpekerja VALUES ('','$nama','$email','$username','$password','$alamat')");
    return mysqli_affected_rows($conn);
}   


function registrasipemilik($data){
    global $conn;
    $nama = strtolower(stripslashes($data["nama"]));
    $email = strtolower(stripslashes($data["email"]));
    $username = strtolower(stripslashes($data["username"]));
    $password = mysqli_real_escape_string($conn,$data["password"]);
    $password2 = mysqli_real_escape_string($conn,$data["password2"]);
    $alamat = strtolower(stripslashes($data["alamat"]));
    $result = mysqli_query($conn, "SELECT username FROM akunpemilik WHERE username = '$username'");
    if (mysqli_fetch_assoc($result)){
        echo "<script>
        alert('username sudah terdaftar')
        </script>";
        return false;
    }
    if ($password !== $password2){
        echo "<script>
        alert('konfirmasi password tidak sesuai')
        </script>";
        return false;
    }
    $password = password_hash($password, PASSWORD_DEFAULT);
    mysqli_query($conn, "INSERT INTO akunpemilik VALUES ('','$nama','$email','$username','$password','$alamat')");
    return mysqli_affected_rows($conn);
}    
function ubahpemilik($data){
    global $conn;
    $id = $data["id"];
    $nama = htmlspecialchars($data["nama"]);
    $email = htmlspecialchars($data["email"]);
    $username = htmlspecialchars($data["user"]);
    $password = htmlspecialchars($data["pass"]);
    $password2 = htmlspecialchars($data["pass2"]);
    $alamat = htmlspecialchars($data["alamat"]);
    if ($password !== $password2){
        echo "<script>
        alert('konfirmasi password tidak sesuai')
        </script>";
        return false;
    }
    $password = password_hash($password, PASSWORD_DEFAULT);
    $query = "UPDATE akunpemilik SET
    nama_pemilik = '$nama',
    email_pemilik = '$email',
    username = '$username',
    password = '$password',
    alamat_pemilik = '$alamat'
    WHERE username = '$id'
    ";
mysqli_query($conn,$query);
return mysqli_affected_rows($conn);
}
function ubahpekerja($data){
    global $conn;
    $id = $data["id"];
    $nama = htmlspecialchars($data["nama"]);
    $email = htmlspecialchars($data["email"]);
    $username = htmlspecialchars($data["user"]);
    $password = htmlspecialchars($data["pass"]);
    $password2 = htmlspecialchars($data["pass2"]);
    $alamat = htmlspecialchars($data["alamat"]);
    if ($password !== $password2){
        echo "<script>
        alert('konfirmasi password tidak sesuai')
        </script>";
        return false;
    }
    $password = password_hash($password, PASSWORD_DEFAULT);
    $query = "UPDATE akunpekerja SET 
    nama_pekerja = '$nama',
    email_pekerja = '$email', 
    username = '$username',
    password = '$password',
    alamat_pekerja = '$alamat'
    WHERE username = '$id'
    ";
mysqli_query($conn,$query);
return mysqli_affected_rows($conn);
}
function hapus($id){
    global $conn;
    mysqli_query($conn, "DELETE FROM akunpekerja WHERE username = '$id'");
    return mysqli_affected_rows($conn);
}  
function tambahlahan($data) {
    global $conn;
    $nama = htmlspecialchars($data["nama"]);
    $lokasi = htmlspecialchars($data["lokasi"]);
    $kapasitas = htmlspecialchars($data["kapasitas"]);
    $luas = htmlspecialchars($data["luas"]);
    $tanaman = htmlspecialchars($data["tanaman"]);
    $result = mysqli_query($conn, "SELECT * FROM lahan WHERE nama_lahan = '$username'");
    $sql1 = "SELECT * FROM lahan";
    $result1 = $conn->query($sql1);
    while($user = $result1->fetch_assoc()){
        if ($nama == $user["nama_lahan"]){
            echo "
                <script>
                    alert('nama lahan sudah ada')
                    document.location.href = 'lahan.php';
                </script>
                ";
        }
    }
    mysqli_query($conn, "INSERT INTO lahan VALUES ('','$nama','$lokasi','$kapasitas','$luas','$tanaman')");
    return mysqli_affected_rows($conn);
} 
function ubahlahan($data){
    global $conn;
    $id = $data["id"];
    $nama = htmlspecialchars($data["nama"]);
    $lokasi = htmlspecialchars($data["lokasi"]);
    $kapasitas = htmlspecialchars($data["kapasitas"]);
    $luas = htmlspecialchars($data["luas"]);
    $tanaman = htmlspecialchars($data["tanaman"]);
    $sql1 = "SELECT * FROM lahan";
    $result1 = $conn->query($sql1);
    while($user = $result1->fetch_assoc()){
        if ($nama == $user["nama_lahan"]){
            echo "
                <script>
                    alert('nama lahan sudah ada')
                    document.location.href = 'lahan.php';
                </script>
                ";
        }
    }
    $query = "UPDATE lahan SET 
    nama_lahan = '$nama',
    lokasi = '$lokasi', 
    kapasitas = $kapasitas,
    luas = $luas,
    tanaman = '$tanaman'
    WHERE nama_lahan = '$id'
    ";
mysqli_query($conn,$query);
return mysqli_affected_rows($conn);
}
function hapuslahan($id){
    global $conn;
    mysqli_query($conn, "DELETE FROM lahan WHERE nama_lahan = '$id'");
    return mysqli_affected_rows($conn);
}  
?>