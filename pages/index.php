<?php

require '../utils/database/helper.php';

session_start();

$jobs = fetch("SELECT jobs.id, companies.logo AS 'company_logo', jobs.title, companies.name AS 'company_name', jobs.location
                FROM jobs
                JOIN companies ON jobs.company_id = companies.id
                JOIN employers ON jobs.employer_id = employers.id
                JOIN job_categories ON jobs.category_id = job_categories.id
                LIMIT 4");

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
            <h1><span style="color: white;">Pasar</span><span style="color: orange; font-style: italic;">Kerja</span></h1>
        </a>
        <nav>
            <ul>
                <li><a href="index.php">Beranda</a></li>
                <li><a href="job-seeker/bookmark.php">Bookmark</a></li>
                <li><a href="job_seeker_dashboard.php">Hai, <?= $_SESSION['user']['name'] ?></a></li>
            </ul>
        </nav>
    </header>

    <main>
        <section class="search-jobs">
            <div class="search-jobs-element">
                <h2>Cari Lowongan Pekerjaan</h2>
                <div class="search-jobs-form">
                    <form action="search_results.php" method="GET">
                        <input type="text" name="query" placeholder="Cari berdasarkan posisi atau perusahaan" required>
                        <select name="location">
                            <option value="">Pilih Lokasi</option>
                            <option value="jakarta">Jakarta</option>
                            <option value="bandung">Bandung</option>
                            <option value="surabaya">Surabaya</option>
                            <option value="samarinda">Samarinda</option>
                        </select>
                        <select name="category">
                            <option value="">Pilih Kategori</option>
                            <option value="it">IT & Software</option>
                            <option value="design">Desain</option>
                            <option value="marketing">Marketing</option>
                        </select>
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
            </div>
        </section>


        <section class="job-categories">
            <h2>Kategori Pekerjaan</h2>
            <div class="categories">
                <div class="category">
                    <span>IT & Software</span>
                    <img src="../assets/img/it.jpg" alt="IT & Software" class="popup-image">
                </div>
                <div class="category">
                    <span>Desain</span>
                    <img src="../assets/img/design.jpg" alt="Desain" class="popup-image">
                </div>
                <div class="category">
                    <span>Marketing</span>
                    <img src="../assets/img/marketing.jpg" alt="Marketing" class="popup-image">
                </div>
            </div>
        </section>


        <section class="latest-jobs">
            <h2>Lowongan Terbaru</h2>
            <ul class="job-list">
                <?php foreach ($jobs as $job): ?>
                    <li>
                        <img src="../assets/img/logo-adaro.jpg" alt="">
                        <h3><?= $job['title'] ?></h3>
                        <p>Ditawarkan oleh: <?= $job["company_name"] ?></p>
                        <p>Lokasi: <?= $job["location"] ?></p>
                        <a href='job-detail.php?id=<?= $job["id"] ?>'>Detail</a>
                    </li>
                <?php endforeach; ?>
            </ul>
        </section>
    </main>

    <?php include "../components/footer.php" ?>

</body>

</html>