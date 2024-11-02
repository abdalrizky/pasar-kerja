<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employer Dashboard</title>
    <link rel="stylesheet" href="dashboard.css">
    <link rel="stylesheet" href="profile.css">
    <link rel="stylesheet" href="job-list.css">
    <link rel="stylesheet" href="account-settings.css">
</head>
<body>
    <div class="dashboard-container">
        <!-- Sidebar -->
        <aside class="sidebar">
            <h1 class="logo">Pasar Kerja</h1>
            <nav>
                <ul>
                    <li><a href="#dashboard"><span class="icon-dashboard"></span> Dashboard</a></li>
                    <li><a href="#profile"><span class="icon-profile"></span> Halaman Profil</a></li>
                    <li><a href="#job-list"><span class="icon-jobs"></span> Daftar Lowongan yang Dibuat</a></li>
                    <li><a href="#account-settings"><span class="icon-settings"></span> Pengaturan Akun</a></li>
                </ul>
            </nav>
            <div class="support">
                <button>Support 24/7 <span>Start chat</span></button>
            </div>
        </aside>

        <!-- Main Content -->
        <main class="main-content">
            <!-- Header -->
            <header class="header">
                <h1>Dashboard</h1>
                <div class="user-actions">
                    <span>🔍</span>
                    <span>📧</span>
                    <span>👤</span>
                </div>
            </header>

            <!-- Profile Widget -->
            <section class="profile-widget">
                <h2>Hello, Employer!</h2>
                <p>You have several open positions. Let's manage them effectively today!</p>
                <a href="#job-list">Review your positions!</a>
            </section>

            <!-- Profile Page -->
            <section id="profile" class="profile-page">
                <h2>Halaman Profil</h2>
                <div class="profile-info">
                    <p><strong>Nama:</strong> John Doe</p>
                    <p><strong>Email:</strong> johndoe@example.com</p>
                    <p><strong>Perusahaan:</strong> Impozitions Tech</p>
                    <p><strong>Nomor Telepon:</strong> +62 812 3456 7890</p>
                    <a href="#edit-profile">Edit Profil</a>
                </div>
            </section>

            <!-- Job List Section -->
            <section id="job-list" class="job-list">
                <h2>Daftar Lowongan yang Dibuat</h2>
                <div class="job-cards">
                    <div class="job-card">
                        <h3>Frontend Developer</h3>
                        <p>Status: Open</p>
                        <a href="#job-details-frontend">View Details</a>
                    </div>
                    <div class="job-card">
                        <h3>Backend Developer</h3>
                        <p>Status: In Progress</p>
                        <a href="#job-details-backend">View Details</a>
                    </div>
                </div>
            </section>

            <!-- Account Settings -->
            <section id="account-settings" class="account-settings">
                <h2>Pengaturan Akun</h2>
                <p>Manage your account settings, change password, and more.</p>
                <div class="account-options">
                    <p><strong>Email:</strong> johndoe@example.com</p>
                    <p><strong>Password:</strong> ********</p>
                    <a href="#change-password">Change Password</a>
                    <a href="#edit-account">Edit Account Details</a>
                </div>
            </section>
        </main>
    </div>
    <script src="dashboard.js"></script>
</body>
</html>
