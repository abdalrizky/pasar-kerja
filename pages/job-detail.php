<?php

require '../utils/database/helper.php';

session_start();

$jobId = $_GET['id'];

$job = fetch("SELECT jobs.id, jobs.title, jobs.description, companies.logo, companies.name AS 'company_name', jobs.location, job_categories.name AS 'category'
                FROM jobs
                JOIN companies ON jobs.company_id = companies.id
                JOIN job_categories ON jobs.category_id = job_categories.id
                WHERE jobs.id=$jobId");
$bookmark = fetch("SELECT * FROM bookmarks
                    JOIN job_seekers ON bookmarks.job_seeker_id = job_seekers.id
                    JOIN jobs ON bookmarks.job_id = jobs.id
                    WHERE job_id=$jobId");

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
    <title>Detail Lowongan Pekerjaan - Pasar Kerja</title>
    <script src="https://unpkg.com/feather-icons"></script>
    <link rel="stylesheet" href="../styles/job-detail.css">
</head>
<body>
    <?php include "../components/navbar.php" ?>

    <main>
        <section class="job-common-info">
            <img src="../assets/img/logo-adaro.jpg" alt="">
            <p class="job-position"><?= $job['title'] ?></p>
            <p class="job-company"><?= $job['company_name'] ?></p>
            <div class="job-location">
                <i data-feather="map-pin"></i>
                <p><?= $job['location'] ?></p>
            </div>
            <div class="job-location">
                <i data-feather="tag"></i>
                <p><?= $job['category'] ?></p>
            </div>
            <a href="../pages/job-seeker/apply.php?id=" class="button-apply">Lamar Pekerjaan Ini</a>
            <?php if (count($bookmark) === 0): ?>
                <a href="job-seeker/add-to-bookmark.php?id=<?= $jobId ?>" class="button-apply">
                    <span>
                        <i data-feather="bookmark"></i>
                        <span>Simpan di Bookmark</span>
                    </span>
                </a>
            <?php else: ?>
                <a href="job-seeker/delete-from-bookmark.php?id=<?= $jobId ?>" class="button-apply">
                <span>
                    <i data-feather="bookmark"></i>
                    <span>Hapus dari Bookmark</span>
                </span>
            </a>
            <?php endif; ?>
        </section>
        <section class="job-description">
            <p class="job-description-title">Deskripsi Pekerjaan</p>
            <p class="job-description-detail">
                <?= $job['description'] ?>
            </p>
        </section>
    </main>
    <?php include "../components/footer.php" ?>
    <script>
      feather.replace();
    </script>
</body>
</html>