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
                exit;
        }
    }
    mysqli_query($conn, "INSERT INTO lahan VALUES ('','$nama','$lokasi','$kapasitas','$luas',NULL,NULL,NULL,NULL,NULL,NULL)");
    return mysqli_affected_rows($conn);
} 
function ubahlahan($data){
    global $conn;
    $id = $data["id"];
    $nama = htmlspecialchars($data["nama"]);
    $lokasi = htmlspecialchars($data["lokasi"]);
    $kapasitas = htmlspecialchars($data["kapasitas"]);
    $luas = htmlspecialchars($data["luas"]);
    $sql1 = "SELECT * FROM lahan";
    $result1 = $conn->query($sql1);
    while($user = $result1->fetch_assoc()){
        if ($nama == $id){
            $query = "UPDATE lahan SET 
    nama_lahan = '$nama',
    lokasi = '$lokasi', 
    kapasitas = $kapasitas,
    luas = $luas
    WHERE nama_lahan = '$id'
    ";
    mysqli_query($conn,$query);
    return mysqli_affected_rows($conn);
        }
        else if ($nama == $user["nama_lahan"]){
            echo "
                <script>
                    alert('nama lahan sudah ada')
                    document.location.href = 'lahan.php';
                </script>
                ";
                exit;
        }
    }
}
function hapuslahan($id){
    global $conn;
    mysqli_query($conn, "DELETE FROM lahan WHERE nama_lahan = '$id'");
    return mysqli_affected_rows($conn);
}  
function tanaman($data){
    global $conn;
    date_default_timezone_set('Asia/Jakarta');
    $id = $data["id"];
    $tanaman = htmlspecialchars($data["tanaman"]);
    $proses = 'penyemaian';
    $penyemaian = date("Y-m-d H:i:s");
    $sql1 = "SELECT * FROM lahan";
    $result1 = $conn->query($sql1);
    while($user = $result1->fetch_assoc()){
        if ($id == $user["nama_lahan"]){
            if ($user["proses"] != NULL){
                echo "
                <script>
                    alert('lahan sedang dalam proses budidaya')
                    document.location.href = 'lahan.php';
                </script>
                ";
                exit;
            }
        }
    }
    $query = "UPDATE lahan SET 
    tanaman = '$tanaman',
    proses = '$proses',
    penyemaian = '$penyemaian'
    WHERE nama_lahan = '$id'
    ";
mysqli_query($conn,$query);
return mysqli_affected_rows($conn);
}
function hapusaktivitas($data){
    global $conn;
    $id = $data;
    $query = "UPDATE lahan SET 
    tanaman = NULL,
    proses = NULL,
    penyemaian = NULL,
    pertumbuhan = NULL,
    panen = NULL,
    keterangan = NULL
    WHERE nama_lahan = '$id'
    ";
mysqli_query($conn,$query);
return mysqli_affected_rows($conn);
}
function ubahaktivitas($data){
    global $conn;
    $id = $data["id"];
    $nama = htmlspecialchars($data["nama"]);
    $keterangan = htmlspecialchars($data["keterangan"]);
    $query = "UPDATE lahan SET 
    tanaman = '$nama',
    keterangan = '$keterangan'
    WHERE nama_lahan = '$id'
    ";
mysqli_query($conn,$query);
return mysqli_affected_rows($conn);
}
function pertumbuhan($data){
    global $conn;
    date_default_timezone_set('Asia/Jakarta');
    $id = $data["id"];
    $proses = 'pertumbuhan';
    $pertumbuhan = date("Y-m-d H:i:s");
    $query = "UPDATE lahan SET 
    proses = '$proses',
    pertumbuhan = '$pertumbuhan'
    WHERE nama_lahan = '$id'
    ";
mysqli_query($conn,$query);
return mysqli_affected_rows($conn);
}
function panen($data){
    global $conn;
    date_default_timezone_set('Asia/Jakarta');
    $id = $data["id"];
    $proses = 'panen';
    $panen = date("Y-m-d H:i:s");
    $query = "UPDATE lahan SET 
    proses = '$proses',
    panen = '$panen'
    WHERE nama_lahan = '$id'
    ";
mysqli_query($conn,$query);
return mysqli_affected_rows($conn);
}
function inputriwayat($data) {
    global $conn;
    $nama_lahan = htmlspecialchars($data["lahan"]);
    $tanaman = htmlspecialchars($data["nama"]);
    $penyemaian = htmlspecialchars($data["penyemaian"]);
    $pertumbuhan = htmlspecialchars($data["pertumbuhan"]);
    $panen = htmlspecialchars($data["panen"]);
    $hasil = htmlspecialchars($data["hasil"]);
    $keterangan = htmlspecialchars($data["keterangan"]);
    mysqli_query($conn, "INSERT INTO riwayat VALUES ('','$nama_lahan','$tanaman','$penyemaian','$pertumbuhan','$panen','$hasil','$keterangan')");
    hapusaktivitas($nama_lahan);
    return mysqli_affected_rows($conn);
}
function hapusriwayat($id){
    global $conn;
    mysqli_query($conn, "DELETE FROM riwayat WHERE nama_lahan = '$id'");
    return mysqli_affected_rows($conn);
}  
function ubahriwayat($data){
    global $conn;
    $id = $data["id"];
    $lahan = htmlspecialchars($data["lahan"]);
    $tanaman = htmlspecialchars($data["nama"]);
    $hasil = htmlspecialchars($data["hasil"]);
    $keterangan = htmlspecialchars($data["lokasi"]);
    $query = "UPDATE riwayat SET 
    nama_lahan = '$lahan',
    tanaman = '$nama',
    hasil = '$hasil',
    keterangan = '$keterangan'
    WHERE nama_lahan = '$id'
    ";
mysqli_query($conn,$query);
return mysqli_affected_rows($conn);
}
function pesan($data) {
    global $conn;
    date_default_timezone_set('Asia/Jakarta');
    $pelaku = htmlspecialchars($data["aktor"]);
    $tanggal = date("Y-m-d H:i:s");
    $proses = htmlspecialchars($data["proses"]);
    $pesan = htmlspecialchars($data["pesan"]);
    $nama = htmlspecialchars($data["nama"]);
    mysqli_query($conn, "INSERT INTO chat VALUES ('','$pelaku','$pesan','$tanggal','$proses','$nama')");
    hapusaktivitas($nama_lahan);
    return mysqli_affected_rows($conn);
}
function hapuspesan($id){
    global $conn;
    mysqli_query($conn, "DELETE FROM chat WHERE pesan = '$id'");
    return mysqli_affected_rows($conn);
}  
function tambahmitra($data) {
    global $conn;
    $mitra = htmlspecialchars($data["mitra"]);
    $pemilik = htmlspecialchars($data["pemilik"]);
    $contact = htmlspecialchars($data["contact"]);
    $alamat = htmlspecialchars($data["alamat"]);
    $keterangan = htmlspecialchars($data["keterangan"]);
    $sql1 = "SELECT * FROM mitra";
    $result1 = $conn->query($sql1);
    while($user = $result1->fetch_assoc()){
        if ($mitra == $user["nama_mitra"]){
            echo "
                <script>
                    alert('nama Mitra sudah ada')
                    document.location.href = 'keuangan.php';
                </script>
                ";
                exit;
        }
    }
    mysqli_query($conn, "INSERT INTO mitra VALUES ('','$mitra','$pemilik','$contact','$alamat','$keterangan')");
    return mysqli_affected_rows($conn);
} 
function ubahmitra($data){
    global $conn;
    $id = $data["id"];
    $mitra = htmlspecialchars($data["mitra"]);
    $pemilik = htmlspecialchars($data["pemilik"]);
    $contact = htmlspecialchars($data["contact"]);
    $alamat = htmlspecialchars($data["alamat"]);
    $keterangan = htmlspecialchars($data["keterangan"]);
    $sql1 = "SELECT * FROM mitra";
    $result1 = $conn->query($sql1);
    while($user = $result1->fetch_assoc()){
        if ($mitra == $user["nama_mitra"]){
            echo "
                <script>
                    alert('nama mitra sudah ada')
                    document.location.href = 'keuangan.php';
                </script>
                ";
                exit;
        }
        else{
            $query = "UPDATE mitra SET 
    nama_mitra = '$mitra',
    nama_pemilik = '$pemilik', 
    contact = '$contact',
    alamat = '$alamat',
    keterangan = '$keterangan'
    WHERE nama_mitra = '$id'
    ";
    mysqli_query($conn,$query);
    return mysqli_affected_rows($conn);
            
        }
    }
}
function hapusmitra($id){
    global $conn;
    mysqli_query($conn, "DELETE FROM mitra WHERE nama_mitra = '$id'");
    return mysqli_affected_rows($conn);
}  
function tambahtransaksi($data) {
    global $conn;
    date_default_timezone_set('Asia/Jakarta');
    $tanggal = date("Y-m-d H:i:s");
    $asal = htmlspecialchars($data["asal"]);
    $barang = htmlspecialchars($data["barang"]);
    $nominal = htmlspecialchars($data["nominal"]);
    $keterangan = htmlspecialchars($data["keterangan"]);
    mysqli_query($conn, "INSERT INTO keuangan VALUES ('','$tanggal','$barang','$nominal','$keterangan','$asal','pemasukan')");
    return mysqli_affected_rows($conn);
} 
function hapustransaksi($id){
    global $conn;
    mysqli_query($conn, "DELETE FROM keuangan WHERE id = '$id'");
    return mysqli_affected_rows($conn);
}  
function ubahtransaksimitra($data){
    global $conn;
    $id = $data["id"];
    $barang = htmlspecialchars($data["barang"]);
    $nominal = htmlspecialchars($data["nominal"]);
    $keterangan = htmlspecialchars($data["keterangan"]);
    $query = "UPDATE keuangan SET 
    barang = '$barang',
    nominal = '$nominal', 
    keterangan = '$keterangan'
    WHERE id = '$id'
    ";
    mysqli_query($conn,$query);
    return mysqli_affected_rows($conn);
}
function tambahpemasukan($data) {
    global $conn;
    date_default_timezone_set('Asia/Jakarta');
    $tanggal = date("Y-m-d H:i:s");
    $asal = htmlspecialchars($data["asal"]);
    $barang = htmlspecialchars($data["barang"]);
    $nominal = htmlspecialchars($data["nominal"]);
    $keterangan = htmlspecialchars($data["keterangan"]);
    mysqli_query($conn, "INSERT INTO keuangan VALUES ('','$tanggal','$barang','$nominal','$keterangan','$asal','pemasukan')");
    return mysqli_affected_rows($conn);
} 
function tambahpengeluaran($data) {
    global $conn;
    date_default_timezone_set('Asia/Jakarta');
    $tanggal = date("Y-m-d H:i:s");
    $asal = htmlspecialchars($data["asal"]);
    $barang = htmlspecialchars($data["barang"]);
    $nominal = htmlspecialchars($data["nominal"]);
    $keterangan = htmlspecialchars($data["keterangan"]);
    mysqli_query($conn, "INSERT INTO keuangan VALUES ('','$tanggal','$barang','$nominal','$keterangan','$asal','pengeluaran')");
    return mysqli_affected_rows($conn);
} 
function ubahpemasukan($data){
    global $conn;
    $id = $data["id"];
    $barang = htmlspecialchars($data["barang"]);
    $nominal = htmlspecialchars($data["nominal"]);
    $keterangan = htmlspecialchars($data["keterangan"]);
    $asal = htmlspecialchars($data["asal"]);
    $query = "UPDATE keuangan SET 
    asal = '$asal',
    barang = '$barang',
    nominal = '$nominal', 
    keterangan = '$keterangan'
    WHERE id = '$id'
    ";
    mysqli_query($conn,$query);
    return mysqli_affected_rows($conn);
}
function hapuspemasukan($id){
    global $conn;
    mysqli_query($conn, "DELETE FROM keuangan WHERE id = '$id'");
    return mysqli_affected_rows($conn);
}  
function ubahpengeluaran($data){
    global $conn;
    $id = $data["id"];
    $barang = htmlspecialchars($data["barang"]);
    $nominal = htmlspecialchars($data["nominal"]);
    $keterangan = htmlspecialchars($data["keterangan"]);
    $asal = htmlspecialchars($data["asal"]);
    $query = "UPDATE keuangan SET 
    asal = '$asal',
    barang = '$barang',
    nominal = '$nominal', 
    keterangan = '$keterangan'
    WHERE id = '$id'
    ";
    mysqli_query($conn,$query);
    return mysqli_affected_rows($conn);
}
function hapuspengeluaran($id){
    global $conn;
    mysqli_query($conn, "DELETE FROM keuangan WHERE id = '$id'");
    return mysqli_affected_rows($conn);
}  
?>