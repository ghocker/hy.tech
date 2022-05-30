<?php
session_start();
if (!isset($_SESSION["login"])){
    header("Location: login.php");
    exit;
}
require '../function.php';
$id = $_GET["nama"];

if(hapusaktivitas($id) > 0){
    echo "
            <script>
                alert('data aktivitas berhasil dihapus')
                document.location.href = 'pertumbuhan.php';
            </script>
            ";
}else{
    echo "
            <script>
                alert('data aktivitas gagal dihapus')
                document.location.href = 'pertumbuhan.php';
            </script>
            ";
}
?>