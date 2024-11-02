<?php
// Koneksi ke database
$conn = new mysqli('localhost', 'username', 'password', 'database_name');

if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Mengambil data dari form
$name = $_POST['name'];
$email = $_POST['email'];
$company = $_POST['company'];
$phone = $_POST['phone'];
$address = $_POST['address'];
$industry = $_POST['industry'];
$employees = $_POST['employees'];
$description = $_POST['description'];

// Query untuk update data
$sql = "UPDATE employers SET name='$name', email='$email', company='$company', phone='$phone', address='$address', industry='$industry', employees='$employees', description='$description' WHERE employer_id=1";

if ($conn->query($sql) === TRUE) {
    echo "Profil berhasil diperbarui";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Profil Employer</title>
    <link rel="stylesheet" href="profile.css">
</head>
<body>
    <div class="profile-container">
        <!-- Header -->
        <header class="header">
            <h1>Halaman Profil Employer</h1>
            <nav class="navigation">
                <ul>
                    <li><a href="dashboard.php">Dashboard</a></li>
                    <li><a href="job-list.php">Daftar Lowongan yang Dibuat</a></li>
                    <li><a href="account-settings.php">Pengaturan Akun</a></li>
                </ul>
            </nav>
        </header>

        <!-- Profile Information -->
        <section class="profile-info">
            <h2>Informasi Profil</h2>
            <div class="profile-details">
                <form action="update_profile.php" method="POST">
                    <label for="name">Nama:</label>
                    <input type="text" id="name" name="name" value="John Doe">

                    <label for="email">Email:</label>
                    <input type="email" id="email" name="email" value="johndoe@example.com">

                    <label for="company">Perusahaan:</label>
                    <input type="text" id="company" name="company" value="Impozitions Tech">

                    <label for="phone">Nomor Telepon:</label>
                    <input type="text" id="phone" name="phone" value="+62 812 3456 7890">

                    <label for="address">Alamat Perusahaan:</label>
                    <input type="text" id="address" name="address" value="Jl. Sudirman No. 123, Jakarta, Indonesia">

                    <label for="industry">Bidang Usaha:</label>
                    <input type="text" id="industry" name="industry" value="Teknologi Informasi">

                    <label for="employees">Jumlah Karyawan:</label>
                    <input type="text" id="employees" name="employees" value="50-100">

                    <label for="description">Deskripsi Perusahaan:</label>
                    <textarea id="description" name="description">Impozitions Tech adalah perusahaan yang bergerak di bidang teknologi informasi, menyediakan solusi perangkat lunak untuk meningkatkan efisiensi bisnis.</textarea>

                    <button type="submit">Simpan Perubahan</button>
                </form>

                <form action="delete_profile.php" method="POST">
                    <button type="submit" class="delete-profile-button">Hapus Profil</button>
                </form>
            </div>
        </section>

        <!-- Recent Activity Section -->
        <section class="recent-activity">
            <h2>Aktivitas Terbaru</h2>
            <ul>
                <li>Mengubah lowongan "Frontend Developer" pada 01 November 2024</li>
                <li>Menambah lowongan baru "Data Analyst" pada 28 Oktober 2024</li>
                <li>Melihat profil kandidat "Jane Smith" pada 25 Oktober 2024</li>
            </ul>
        </section>

        <!-- Company Ratings and Reviews Section -->
        <section class="company-reviews">
            <h2>Ulasan dan Penilaian Perusahaan</h2>
            <div class="reviews">
                <p><strong>Penilaian:</strong> 4.5/5</p>
                <p><strong>Ulasan Terbaru:</strong> "Perusahaan yang sangat peduli dengan pengembangan karir karyawan dan lingkungan kerja yang ramah."</p>
                <a href="#view-all-reviews" class="view-reviews-button">Lihat Semua Ulasan</a>
            </div>
        </section>
    </div>
</body>
</html>
