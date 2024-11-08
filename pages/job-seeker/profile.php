<?php

require '../../utils/database/helper.php';

session_start();

$jobSeekerId = $_SESSION['user']['id'];

$jobSeeker = fetch("SELECT * FROM job_seekers WHERE id=$jobSeekerId")[0];

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../../styles/job-seeker/profile.css">
</head>

<body>
    <?php include "../../components/navbar.php" ?>
    <main>
        <section class="head-text">
            <h1>Profil</h1>
            <p>Halaman ini berisi tentang informasi diri Anda. Sesuaikan dengan kondisi saat ini.</p>
        </section>

        <section class="profile-information">
            <div class="profile-picture">
                <img src="../../assets/img/pp.jpg" alt="">
                <p>Anda belum memiliki foto. Untuk dapat melamar pekerjaan, Anda harus melampirkan foto terbaru.</p>
            </div>
            
            <label for="job-seeker-name">Nama Lengkap</label>
            <input type="text" name="job-seeker-name"
                value="<?= ($jobSeeker['name'] !== null) ? $jobSeeker['name'] : 'Belum Diisi' ?>" disabled>
            <label for="job-seeker-gender">Jenis Kelamin</label>
            <input type="text" name="job-seeker-gender"
                value="<?= ($jobSeeker['gender'] !== null) ? $jobSeeker['gender'] : 'Belum Diisi' ?>" disabled>
            <div class="birthday-detail-input">
                <div>
                    <label for="job-seeker-place-of-birth">Tempat Lahir</label>
                    <input type="text" name="job-seeker-place-of-birth"
                        value="<?= ($jobSeeker['place_of_birth'] !== null) ? $jobSeeker['place_of_birth'] : 'Belum Diisi' ?>"
                        disabled>
                </div>
                <div>
                    <label for="job-seeker-birthday">Tanggal Lahir</label>
                    <input type="date" name="job-seeker-birthday"
                        value="<?= ($jobSeeker['date_of_birth'] !== null) ? $jobSeeker['date_of_birth'] : 'Belum Diisi' ?>"
                        disabled>
                </div>
            </div>
            <label for="job-seeker-passion">Kesukaan</label>
            <input type="text" name="job-seeker-passion"
                value="<?= ($jobSeeker['passion'] !== null) ? $jobSeeker['passion'] : 'Belum Diisi' ?>" disabled>
            <label for="job-seeker-biography">Biography</label>
            <textarea name="job-seeker-biography"
                disabled><?= ($jobSeeker['biography'] !== null) ? $jobSeeker['biography'] : 'Belum Diisi' ?></textarea>
            <a href="#" class="renew-profile-button">Perbarui Profil</a>
        </section>
    </main>
</body>

</html>