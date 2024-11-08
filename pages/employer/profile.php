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

$employerId = $_SESSION['user']['id'];

$profileInfo = fetch("SELECT employers.name AS 'employer_name', employers.photo, companies.name AS 'company_name', employers.status
                        FROM employers 
                        JOIN companies ON employers.company_id = companies.id
                        WHERE employers.id='$employerId'")[0];

?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil Employer - Pasar Kerja</title>
    <script src="https://unpkg.com/feather-icons"></script>
    <link rel="stylesheet" href="../../styles/employer/profile.css">
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
                <h1>Informasi Profil</h1>
                <div class="user-actions">
                    <a href="../logout.php" class="user-action-logout">
                        <i data-feather="log-out" class="user-action-logout-logo"></i>
                        <p>Keluar</p>
                    </a>
                </div>
            </header>

            <div class="profile-details">
                <img class="profile-photo" src="https://placehold.co/100x100" alt="Muhammad Abdal Rizky">
                <p><?= $profileInfo['employer_name'] ?></p>
                <p>Terdaftar di:</p>
                <p><?= $profileInfo['company_name'] ?></p>
                <p>Status Verifikasi:</p>
                <p><?= ($profileInfo['status'] === "verified") ? "Terverifikasi" : "Belum Terverifikasi" ?></p>
            </div>
        </main>
    </div>
    <script>
    feather.replace();
    </script>
</body>

</html>