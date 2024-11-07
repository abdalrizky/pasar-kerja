<?php

require '../../utils/database/helper.php';

$jobs = fetch('SELECT * FROM jobs');

?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dasbor Employer - Pasar Kerja</title>
    <script src="https://unpkg.com/feather-icons"></script>
    <link rel="stylesheet" href="../../styles/employer/dashboard.css">
</head>

<body>
    <div class="container">
        <aside class="sidebar">
            <h1 class="logo">Pasar<span>Kerja</span></h1>
            <nav>
                <ul>
                    <li><a href="dashboard.php" class="sidebar-on"><i data-feather="bar-chart" class="icon"></i>Dasbor</a></li>
                    <li><a href="profile.php"><i data-feather="user" class="icon"></i>Profil</a></li>
                    <li><a href="setting.php"><i data-feather="settings" class="icon"></i>Pengaturan Akun</a></li>
                </ul>
            </nav>
        </aside>
        <main class="main-content">
            <header class="header">
                <h1>Dasbor</h1>
                <div class="user-actions">
                    <a href="../logout.php" class="user-action-logout">
                        <i data-feather="log-out" class="user-action-logout-logo"></i>
                        <p>Keluar</p>
                    </a>
                </div>
            </header>

            <section class="profile-widget">
                <h2>Hai, Muhammad Abdal Rizky</h2>
                <p>Hari yang cerah, selamat bekerja!</p>
                <a href="#job-list">Beberapa pekerjaan sedang menunggu ditinjau!</a>
            </section>

            <section id="job-list" class="job-list">
                <div class="header-job-created-title">
                    <h2>Daftar Lowongan yang Dibuat</h2>
                    <a href="new-job.php">Buat Lowongan Baru</a>
                </div>
                <?php if (count($jobs) !== 0): ?>
                <div class="job-cards">
                    <?php foreach ($jobs as $job): ?>
                        <div class="job-card">
                        <h3><?= $job['title']; ?></h3>
                        <p>Status: <?= $job['status'] === 'open' ? 'Terbuka' : 'Telah Ditutup'; ?></p>
                        <a href='job-detail.php?id=<?= $job["id"] ?>'>Lihat Detail</a>
                    </div>
                    <?php endforeach; ?>
                </div>
                <?php else: ?>
                    <h4>Belum ada Lowongan</h4>
                <?php endif; ?>
            </section>
        </main>
    </div>
    <script>
    feather.replace();
    </script>
    <script src="../../js/dashboard.js"></script>
</body>

</html>