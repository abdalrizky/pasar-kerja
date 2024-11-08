<?php

session_start();

if (isset($_SESSION['login'])) {
    if ($_SESSION['user']['role_id'] != 2) {
        header('Location: ../index.php');
    }
} else {
    header('Location: ../login.php');
}

require "../../utils/database/helper.php";


$jobId = $_GET['id'];
$sql = execDML("DELETE FROM jobs WHERE id=$jobId");

if ($sql > 0) {
    echo "
        <script>
            alert('Lowongan pekerjaan berhasil terhapus')
            document.location.href='dashboard.php'
        </script>";
} else {
    echo "
        <script>
            alert('Gagal dihapus')
            document.location.href='dashboard.php'
        </script>";
}