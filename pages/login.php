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
            <img src="https://placehold.co/100x100" alt="">
        </aside>
        <main>
            <p class="logo">Pasar<span>Kerja</span></p>
            <div class="signup-as">
                <p>Masuk</p>
            </div>
            <form action="" method="post">
                <label for="email">Surel</label>
                <input type="email" name="email">
                <label for="password">Kata Sandi</label>
                <input type="password" name="password">
                <div class="error-message-box">
                    <p class="error-message-text">Surel atau kata sandi salah!</p>
                </div>
                <button type="submit">Masuk</button>
            </form>
            <p class="not-have-account">Belum punya akun? <a href="signup.php">Daftar</a></p>
        </main>
    </div>
</body>

</html>