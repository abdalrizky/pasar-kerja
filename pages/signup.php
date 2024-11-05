<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar - Pasar Kerja</title>
    <link rel="stylesheet" href="../styles/signup.css">
</head>

<body>
    <div class="container">
        <aside>
            <img src="https://placehold.co/100x100" alt="">
        </aside>
        <main>
            <p class="logo">Pasar<span>Kerja</span></p>
            <div class="signup-as">
                <p>Daftar Sebagai:</p>
                <div>
                    <span id="signup-as-job-seeker-button" class="signup-as-selected">Job Seeker</span>
                    <span id="signup-as-employer-button">Employer</span>
                </div>
            </div>
            <!-- Job Seeker Form -->
            <form action="" method="post">
                <input type="hidden" value="job-seeker" id="signup-as" name="signup-as">
                <label for="job-seeker-name">Nama Lengkap</label>
                <input type="text" name="job-seeker-name">
                <label for="job-seeker-email">Surel</label>
                <input type="email" name="job-seeker-email">
                <label for="job-seeker-password">Kata Sandi</label>
                <input type="password" name="job-seeker-password">
                <label for="job-seeker-password-confirm">Konfirmasi Kata Sandi</label>
                <input type="password" name="job-seeker-password-confirm">
                <div class="error-message-box">
                    <p class="error-message-text">Surel telah digunakan!</p>
                </div>
                <button type="submit">Daftar</button>
            </form>
            <!-- Employer Form -->
            <!-- <form action="" method="post" class="hidden">
                <label for="employer-name">Nama Lengkap</label>
                <input type="text" >
            </form> -->
            <p class="already-have-account">Sudah punya akun? <a href="login.php">Masuk</a></p>
        </main>
    </div>
    <script src="../js/signup.js"></script>
</body>

</html>