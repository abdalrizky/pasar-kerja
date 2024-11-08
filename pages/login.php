<?php

session_start();

if (isset($_SESSION['login'])) {
    header('Location: index.php');
    exit;
}

require '../utils/database/helper.php';

$email = null;

$errorState = [
    "status" => false,
    "message" => null
];

if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $credentials = fetch("SELECT * FROM credentials WHERE email='$email'");
    if (count($credentials) === 1) {
        $credentials = $credentials[0];
        if (password_verify($password, $credentials['password'])) {
            $user = null;
            if ($credentials['role_id'] == 1) {
                $user = fetch("SELECT job_seekers.id, job_seekers.name, credentials.email, credentials.role_id
                                FROM job_seekers
                                JOIN credentials ON job_seekers.credential_id = credentials.id
                                WHERE credentials.email = '$email'")[0];
            } elseif ($credentials['role_id'] == 2) {
                $user = fetch("SELECT employers.id, employers.name, credentials.email, credentials.role_id
                                FROM employers
                                JOIN credentials ON employers.credential_id = credentials.id
                                WHERE credentials.email = '$email'")[0];
            }
            $_SESSION = [
                "login" => true,
                "user" => $user
            ];
            header('Location: index.php');
        } else {
            $errorState = [
                "status" => true,
                "message" => "Surel atau kata sandi salah!"
            ];
        }
    } else {
        $errorState = [
            "status" => true,
            "message" => "Surel atau kata sandi salah!"
        ];
    }
}

?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Masuk - Pasar Kerja</title>
    <link rel="stylesheet" href="../styles/login.css">
</head>

<body>
    <div class="container">
        <aside>
            <!-- <img src="https://placehold.co/100x100" alt=""> -->
             <img src="../assets/img/credential-banner.jpg" alt="">
        </aside>
        <main>
            <p class="logo">Pasar<span>Kerja</span></p>
            <div class="signup-as">
                <p>Masuk</p>
            </div>
            <form action="" method="post">
                <label for="email">Surel</label>
                <input type="email" name="email" value="<?= $email ?>">
                <label for="password">Kata Sandi</label>
                <input type="password" name="password">
                <?php if (isset($_POST['login']) && $errorState['status']): ?>
                    <div class="error-message-box">
                        <p class="error-message-text"><?= $errorState['message'] ?></p>
                    </div>
                <?php elseif (isset($_POST['login']) && !$errorState['status']): ?>
                    <div class="success-message-box">
                        <p class="success-message-text"><?= $errorState['message'] ?></p>
                    </div>
                <?php endif; ?>
                <button type="submit" name="login">Masuk</button>
            </form>
            <p class="not-have-account">Belum punya akun? <a href="signup.php">Daftar</a></p>
        </main>
    </div>
</body>

</html>