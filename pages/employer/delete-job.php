<?php

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