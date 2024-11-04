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
            <h1 class="logo">Pasar Kerja</h1>
            <nav>
                <ul>
                    <li><a href="dashboard.php"><i data-feather="bar-chart" class="icon"></i>Dasbor</a></li>
                    <li><a href="profile.php"><i data-feather="user" class="icon"></i>Profil</a></li>
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
                <div class="employer-profile">
                    <img src="https://placehold.co/100x100" alt="">
                    <label for="myfile">Pilih gambar baru:</label>
                    <input type="file">
                </div>
                <div class="change-password-form">
                    <h2>Ubah Kata Sandi</h2>
                    <form action="" method="post">
                        <label for="current-password">Kata Sandi Saat Ini</label>
                        <input type="text" name="current-password" class="change-password-form-input">
                        <label for="new-password">Kata Sandi Baru</label>
                        <input type="text" name="new-password" class="change-password-form-input">
                        <label for="confirm-new-password">Konfirmasi Kata Sandi Baru</label>
                        <input type="text" name="confirm-new-password" class="change-password-form-input">
                        <button type="submit">Ubah Kata Sandi</button>
                    </form>
                    
                </div>


            </div>
    </div>
    <script>
    feather.replace();
    </script>
    <script src="../../js/dashboard.js"></script>
</body>

</html>