<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../../styles/job-seeker/apply.css">
</head>

<body>
    <?php include "../../components/navbar.php" ?>
    <main>
        <section>
            <p class="job-apply-title">Lamar Pekerjaan</p>
            <p class="job-apply-subtitle">Data-data berikut ini akan dikirimkan kepada PT Adaro Energy. Silakan isi data
                Anda jika masih kosong.</p>
            <table class="job-receiver">
                <tr>
                    <td><p>Melamar Kepada:</p></td>
                    <td><p>Untuk Posisi:</p></td>
                </tr>
                <tr>
                    <td>
                        <img src="../../assets/img/logo-adaro.jpg" alt="">
                        <p>PT Adaro Energy</p>
                    </td>
                    <td>
                        
                        <p>Consultan Analyst</p>
                    </td>
                </tr>
            </table>
            <form action="" method="post" class="apply-forms">
                <label for="job-seeker-photo">Pilih Gambar</label>
                <input type="file" name="job-seeker-photo">
                <p>*Jika Anda tidak memasukkan gambar, maka foto di profil Anda yang akan dikirimkan.</p>
                <label for="job-seeker-name">Nama Lengkap</label>
                <input type="text" name="job-seeker-name" required>
                <div class="birthday-detail-input">
                    <div>
                        <label for="job-seeker-place-of-birth">Tempat Lahir</label>
                        <input type="text" name="job-seeker-place-of-birth" required>
                    </div>
                    <div>
                        <label for="job-seeker-birthday">Tanggal Lahir</label>
                        <input type="date" name="job-seeker-birthday" required>
                    </div>
                </div>
                <button type="submit" name="submit">Kirim Lamaran</button>
            </form>
        </section>
    </main>
</body>

</html>