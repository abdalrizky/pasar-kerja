<?php

session_start();

if (isset($_SESSION['login'])) {
    if ($_SESSION['user']['role_id'] != 1) {
        header('Location: employer/dashboard.php');
    }
} else {
    header('Location: login.php');
}

require '../utils/database/helper.php';

$jobs = fetch("SELECT jobs.id, companies.logo AS 'company_logo', jobs.title, companies.name AS 'company_name', jobs.location
                FROM jobs
                JOIN employers ON jobs.employer_id = employers.id
                JOIN companies ON employers.company_id = companies.id
                JOIN job_categories ON jobs.category_id = job_categories.id
                LIMIT 4");

$jobCategories = fetch("SELECT * FROM job_categories");

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pasar Kerja - Temukan Pekerjaan Impian Anda</title>
    <link rel="stylesheet" href="../styles/index.css">
</head>

<body>
    <header>
        <a href="../pages/index.php">
            <h1><span style="color: white;">Pasar</span><span style="color: orange; font-style: italic;">Kerja</span>
            </h1>
        </a>
        <nav>
            <ul>
                <?php if (isset($_SESSION['login'])): ?>
                <li><a href="job-seeker/bookmark.php">Bookmark</a></li>
                <li><a href="job-seeker/application-history.php">Riwayat Lamaran</a></li>
                <li><a href="job-seeker/profile.php">Profil</a></li>
                <li><a href="logout.php">Hai, <?= $_SESSION['user']['name'] ?></a></li>
                <?php else: ?>
                <li><a href="signup.php" class="button-outlined">Daftar</a></li>
                <li><a href="login.php">Masuk</a></li>
                <?php endif; ?>
            </ul>
        </nav>
    </header>

    <main>
        <section class="search-jobs">
            <div class="search-jobs-element">
                <h2>Pasar<span style="color: orange; font-style: italic;">Kerja</span> - Temukan Pekerjaan Anda</h2>
                <div class="search-jobs-form">
                    <form action="search_results.php" method="GET">
                        <input type="text" name="query" placeholder="Cari..." required>
                        <button type="submit">Cari</button>
                    </form>
                </div>
            </div>
        </section>

        <section class="trusted-logos">
            <h2>Telah Dipercaya Oleh</h2>
            <div class="company-logos">
                <div class="company-logo-img">
                    <img src="../assets/img/kominfo-logo.jpg" alt="PT Kominfo">
                </div>
                <div class="company-logo-img">
                    <img src="../assets/img/microsoft-logo.jpg" alt="Microsoft">
                </div>
                <div class="company-logo-img">
                    <img src="../assets/img/aws-logo.jpg" alt="aws">
                </div>
                <div class="company-logo-img">
                    <img src="../assets/img/google-logo.jpg" alt="Google">
                </div>
                <div class="company-logo-img">
                    <img src="../assets/img/gojek-logo.png" alt="Google">
                </div>
                <div class="company-logo-img">
                    <img src="../assets/img/adaro-logo.jpg" alt="Google">
                </div>
                <div class="company-logo-img">
                    <img src="../assets/img/kimia-farma-logo.png" alt="Google">
                </div>
            </div>
        </section>


        <section class="job-categories">
            <h2>Kategori Pekerjaan</h2>
            <div class="categories">
                <?php foreach ($jobCategories as $jobCategory): ?>
                <div class="category">
                    <span><?=$jobCategory['name']?></span>
                </div>
                <?php endforeach; ?>
            </div>
        </section>


        <section class="latest-jobs">
            <h2>Lowongan Terbaru</h2>
            <?php if (count($jobs) !== 0): ?>
            <ul class="job-list">
                <?php foreach ($jobs as $job): ?>
                <li>
                    <img src="../assets/img/<?= $job["company_logo"] ?>" alt="">
                    <h3><?= $job['title'] ?></h3>
                    <p>Ditawarkan oleh: <?= $job["company_name"] ?></p>
                    <p>Lokasi: <?= $job["location"] ?></p>
                    <a href='job-detail.php?id=<?= $job["id"] ?>'>Detail</a>
                </li>
                <?php endforeach; ?>
            </ul>
            <?php else: ?>
            <p class="not-exist-jobs">Belum ada postingan lowongan pekerjaan.</p>
            <?php endif; ?>
        </section>
    </main>

    <?php include "../components/footer.php" ?>

</body>

</html>