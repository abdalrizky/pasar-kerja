<?php

require '../../utils/database/helper.php';

session_start();

$bookmarks = fetch("SELECT jobs.id AS 'job_id', jobs.title, companies.logo, companies.name AS 'company_name', jobs.location
                        FROM bookmarks
                        JOIN job_seekers ON bookmarks.job_seeker_id = job_seekers.id
                        JOIN jobs ON bookmarks.job_id = jobs.id
                        JOIN companies ON jobs.company_id = companies.id");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bookmark Pekerjaan - Pasar Kerja</title>
    <link rel="stylesheet" href="../../styles/job-seeker/bookmark.css">
</head>
<body>
    <?php include "../../components/navbar.php" ?>      
    <main>
        <section class="head-text">
            <h1>Bookmark</h1>
            <p>Anda bisa menyimpan lowongan pekerjaan yang menarik di sini.</p>
        </section>
        
        <section class="saved-jobs">
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
        </section>
    </main>
</body>
</html>