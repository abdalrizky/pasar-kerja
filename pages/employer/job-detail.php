<?php

session_start();

if (isset($_SESSION['login'])) {
    if ($_SESSION['user']['role_id'] != 2) {
        header('Location: ../index.php');
    }
} else {
    header('Location: ../login.php');
}

require '../../utils/database/helper.php';

$jobId = $_GET['id'];

$job = fetch("SELECT jobs.title, employers.name as 'employer_name', jobs.posted_at
                FROM jobs
                JOIN employers ON jobs.employer_id = employers.id
                JOIN job_categories ON jobs.category_id = job_categories.id
                WHERE jobs.id=$jobId");

$jobApplications = fetch("SELECT job_seekers.name as 'employer_name', job_applications.submitted_at
                            FROM job_applications
                            JOIN job_seekers ON job_applications.job_seeker_id = job_seekers.id
                            WHERE job_applications.job_id=$jobId");

if (count($job) !== 0) {
    $job = $job[0];
} else {
    echo "ID tidak ditemukan";
    exit;
}

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
                <h1><?= $job['title'] ?></h1>
                <div class="user-actions">
                    <a href="../logout.php" class="user-action-logout">
                        <i data-feather="log-out" class="user-action-logout-logo"></i>
                        <p>Keluar</p>
                    </a>
                </div>
            </header>

            <section class="job-posting-info">
                <div class="action-button">
                    <a href="edit-job.php?id=<?= $jobId ?>">
                        <i data-feather="edit"></i>
                        Ubah Detail
                    </a>
                    <a href="delete-job.php?id=<?= $jobId ?>" onclick="return confirm('Yakin ingin menghapus lowongan pekerjaan ini? Semua data yang berkaitan dengan lowongan pekerjaan akan terhapus dari database')"><i data-feather="trash-2"></i>Hapus</a>
                </div>
                <p>Diposting oleh <?= $job['employer_name'] ?> pada <?= $job['posted_at'] ?>.</p>
                <p>Ditujukan kepada:</p>
                <img src="../../assets/img/logo-adaro.jpg" alt="">
            </section>

            <section class="job-applications-submitted">
                <h2>Daftar Lamaran yang Telah Masuk</h2>
                <div class="application-list">
                    <?php foreach ($jobApplications as $jobApplication): ?>
                    <div class="application">
                        <h3><?= $jobApplication['employer_name'] ?></h3>
                        <p>Dikirim pada <?= $jobApplication['submitted_at'] ?></p>
                        <a href="application-detail.php?id=1" class="view-application">Lihat Detail</a>
                    </div>
                    <?php endforeach; ?>
            </section>
        </main>
    </div>
    <script>
    feather.replace();
    </script>
</body>

</html>