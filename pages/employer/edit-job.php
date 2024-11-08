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

if (!isset($_GET['id'])) {
    echo "ID harus dilampirkan";
    exit;
}

$jobId = $_GET['id'];

$job = fetch("SELECT jobs.title, jobs.location, job_categories.id as 'category_id', job_categories.name as 'category_name' , jobs.description
                FROM jobs
                JOIN job_categories ON jobs.category_id = job_categories.id
                WHERE jobs.id = $jobId");
$jobCategories = fetch("SELECT * FROM job_categories");

if (count($job) !== 0) {
    $job = $job[0];
} else {
    echo "ID tidak ditemukan";
    exit;
}

if (isset($_POST["edit"])) {

    $newTitle = htmlspecialchars(ucwords($_POST['job-position-wanted']));
    $newLocation = ucwords($_POST['job-location']);
    $newCategory = $_POST['job-category'];
    $newDescription = htmlspecialchars(ucfirst($_POST['job-description']));

    $sql = execDML("UPDATE jobs SET title='$newTitle', category_id=$newCategory, location='$newLocation', description='$newDescription', status='open' WHERE id=$jobId");

    if ($sql > 0) {
        echo "<script>alert('Perubahan berhasil dilakukan!'); document.location.href='dashboard.php'</script>";
    } else {
        echo "<script>alert('Perubahan gagal dilakukan!'); document.location.href='dashboard.php'</script>";
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
                <h1>Edit Lowongan Kerja</h1>
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
                    <input type="text" name="job-position-wanted" value="<?= $job['title'] ?>" required>
                    <label for="job-location">Lokasi Pekerjaan</label>
                    <input type="text" name="job-location" value="<?= $job['location'] ?>" required>
                    <label for="job-category">Kategori Pekerjaan</label>
                    <select name="job-category">
                        <option disabled>Pilih Kategori</option>
                        <?php foreach ($jobCategories as $jobCategory): ?>
                            <option value="<?= $jobCategory['id'] ?>" <?= ($jobCategory['id'] == $job['category_id']) ? "selected" : "" ?>><?= $jobCategory['name'] ?></option>
                        <?php endforeach; ?>
                    </select>
                    <label for="job-description">Deskripsi Pekerjaan</label>
                    <textarea name="job-description" required><?= $job['description'] ?></textarea>
                    <button type="submit" name="edit">Simpan Perubahan</button>
                </form>
            </section>
        </main>
    </div>
    <script>
    feather.replace();
    </script>
</body>

</html>