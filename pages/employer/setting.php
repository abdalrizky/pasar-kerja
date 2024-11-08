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

$employerEmail = $_SESSION['user']['email'];

if (isset($_POST['change-password'])) {
    $currentPassword = $_POST['current-password'];
    $newPassword = $_POST['new-password'];
    $newPasswordHashed = password_hash($newPassword, PASSWORD_DEFAULT);

    $currentPasswordInDatabase = fetch("SELECT * FROM credentials WHERE email='$employerEmail'")[0]["password"];

    if (password_verify($currentPassword, $currentPasswordInDatabase)) {
        $sql = execDML("UPDATE credentials SET password='$newPasswordHashed' WHERE email='$employerEmail'");
        if ($sql > 0) {
            echo "<script>alert('Kata sandi berhasil diubah!'); document.location.href='setting.php'</script>";
        } else {
            echo "<script>alert('Kata sandi gagal diubah!'); document.location.href='setting.php'</script>";
        }
    } else {
        echo "<script>alert('Kata sandi saat ini salah!'); document.location.href='setting.php'</script>";
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pengaturan Akun Employer - Pasar Kerja</title>
    <script src="https://unpkg.com/feather-icons"></script>
    <link rel="stylesheet" href="../../styles/employer/setting.css">
</head>

<body>
    <div class="container">
        <aside class="sidebar">
            <h1 class="logo">Pasar<span>Kerja</span></h1>
            <nav>
                <ul>
                    <li><a href="dashboard.php"><i data-feather="bar-chart" class="icon"></i>Dasbor</a></li>
                    <li><a href="setting.php" class="sidebar-on"><i data-feather="settings" class="icon"></i>Pengaturan
                            Akun</a></li>
                </ul>
            </nav>
        </aside>
        <main class="main-content">
            <header class="header">
                <h1>Pengaturan Akun</h1>
                <div class="user-actions">
                    <a href="../logout.php" class="user-action-logout">
                        <i data-feather="log-out" class="user-action-logout-logo"></i>
                        <p>Keluar</p>
                    </a>
                </div>
            </header>

            <div class="employer-settings">
                <div class="change-password-form">
                    <h2>Ubah Kata Sandi</h2>
                    <form action="" method="post">
                        <label for="current-password">Kata Sandi Saat Ini</label>
                        <input type="password" name="current-password" class="change-password-form-input">
                        <label for="new-password">Kata Sandi Baru</label>
                        <input type="password" name="new-password" class="change-password-form-input" id="new-password">
                        <label for="confirm-new-password">Konfirmasi Kata Sandi Baru</label>
                        <input type="password" name="confirm-new-password" class="change-password-form-input" id="confirm-new-password">
                        <button type="submit" name="change-password">Ubah Kata Sandi</button>
                    </form>
                    
                </div>


            </div>
    </div>
    <script>
    feather.replace();
    </script>
    <script src="../../js/employer/setting.js"></script>
</body>

</html>