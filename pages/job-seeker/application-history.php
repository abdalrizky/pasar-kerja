<?php

require '../../utils/database/helper.php';

session_start();

$jobApplications = fetch("SELECT * FROM job_applications");
var_dump($jobApplications);

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
            <?php if(count($bookmarks) !== 0): ?>
                <ul class="job-list">
                    <?php foreach ($bookmarks as $bookmark): ?>
                    <li>
                        <img src="../../assets/img/<?= $bookmark['logo'] ?>" alt="">
                        <h3><?= $bookmark['title'] ?></h3>
                        <p>Ditawarkan oleh: <?= $bookmark["company_name"] ?></p>
                        <p>Lokasi: <?= $bookmark["location"] ?></p>
                        <a href='../job-detail.php?id=<?= $bookmark["job_id"] ?>'>Detail</a>
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