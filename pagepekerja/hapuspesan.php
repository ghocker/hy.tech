<?php
session_start();
if (!isset($_SESSION["login"])){
    header("Location: login.php");
    exit;
}
require '../function.php';
$id = $_GET["nama"];

if(hapuspesan($id) > 0){
    echo "
            <script>
                document.location.href = 'aktivitas.php';
            </script>
            ";
}else{
    echo "
            <script>
                document.location.href = 'aktivitas.php';
            </script>
            ";
}
?>