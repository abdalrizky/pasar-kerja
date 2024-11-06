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
                    <li><a href="profile.php"><i data-feather="user" class="icon"></i>Profil</a></li>
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
                    <input type="text" name="job-category" required>
                    <label for="job-description">Deskripsi Pekerjaan</label>
                    <textarea name="job-description" required></textarea>
                    <button type="submit">Buat Lowongan</button>
                </form>
            </section>
        </main>
    </div>
    <script>
    feather.replace();
    </script>
    <script src="../../js/dashboard.js"></script>
</body>
</html>