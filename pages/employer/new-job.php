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

$jobCategories = fetch("SELECT * FROM job_categories");

if (isset($_POST['submit'])) {
    $employerId = $_SESSION['user']['id'];
    $jobTitle = htmlspecialchars(ucwords($_POST['job-position-wanted']));
    $jobLocation = ucwords($_POST['job-location']);
    $jobCategory = $_POST['job-category'];
    $jobDescription = htmlspecialchars(ucfirst($_POST['job-description']));
    $postedAt = time();

    $sql = execDML("INSERT INTO jobs VALUES (null, $employerId, $jobCategory, $postedAt, '$jobTitle', '$jobLocation', '$jobDescription', 'open')");

    if ($sql > 0) {
        echo "<script>alert('berhasil!'); document.location.href='dashboard.php'</script>";
    } else {
        echo "<script>alert('gagal!'); document.location.href='dashboard.php'</script>";
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Lowongan Baru - Pasar Kerja</title>
    <script src="https://unpkg.com/feather-icons"></script>
    <link rel="stylesheet" href="../../styles/employer/new-job.css">
</head>

<body>
    <div class="container">
        <aside class="sidebar">
            <h1 class="logo">Pasar<span>Kerja</span></h1>
            <nav>
                <ul>
                    <li><a href="dashboard.php"><i data-feather="bar-chart" class="icon"></i>Dasbor</a></li>
                    <li><a href="setting.php"><i data-feather="settings" class="icon"></i>Pengaturan Akun</a></li>
                </ul>
            </nav>
        </aside>
        <main class="main-content">
            <header class="header">
                <h1>Tambah Lowongan Kerja Baru</h1>
                <div class="user-actions">
                    <a href="../logout.php" class="user-action-logout">
                        <i data-feather="log-out" class="user-action-logout-logo"></i>
                        <p>Keluar</p>
                    </a>
                </div>
            </header>

            <section>
                <form action="" method="post">
                    <label for="job-position-wanted">Posisi Dicari</label>
                    <input type="text" name="job-position-wanted" required>
                    <label for="job-location">Lokasi Pekerjaan</label>
                    <input type="text" name="job-location" required>
                    <label for="job-category">Kategori Pekerjaan</label>
                    <select name="job-category">
                        <option disabled selected>Pilih Kategori</option>
                        <?php foreach ($jobCategories as $jobCategory): ?>
                            <option value="<?= $jobCategory['id'] ?>"><?= $jobCategory['name'] ?></option>
                        <?php endforeach; ?>
                    </select>
                    <label for="job-description">Deskripsi Pekerjaan</label>
                    <textarea name="job-description" required></textarea>
                    <button type="submit" name="submit">Buat Lowongan</button>
                </form>
            </section>
        </main>
    </div>
    <script>
    feather.replace();
    </script>
</body>

</html>