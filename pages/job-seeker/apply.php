<?php

session_start();

require '../../utils/database/helper.php';

// var_dump($_SESSION);
$jobSeekerId = $_SESSION['user']['id'];

$jobId = $_GET['id'];
$job = fetch("SELECT companies.logo, jobs.title, companies.name as 'company_name' FROM jobs
                JOIN employers ON jobs.employer_id = employers.id
                JOIN companies ON employers.company_id = companies.id
                WHERE jobs.id=$jobId")[0];
$jobSeeker = fetch("SELECT * FROM job_seekers WHERE id=$jobSeekerId");

?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../../styles/job-seeker/apply.css">
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
                <li><a href="../logout.php">Hai, <?= $_SESSION['user']['name'] ?></a></li>
                <?php else: ?>
                <li><a href="signup.php" class="button-outlined">Daftar</a></li>
                <li><a href="login.php">Masuk</a></li>
                <?php endif; ?>
            </ul>
        </nav>
    </header>
    <main>
        <section>
            <p class="job-apply-title">Lamar Pekerjaan</p>
            <p class="job-apply-subtitle">Data-data berikut ini akan dikirimkan kepada <?= $job['title'] ?>. Silakan isi
                data
                Anda jika masih kosong.</p>
            <table class="job-receiver">
                <tr>
                    <td>
                        <p>Melamar Kepada:</p>
                    </td>
                    <td>
                        <p>Untuk Posisi:</p>
                    </td>
                </tr>
                <tr>
                    <td>
                        <img src="../../assets/img/<?= $job['logo'] ?>" alt="">
                        <p><?= $job['company_name'] ?></p>
                    </td>
                    <td>

                        <p><?= $job['title'] ?></p>
                    </td>
                </tr>
            </table>
            <form action="" method="post" class="apply-forms">
                <label for="job-seeker-photo">Pilih Gambar</label>
                <input type="file" name="job-seeker-photo">
                <p>*Jika Anda tidak memasukkan gambar, maka foto di profil Anda yang akan dikirimkan.</p>
                <label for="job-seeker-name">Nama Lengkap</label>
                <input type="text" name="job-seeker-name" required>
                <div class="birthday-detail-input">
                    <div>
                        <label for="job-seeker-place-of-birth">Tempat Lahir</label>
                        <input type="text" name="job-seeker-place-of-birth" required>
                    </div>
                    <div>
                        <label for="job-seeker-birthday">Tanggal Lahir</label>
                        <input type="date" name="job-seeker-birthday" required>
                    </div>
                </div>
                <label for="gender">Jenis Kelamin</label>
                <input type="text" name="gender" required>
                <label for="passion">Passion</label>
                <input type="text" name="passion" required>
                <label for="biography">Biografi</label>
                <textarea name="biography" id="biography"></textarea>
                <button type="submit" name="submit">Kirim Lamaran</button>
            </form>
        </section>
    </main>
    <?php include '../../components/footer.php' ?>
</body>

</html>