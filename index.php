<?php
session_start();
if (!isset($_SESSION['loggedin'])) {
    $role = null;
} else {
    $role = $_SESSION['role'];
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pasar Kerja - Temukan Pekerjaan Impian Anda</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="index.css">
</head>
<body>

<header>
    <h1><span style="color: white;">Pasar</span><span style="color: orange; font-style: italic;">Kerja</span></h1>
    <nav>
        <ul>
            <li><a href="index.php">Beranda</a></li>
            <li><a href="tips_loker.php">Tips Loker</a></li>
            <?php if ($role == 'job_seeker') : ?>
                <li><a href="job_seeker_dashboard.php">Job Seeker Dashboard</a></li>
            <?php elseif ($role == 'employee') : ?>
                <li><a href="employee_dashboard.php">Employee Dashboard</a></li>
            <?php elseif ($role == 'moderator') : ?>
                <li><a href="moderator_dashboard.php">Moderator Dashboard</a></li>
            <?php endif; ?>
            <?php if (!$role) : ?>
                <li><a href="login.php" class="bordered">Login</a></li>
                <li><a href="register.php" class="bordered">Register</a></li>
            <?php else : ?>
                <li><a href="logout.php">Logout</a></li>
            <?php endif; ?>
        </ul>
    </nav>
</header>

<main>
    <section class="search-jobs">
        <h2>Cari Lowongan Pekerjaan</h2>
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
    </section>

    <section class="trusted-logos">
    <h2>Telah Dipercaya Oleh</h2>
    <div class="company-logos">
        <img src="kominfo-logo.jpg" alt="PT Kominfo">
        <img src="microsoft-logo.jpg" alt="Microsoft">
        <img src="aws-logo.jpg" alt="aws">
        <img src="google-logo.jpg" alt="Google">
    </div>
</section>


    <section class="job-categories">
    <h2>Kategori Pekerjaan</h2>
    <div class="categories">
        <div class="category">
            <span>IT & Software</span>
            <img src="it.jpg" alt="IT & Software" class="popup-image">
        </div>
        <div class="category">
            <span>Desain</span>
            <img src="design.jpg" alt="Desain" class="popup-image">
        </div>
        <div class="category">
            <span>Marketing</span>
            <img src="marketing.jpg" alt="Marketing" class="popup-image">
        </div>
    </div>
</section>


    <section class="latest-jobs">
        <h2>Lowongan Terbaru</h2>
        <ul class="job-list">
            <li>
                <h3>Web Developer</h3>
                <p>Perusahaan: ABC Corp</p>
                <p>Lokasi: Jakarta</p>
                <a href='job_detail.php?id=1'>Detail</a>
            </li>
            <li>
                <h3>Graphic Designer</h3>
                <p>Perusahaan: XYZ Studio</p>
                <p>Lokasi: Bandung</p>
                <a href='job_detail.php?id=2'>Detail</a>
            </li>
            <li>
                <h3>Marketing Specialist</h3>
                <p>Perusahaan: LMN Group</p>
                <p>Lokasi: Surabaya</p>
                <a href='job_detail.php?id=3'>Detail</a>
            </li>
            <li>
                <h3>Data Analyst</h3>
                <p>Perusahaan: OPQ Inc.</p>
                <p>Lokasi: Samarinda</p>
                <a href='job_detail.php?id=4'>Detail</a>
            </li>
        </ul>
    </section>
</main>

<footer>
    <p>&copy; <?php echo date("Y"); ?> Pasar Kerja. Semua hak cipta dilindungi.</p>
</footer>

</body>
</html>
