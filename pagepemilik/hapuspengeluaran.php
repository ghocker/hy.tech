<?php
session_start();
if (!isset($_SESSION["login"])){
    header("Location: login.php");
    exit;
}
require '../function.php';
$id = $_GET["nama"];

if(hapuspengeluaran($id) > 0){
    echo "
            <script>
                alert('data transaksi berhasil dihapus')
                document.location.href = 'pengeluaran.php';
            </script>
            ";
}else{
    echo "
            <script>
                alert('data transaksi gagal dihapus')
                document.location.href = 'pengeluaran.php';
            </script>
            ";
}
?>