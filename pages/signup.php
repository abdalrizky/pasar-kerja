<?php

require "../utils/database/helper.php";

$name = null;
$email = null;

$errorState = [
    "status" => false,
    "message" => null
];

if (isset($_POST['signup'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $roleId = $_POST['signup-as'];
    $passwordHashed = password_hash($password, PASSWORD_DEFAULT);

    $checkEmail = fetch("SELECT email FROM credentials WHERE email='$email'");
    if (count($checkEmail) === 0) {
        $sql = execDML("INSERT INTO credentials VALUES (null, $roleId, '$email', '$passwordHashed')");
        if ($sql > 0) {
            $errorState = [
                "status" => false,
                "message" => "Pendaftaran berhasil. Silakan masuk."
            ];
            $name = null;
            $email = null;
        } else {
            $errorState = [
                "status" => true,
                "message" => "Ada kesalahan pada sistem kami. Silakan ulangi."
            ];
        }
    } else {
        $errorState = [
            "status" => true,
            "message" => "Surel telah digunakan"
        ];
    }
    
}

?>

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
            <form action="" method="post" id="signup-form">
                <input type="hidden" value="1" id="signup-as" name="signup-as">
                <label for="name">Nama Lengkap</label>
                <input type="text" name="name" value="<?= $name ?>" required>
                <label for="email">Surel</label>
                <input type="email" name="email" value="<?= $email ?>" required>
                <label for="password">Kata Sandi</label>
                <input type="password" name="password" id="password" required>
                <label for="password-confirm">Konfirmasi Kata Sandi</label>
                <input type="password" name="password-confirm" id="password-confirm" required>
                <?php if (isset($_POST['signup']) && $errorState['status']): ?>
                    <div class="error-message-box">
                        <p class="error-message-text"><?= $errorState['message'] ?></p>
                    </div>
                <?php elseif (isset($_POST['signup']) && !$errorState['status']): ?>
                    <div class="success-message-box">
                        <p class="success-message-text"><?= $errorState['message'] ?></p>
                    </div>
                <?php endif; ?>
                <button type="submit" name="signup">Daftar</button>
            </form>
            <p class="already-have-account">Sudah punya akun? <a href="login.php">Masuk</a></p>
        </main>
    </div>
    <script src="../js/signup.js"></script>
</body>

</html>