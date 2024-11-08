<?php

require '../../utils/database/helper.php';
require '../../utils/date.php';

session_start();

$jobSeekerId = $_SESSION['user']['id'];

$jobApplications = fetch("SELECT job_applications.submitted_at, jobs.title, jobs.location, companies.logo, companies.name as 'company_name'
                            FROM job_applications
                            JOIN jobs ON job_applications.job_id = jobs.id
                            JOIN employers ON jobs.employer_id = employers.id
                            JOIN companies ON employers.company_id = companies.id
                            WHERE job_seeker_id=$jobSeekerId");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Riwayat Lamaran - Pasar Kerja</title>
    <link rel="stylesheet" href="../../styles/job-seeker/bookmark.css">
</head>

<body>
    <header>
        <a href="../index.php">
            <h1><span style="color: white;">Pasar</span><span style="color: orange; font-style: italic;">Kerja</span>
            </h1>
        </a>
        <nav>
            <ul>
                <?php if (isset($_SESSION['login'])): ?>
                    <li><a href="bookmark.php">Bookmark</a></li>
                    <li><a href="application-history.php">Riwayat Lamaran</a></li>
                    <li><a href="profile.php">Profil</a></li>
                    <li><a href="logout.php">Hai, <?= $_SESSION['user']['name'] ?></a></li>
                    <?php else: ?>
                    <li><a href="signup.php" class="button-outlined">Daftar</a></li>
                    <li><a href="login.php">Masuk</a></li>
                <?php endif; ?>
            </ul>
        </nav>
    </header>
    <main>
        <section class="head-text">
            <h1>Riwayat Lamaran</h1>
            <p>Semua lamaran yang pernah kamu kirimkan akan muncul di sini.</p>
        </section>

        <section class="saved-jobs">
            <?php if(count($jobApplications) !== 0): ?>
                <ul class="job-list">
                    <?php foreach ($jobApplications as $jobApplication): ?>
                    <li>
                        <img src="../../assets/img/<?= $jobApplication['logo'] ?>" alt="">
                        <h3><?= $jobApplication['title'] ?></h3>
                        <p>Ditawarkan oleh: <?= $jobApplication["company_name"] ?></p>
                        <p>Lokasi: <?= $jobApplication["location"] ?></p>
                        <p>Dikirim pada <?= convert($jobApplication['submitted_at']) ?></p>
                    </li>
                    <?php endforeach; ?>
                </ul>
            <?php else: ?>
                <p class="not-exist-jobs">Belum ada lowongan pekerjaan yang disimpan.</p>
            <?php endif; ?>
        </section>
    </main>
</body>

</html>