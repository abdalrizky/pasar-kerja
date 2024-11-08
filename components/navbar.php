<style>
<?php include "navbar.css"?>
</style>
<header>
    <a href="../pages/index.php">
        <h1><span style="color: white;">Pasar</span><span style="color: orange; font-style: italic;">Kerja</span></h1>
    </a>
    <nav>
        <ul>
            <li><a href="index.php">Beranda</a></li>
            <li><a href="tips_loker.php">Tips Loker</a></li>
            <li><a href="job_seeker_dashboard.php">Hai, <?= $_SESSION['user']['name'] ?></a></li>
        </ul>
    </nav>
</header>