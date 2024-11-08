<?php

require '../../utils/database/helper.php';

session_start();

$jobSeekerId = $_SESSION['user']['id'];
$jobId = $_GET['id'];

$sql = execDML("DELETE FROM bookmarks WHERE job_id=$jobId");

if ($sql > 0) {
    echo "<script>alert('Berhasil dihapus ke markah!'); document.location.href='../job-detail.php?id=$jobId'</script>";
} else {
    echo "<script>alert('Gagal menghapus ke markah!'); document.location.href='../job-detail.php?id=$jobId'</script>";
}

?>