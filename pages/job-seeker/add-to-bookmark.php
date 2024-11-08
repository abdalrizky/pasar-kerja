<?php

require '../../utils/database/helper.php';

session_start();

$jobSeekerId = $_SESSION['user']['id'];
$jobId = $_GET['id'];

$sql = execDML("INSERT INTO bookmarks VALUES (null, $jobSeekerId, $jobId)");

if ($sql > 0) {
    echo "<script>alert('Berhasil ditambahkan ke markah!'); document.location.href='../job-detail.php?id=$jobId'</script>";
} else {
    echo "<script>alert('Gagal ditambahkan ke markah!'); document.location.href='../job-detail.php?id=$jobId'</script>";
}

?>
