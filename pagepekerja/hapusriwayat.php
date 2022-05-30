<?php
session_start();
if (!isset($_SESSION["login"])){
    header("Location: login.php");
    exit;
}
require '../function.php';
$id = $_GET["nama"];

if(hapusriwayat($id) > 0){
    echo "
            <script>
                alert('data riwayat berhasil dihapus')
                document.location.href = 'riwayat.php';
            </script>
            ";
}else{
    echo "
            <script>
                alert('data riwayat gagal dihapus')
                document.location.href = 'riwayat.php';
            </script>
            ";
}
?>