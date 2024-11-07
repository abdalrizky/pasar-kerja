<?php

require '../../utils/database/helper.php';

$jobId = $_GET['id'];

$job = fetch("SELECT * FROM job_applications WHERE job_id=$jobId");
var_dump($job);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://unpkg.com/feather-icons"></script>
    <link rel="stylesheet" href="../../styles/employer/job-detail.css">
</head>
<body>
<div class="container">
        <aside class="sidebar">
            <h1 class="logo">Pasar<span>Kerja</span></h1>
            <nav>
                <ul>
                    <li><a href="dashboard.php"><i data-feather="bar-chart" class="icon"></i>Dasbor</a></li>
                    <li><a href="profile.php"><i data-feather="user" class="icon"></i>Profil</a></li>
                    <li><a href="setting.php"><i data-feather="settings" class="icon"></i>Pengaturan Akun</a></li>
                </ul>
            </nav>
        </aside>
        <main class="main-content">
            <header class="header">
                <h1>Front End Developer</h1>
                <div class="user-actions">
                    <a href="../logout.php" class="user-action-logout">
                        <i data-feather="log-out" class="user-action-logout-logo"></i>
                        <p>Keluar</p>
                    </a>
                </div>
            </header>

            <section class="job-posting-info">
                <div class="action-button">
                    <a href="edit-job.php">
                        <i data-feather="edit"></i>
                        Ubah Detail
                    </a>
                    <a href="#"><i data-feather="trash-2"></i>Hapus</a>
                </div>
                <p>Diposting oleh Si Pengembang pada 6 November 2024 18.07 WITA.</p>
                <p>Ditujukan kepada:</p>
                <img src="../../assets/img/logo-adaro.jpg" alt="">
            </section>

            <section class="job-applications-submitted">
                <h2>Daftar Lamaran yang Telah Masuk</h2>
                <div class="application-list">
                <div class="application">
                    <h3>Muhammad Abdal Rizky</h3>
                    <p>Dikirim pada 1 November 2024</p>
                    <a href="application-detail.php?id=1" class="view-application">Lihat Detail</a>
                </div>
                <div class="application">
                    <h3>Davina Putri Ananta</h3>
                    <p>Dikirim pada 2 November 2024</p>
                    <a href="application-detail.php?id=2" class="view-application">Lihat Detail</a>
                </div>
                <div class="application">
                    <h3>Tua Delima Sitompul</h3>
                    <p>Dikirim pada 3 November 2024</p>
                    <a href="application-detail.php?id=2" class="view-application">Lihat Detail</a>
                </div>
            </section>
        </main>
    </div>
    <script>feather.replace();</script>
</body>
</html>